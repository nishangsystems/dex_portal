<?php


namespace App\Http\Controllers\Admin;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentFee;
use App\Models\Background;
use App\Models\Batch;
use App\Models\CampusSemesterConfig;
use App\Models\Config;
use App\Models\File;
use App\Models\PlatformCharge;
use App\Models\Resit;
use App\Models\SchoolUnits;
use App\Models\Semester;
use App\Models\Students;
use App\Models\StudentSubject;
use App\Models\Subjects;
use App\Models\User;
use App\Models\Wage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config as FacadesConfig;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use MongoDB\Driver\Session;
use Barryvdh\DomPDF\Facade\Pdf;

use function PHPUnit\Framework\returnSelf;

class HomeController  extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function set_letter_head()
    {
        # code...
        $data['title'] = __('text.upload_letter_head');
        return view('admin.setting.set-letter-head', $data);
    }

    public function save_letter_head(Request $request)
    {

        # code...
        $check = Validator::make($request->all(), ['file'=>'required|file|mimes:png,jpg,jpeg,gif,tif']);
        if ($check->fails()) {
            # code...
            return back()->with('error', $check->errors()->first());
        }
        
        $file = $request->file('file');
        // return $file->getClientOriginalName();
        if(!($file == null)){
            $ext = $file->getClientOriginalExtension();
            $filename = '_'.random_int(100000, 999999).'_'.time().'.'.$ext;
            $path = 'assets/images/avatars';
            if(!file_exists(url($path))){mkdir(url($path));}
            // $file->move(url($path), $filename);
            $file->move(public_path($path), $filename);
            if(File::where(['name'=>'letter-head'])->count() == 0){
                File::create(['name'=>'letter-head', 'path'=>$filename]);
            }else {
                File::where(['name'=>'letter-head'])->update(['path'=>$filename]);
            }
            return back()->with('success', __('text.word_done'));
        }
        return back()->with('error', __('text.error_reading_file'));
    }

    public function set_background_image()
    {
        # code...
        $data['title'] = __('text.set_background_image');
        return view('admin.setting.bg_image', $data);
    }

    public function save_background_image(Request $request)
    {
        # code...
        # code...
        $check = Validator::make($request->all(), ['file'=>'required|file|mimes:jpeg']);
        if ($check->fails()) {
            # code...
            return back()->with('error', $check->errors()->first());
        }
        $file = $request->file('file');
        // return $file->getClientOriginalName();
        if(!($file == null)){
            $ext = $file->getClientOriginalExtension();
            $filename = 'background_image.jpeg';
            // $path = $filename;
            if(!file_exists(url('/storage/app/bg_image'))){
                mkdir(url('/storage/app/bg_image'));
            }
            $file->move(url('/storage/app/bg_image'), $filename);
            return back()->with('success', __('text.word_done'));
        }
        return back()->with('error', __('text.error_reading_file'));
    }

    
    public function set_watermark()
    {
        # code...
        $data['title'] = __('text.set_watermark');
        return view('admin.setting.set_watermark', $data);
    }

    public function save_watermark(Request $request)
    {
        # code...
        # code...
        $check = Validator::make($request->all(), ['file'=>'required|file|mimes:jpeg']);
        if ($check->fails()) {
            # code...
            return back()->with('error', $check->errors()->first());
        }
        
        $file = $request->file('file');
        // return $file->getClientOriginalName();
        if(!($file == null)){
            $ext = $file->getClientOriginalExtension();
            $filename = 'logo.jpeg';
            $path = base_path('/assets/images');
            // $file->n('/bg_image', $filename);
            // \Storage::put($path, $file);
            $request->file('file')->move($path, $filename);
            return back()->with('success', __('text.word_done'));
        }
        return back()->with('error', __('text.error_reading_file'));
    }

    public function setayear()
    {
        $data['title'] = __('text.set_current_accademic_year');
        return view('admin.setting.setbatch')->with($data);
    }

    public function setsem()
    {
        return view('admin.setting.setsem');
    }

    public function courses_date_line(Request $request)
    {
        $data['title'] = __('text.set_course_registration_dateline').($request->has('semester') ? ' '.__('text.word_for').' '.Semester::find($request->semester)->name : '');
        if(request()->has('background')){
            $data['current_semester'] = Semester::where(['background_id'=>$request->background, 'status'=>1])->first()->id ?? null;
        }
        return view('admin.setting.set_course_date', $data);
    }

    public function save_courses_date_line(Request $request)
    {
        # code...
        $val = Validator::make($request->all(), ['semester'=>'required', 'date'=>'required|Date']);
        if ($val->fails()) {
            # code...
            return back()->with('error', $val->errors()->first());
        }

        try {
            //code...
            $conf = \App\Models\CampusSemesterConfig::where(['semester_id'=>$request->semester, 'campus_id'=>auth()->user()->campus_id ?? ''])->first() ?? null;
            if ($conf != null) {
                # code...
                $conf->courses_date_line = $request->date;
                $conf->save();
            }
            else {
                CampusSemesterConfig::create([
                    'semester_id'=>$request->semester, 'campus_id'=>auth()->user()->campus_id ?? null, 'courses_date_line'=>$request->date
                ]);
            }
            return back()->with('success', __('text.word_done'));
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error', $th->getMessage());
        }

    }

    public function course_date_line(Request $request, $campus, $semester)
    {
        # code...
        $conf = CampusSemesterConfig::where([
            'campus_id'=>$campus, 'semester_id'=>$semester
            ])->count();
            if ($conf == 0) {
                # code...
                return ['semester'=>Semester::find($semester)->name, 'date_line'=>__('text.DATELINE_NOT_SET')];
            }
            // return __DIR__;
            return ['semester'=>Semester::find($semester)->name, 'date_line'=>date('l d-m-Y', strtotime(CampusSemesterConfig::where(['campus_id'=>$campus, 'semester_id'=>$semester])->first()->courses_date_line)), 'date'=>CampusSemesterConfig::where(['campus_id'=>$campus, 'semester_id'=>$semester])->first()->courses_date_line];
    }

    public function program_settings(Request $request)
    {
        # code...
        $data['title'] = __('text.program_settings');
        return view('admin.setting.program_settings', $data);
    }

    public function post_program_settings(Request $request)
    {
        # code...
        $program = SchoolUnits::find($request->program);
        // return $program;
        if ($program != null) {
            # code...
            $program->max_credit=$request->max_credit;
            $program->ca_total=$request->ca_total;
            $program->exam_total=$request->exam_total;
            $program->resit_cost=$request->resit_cost;
            $program->save();
            return back()->with('success', __('text.word_done'));
        }
        return back()->with('error', __('text.page_not_found'));
    }


    public function setsemester(Request $request)
    {
        # code...
        $data['title'] = __('text.set_current_semester');
        $data['semesters'] = Semester::join('backgrounds', ['backgrounds.id'=>'semesters.background_id'])
                    ->distinct()->select(['semesters.*', 'backgrounds.background_name'])->orderBy('background_name', 'DESC')->orderBy('name', 'ASC')->get();
        // return $data;
        return view('admin.setting.setsemester', $data);
    }

    public function postsemester(Request $request, $id)
    {
        # code...
        try {
            //code...
            $semesters = Semester::where(['background_id'=>$request->background])->get();
            foreach ($semesters as $key => $sem) {
                # code...
                $sem->status = 0;
                $sem->save();
            }
            $semester = Semester::find($id);
            $semester->status = 1;
            $semester->save();
            return back()->with('success', __('text.word_done'));
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error', __('text.operation_failed').' '.$th->getMessage());
        }
    }

    public function createsem(Request $request)
    {
        $id = $request->input('sem');
        $get_sem = \App\Models\Sequence::find($id);
        return redirect()->back();
    }

    public function deletebatch($id)
    {
        if (DB::table('batches')->count() == 1) {
            return redirect()->back()->with('error', __('text.can_not_delete_last_batch'));
        }
        DB::table('batches')->where('id', '=', $id)->delete();
        return redirect()->back()->with('success', __('text.word_done'));
    }



    public function setAcademicYear($id)
    {
        // dd($id);
        $year = Config::all()->last();
        $data = [
            'year_id' => $id
        ];
        $year->update($data);

        return redirect()->back()->with('success', __('text.word_done'));
    }

    public function extraFee(Request $request)
    {
        # code...
        $data['title'] = __('text.add_additional_fee_for', ['item'=>$request->student_id == null ? '' : Students::find($request->student_id)->name ?? '']);
        return view('admin.fee.extra-fee', $data);
    }

    public function extraFeeSave(Request $request)
    {
        # code...
        $check = Validator::make($request->all(), ['amount'=>'required', 'year_id'=>'required']);
        if ($check->fails()) {
            # code...
            return back()->with('error', $check->errors()->first());
        }
        // return $request->all();
        \App\Models\ExtraFee::create(['student_id'=>$request->student_id, 'amount'=>$request->amount, 'year_id'=>$request->year_id]);
        return back()->with('success', __('text.word_done'));
    }

    public function extraDestroy(Request $request){
        $row = \App\Models\ExtraFee::where(['student_id'=>$request->student_id, 'id'=>$request->extra_fee_id])->first();
        if($row != null){
            $row -> delete();
        }
        return back()->with('success', __('text.word_done'));
    }
    
    public function custom_resit_create()
    {
        # code...
        $data['title'] = __('text.open_resit');
        return view('admin.setting.custom_resit.create', $data);
    }

    public function custom_resit_edit(Request $request, $id)
    {
        # code...
        $data['title'] = __('text.edit_resit');
        $data['resit'] = Resit::find($id);
        return view('admin.setting.custom_resit.edit', $data);
    }

    public function custom_resit_save(Request $request)
    {
        # code...
        $validator = Validator::make($request->all(), ['year_id'=>'required', 'background_id'=>"required", 'start_date'=>'required|date', 'end_date'=>'required|date']);
        if($validator->fails()){
            return back()->with('error', $validator->errors()->first());
        }

        // if(Resit::where(['year_id'=>$request->year_id, 'background_id'=>$request->background_id, 'campus_id'=>$request->campus_id])->whereBetween('start_date'))
        $resit = new Resit($request->all());
        $resit->save();
        return back()->with('success', __('text.word_done'));
    }

    public function custom_resit_update(Request $request, $id)
    {
        # code...
        $validator = Validator::make($request->all(), ['year_id'=>'required', 'background_id'=>"required", 'start_date'=>'required|date', 'end_date'=>'required|date']);
        if($validator->fails()){
            return back()->with('error', $validator->errors()->first());
        }

        $resit = Resit::find($id);
        if($resit != null){
            $resit->fill($request->all());
            $resit->save();
            return back()->with('success', __('text.word_done'));
        }

        return back()->with('error', __('text.operation_failed_record_not_found'));
    }

    public function custom_resit_delete(Request $request, $id)
    {

        $resit = Resit::find($id);
        if($resit != null){
            $resit->delete();
            return back()->with('success', 'Done');
        }

        return back()->with('error', __('text.operation_failed_record_not_found'));
    }

    public function resits_index()
    {
        # code...
        $data['title'] = __('text.word_resits');
        return view('admin.resit.index', $data);
    }

    public function resit_course_list(Request $request, $resit_id)
    {
        # code...
        $resit =  Resit::find($resit_id);
        if($resit == null){
            return back()->with('error', 'Resit is not found');
        }
        $data['title'] = __('text.course_list_for', ['item'=>$resit->name]);
        // return 'nonsense going on here';
        $data['courses'] = Subjects::join('student_courses', ['student_courses.course_id'=>'subjects.id'])
                    ->where(['student_courses.resit_id'=>$resit_id, 'student_courses.year_id'=>Helpers::instance()->getCurrentAccademicYear()])
                    ->join('students', ['students.id'=>'student_courses.student_id'])
                    ->where(['students.campus_id'=>auth()->user()->campus_id])
                    ->select(['subjects.*', 'resit_id', 'year_id'])->orderBy('subjects.name')->distinct()->get();
        // dd($data['courses']);
        $data['resit'] = $resit;
        if($request->has('print') && $request->print == 1){
            $pdf = Pdf::loadView('admin.resit.course_list_downloadable', $data);
            return $pdf->download($data['title'] . '.pdf');
        }
        return view('admin.resit.course_list', $data);
    }

    public function resit_course_list_download(Request $request)
    {
        # code...
        $subject = Subjects::find($request->subject_id);
        $data['title'] = __('text.resit_course_list_for', ['item'=>Resit::find($request->resit_id)->name]);
        $data['subjects'] = Subjects::find($request->subject_id)->student_subjects()->where(['resit_id' => $request->resit_id])
                        ->join('students',  ['students.id'=>'student_courses.student_id'])
                        ->orderBy('students.name')->get(['student_courses.*']);
        if($request->print == 1){

            $pdf = Pdf::loadView('admin.resit._course_list_print', $data);
            return $pdf->download(__('text.resit_course_list_for', ['item'>"[ ".$subject->code .' ] '. $subject->name.' - '.Resit::find($request->resit_id)->year->name . '.pdf']));
        }
        // dd($data['subjects']);
        return view('admin.resit.course_list_print', $data);
    }

    public function set_charges()
    {
        # code...
        $data['title'] = __('text.set_charges');
        return view('admin.setting.charges', $data);
    }

    public function save_charges(Request $request)
    {
        # code...
        // return $request->all();
        $validity = Validator::make($request->all(), [
            'year_id'=>'required',
            'yearly_amount'=>'numeric',
            'transcript_amount'=>'numeric',
            'result_amount'=>'numeric'
        ]);
        if($validity->failed()){
            return back()->with('error', $validity->errors()->first());
        }
        PlatformCharge::updateOrInsert(['year_id'=>$request->year_id], ['yearly_amount'=>$request->yearly_amount, 'result_amount'=>$request->result_amount, 'transcript_amount'=>$request->transcript_amount]);
        return back()->with('success', __('text.word_done'));
    }



    // MANAGE WAGES
    public function wages(Request $request)
    {
        # code...
        $campus_id = auth()->user()->campus_id;
        $data['title'] = "Wages";
        return view('admin.setting.wages.index', $data);
    }

    public function create_wages(Request $request)
    {
        # code...
        $data['title'] = "Add Teacher Hour Wages for ".User::find($request->teacher_id)->name;
        $data['rates'] = Wage::where('teacher_id', $request->teacher_id)->get();
        return view('admin.setting.wages.create', $data);
    }

    public function save_wages(Request $request)
    {
        # code...
        // return $request->all();
        $validate = Validator::make($request->all(), ['background_id'=>'required', 'rate'=>'required']);
        if($validate->failed()){
            return back()->with('error', $validate->errors()->first());
        }
        $data = ['price'=>$request->rate, 'teacher_id'=>$request->teacher_id, 'level_id'=>$request->level_id??null];
        if(Wage::where(['teacher_id'=>$request->teacher_id, 'level_id'=>$request->level_id??null])->count() > 0){
            return back()->with('error', __('text.record_already_exist', ['item'=>'']));
        }
        $instance = new Wage($data);
        $instance->save();
        return back()->with('success', __('text.word_done'));
    }

    public function drop_wages(Request $request)
    {
        # code...
        $wage = Wage::find($request->wage_id);
        if($wage !== null){
            $wage->delete();
            return back()->with('success', __('text.word_done'));
        }
    }

    public function application_statistics(Request $request)
    {
        # code...
        $data['title'] = "Application Statistics";
        $filter = $request->filter??null;
        if($filter != null)
        $data['title'] = "Application Statistics Filtered By ".$filter;
        switch($filter){
            case 'program':
                $programs = collect(json_decode($this->api_service->programs())->data);
                $data['programs'] = \App\Models\ApplicationForm::whereNotNull('submitted')->where(['year_id'=>Helpers::instance()->getCurrentAccademicYear()])->select(['id', 'program', DB::raw("COUNT(*) as count")])
                    ->groupBy('program')->distinct()->get()->each(function($rec)use($programs){
                        $prog = $programs->where('id', $rec->program)->first();
                        $rec->filter_name = optional($prog)->name??null;
                    });
                
                return view('admin.statistics.application', $data);
                break;
            default:
                // filter by degree
                $degrees = collect(json_decode($this->api_service->degrees())->data);
                $data['programs'] = \App\Models\ApplicationForm::whereNotNull('submitted')->where(['year_id'=>Helpers::instance()->getCurrentAccademicYear()])->select(['id', 'degree_id', DB::raw("COUNT(*) as count")])
                    ->groupBy('degree_id')->distinct()->get()->each(function($rec)use($degrees){
                        $deg = $degrees->where('id', $rec->degree_id)->first();
                        $rec->filter_name = optional($deg)->deg_name??null;
                    });

                return view('admin.statistics.application', $data);
                break;
        } 
    }

    public function admission_statistics(Request $request)
    {
        # code...
        $data['title'] = "Admission Statistics";
        $filter = $request->filter??null;
        if($filter != null)
        $data['title'] = "Admission Statistics Filtered By ".$filter;
        switch($filter){
            case 'program':
                $programs = collect(json_decode($this->api_service->programs())->data);
                $data['programs'] = \App\Models\ApplicationForm::whereNotNull('admitted')->where(['year_id'=>Helpers::instance()->getCurrentAccademicYear()])->select(['id', 'program', DB::raw("COUNT(*) as count")])
                    ->groupBy('program')->distinct()->get()->each(function($rec)use($programs){
                        $prog = $programs->where('id', $rec->program)->first();
                        $rec->filter_name = optional($prog)->name??null;
                    });
                
                return view('admin.statistics.admission', $data);
                break;
            default:
                // filter by degree
                $degrees = collect(json_decode($this->api_service->degrees())->data);
                $data['programs'] = \App\Models\ApplicationForm::whereNotNull('admitted')->where(['year_id'=>Helpers::instance()->getCurrentAccademicYear()])->select(['id', 'degree_id', DB::raw("COUNT(*) as count")])
                    ->groupBy('degree_id')->distinct()->get()->each(function($rec)use($degrees){
                        $deg = $degrees->where('id', $rec->degree_id)->first();
                        $rec->filter_name = optional($deg)->deg_name??null;
                    });

                return view('admin.statistics.admission', $data);
                break;
        } 
    }

    public function __application_bypass(Request $request, $application_id = null)
    {
        # code...
        $data['title'] = "Bypass Application Fee";
        $data['_this'] = $this;
        $data['applications'] = \App\Models\ApplicationForm::whereNull('transaction_id')->whereNotNull('degree_id')->where('year_id', Helpers::instance()->getCurrentAccademicYear())->get();
        if($application_id != null){
            $data['application'] = \App\Models\ApplicationForm::find($application_id);
        }
        return view('admin.student.bypass_application_fee', $data);
    }

    public function __save_application_bypass(Request $request, $application_id)
    {
        # code...
        $validity = validator($request->all(), ['bypass_reason'=>'required']);
        if($validity->fails()){
            return back()->with('error', $validity->errors()->first());
        }
        $application = \App\Models\ApplicationForm::find($application_id);
        $data = [
            'request_id'=>rand(10000000000, 1000000000000), 
            'amount'=>0, 'currency_code'=>'---', 
            'purpose'=>'PLATFORM', 'mobile_wallet_number'=>'0000000000', 
            'transaction_ref'=>str_replace(' ', '_', $request->bypass_reason??'------'), 
            'app_id'=>0, 'transaction_id'=>-1000000000, 
            'transaction_time'=>now(), 'payment_method'=>'BYPASS', 
            'payer_user_id'=>0, 'payer_name'=>'---', 
            'payer_account_id'=>0, 'merchant_fee'=>0, 
            'merchant_account_id'=>auth()->id(), 
            'net_amount_recieved'=>0, 'payment_id'=>$application->degree_id
        ];
        $transaction = \App\Models\TranzakTransaction::create($data);
        $application->update(['transaction_id'=>$transaction->id]);
        return redirect()->to(route('admin.bypass.application'))->with('success', "Done");
        
    }

    public function __platform_bypass(Request $request, $student_id = null)
    {
        # code...
        $data['title'] = "Bypass Platform Charges";
        if($student_id != null){
            $data['student'] = \App\Models\Students::find($student_id);
            $data['title'] = "Bypass Platform Charges For ".$data['student']->name??'';
        }
        // dd($request->route());
        return view('admin.student.bypass_platform', $data);
    }

    public function __save_platform_bypass(Request $request, $student_id = null)
    {
        # code...
        // dd($request->all());
        $validity = validator($request->all(), ['reason'=>'required']);
        if($validity->fails()){
            return back()->with('error', $validity->errors()->first());
        }
        $plcharge = \App\Models\PlatformCharge::where('year_id', Helpers::instance()->getCurrentAccademicYear())->first();
        $data = ['student_id'=>$student_id, 'year_id'=>Helpers::instance()->getCurrentAccademicYear(), 'amount'=>$plcharge->yearly_amount??0, 'financialTransactionId'=>str_replace(' ', '_', $request->reason), 'item_id'=>$plcharge->id??0, 'transaction_id'=>-1000000000, 'used'=>1, 'type'=>'PLATFORM'];
        $charge = \App\Models\Charge::create($data);
        return redirect()->to(route('admin.bypass.platform'))->with('success', "Done");
    }

    public function _search_student(Request $request)
    {
        # code...
        $search_key = $request->key??'';
        
        return Students::where('name', 'LIKE', "%{$search_key}%")->orWhere('email', 'LIKE', "%{$search_key}%")->orWhere('phone', 'LIKE', "%{$search_key}%")->take(15)->get();
    }
}

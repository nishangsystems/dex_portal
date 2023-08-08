<?php

namespace App\Http\Controllers\Student;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TransactionController;
use App\Http\Services\ApiService;
use App\Http\Services\SMSHelpers;
use App\Models\ApplicationForm;
use App\Models\Batch;
use App\Models\Campus;
use App\Models\CampusProgram;
use App\Models\CampusSemesterConfig;
use App\Models\Charge;
use App\Models\ClassSubject;
use App\Models\Config;
use App\Models\CourseNotification;
use App\Models\Degree;
use App\Models\Income;
use App\Models\Material;
use App\Models\NonGPACourse;
use App\Models\Notification;
use App\Models\PayIncome;
use App\Models\Payments;
use App\Models\PlatformCharge;
use App\Models\ProgramLevel;
use App\Models\Resit;
use App\Models\Result;
use App\Models\SchoolUnits;
use App\Models\Semester;
use App\Models\Sequence;
use App\Models\StudentClass;
use App\Models\Students;
use App\Models\StudentStock;
use App\Models\StudentSubject;
use App\Models\SubjectNotes;
use App\Models\Subjects;
use App\Models\Topic;
use App\Models\Transaction;
use App\Models\Transcript;
use App\Models\TranzakCredential;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Exception;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    private $years;
    private $batch_id;
    private $select = [
        'students.id as student_id',
        'collect_boarding_fees.id',
        'students.name',
        'students.matric',
        'collect_boarding_fees.amount_payable',
        'collect_boarding_fees.status',
        'school_units.name as class_name'
    ];

    private $select_boarding = [
        'students.id as student_id',
        'students.name',
        'students.matric',
        'collect_boarding_fees.id',
        'boarding_amounts.created_at',
        'boarding_amounts.amount_payable',
        'boarding_amounts.total_amount',
        'boarding_amounts.status',
        'boarding_amounts.balance'
    ];

    public function index()
    {
        return view('student.dashboard');
    }

    public function fee()
    {
        $data['title'] = "Tution Report";
        return view('student.fee')->with($data);
    }

    public function other_incomes()
    {
        $data['title'] = "Other Payments Report";
        return view('student.other_incomes', $data);
    }

    public function result(Request $request)
    {
        # code...
        $data['title'] = "My Result";
        return view('student.result')->with($data);
    }

    public function subject()
    {
        $data['title'] = "My Subjects";
        //     dd($data);
        return view('student.subject')->with($data);
    }

    public function profile()
    {
        return view('student.edit_profile');
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|min:8',
            'phone' => 'required|min:9|max:15',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->with(['e' => $validator->errors()->first()]);
        }

        $data['success'] = 200;
        $user = auth('student')->user();
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();
        $data['user'] = auth('student')->user();
        return redirect()->back()->with(['s' => 'Phone Number and Email Updated Successfully']);
    }


    public function __construct( ApiService $service)
    {
        // $this->middleware('isStudent');
        // $this->boarding_fee =  BoardingFee::first();
        //  $this->year = Batch::find(Helpers::instance()->getCurrentAccademicYear())->name;
        $this->batch_id = Batch::find(Helpers::instance()->getCurrentAccademicYear())->id;
        $this->years = Batch::all();
        $this->api_service = $service;
    }


    
    public function edit_profile()
    {
        # code...
        $data['title'] = "Edit Profile";
        return view('student.edit_profile', $data);
    }
    public function update_profile(Request $request)
    {
        # code...
        if(
            Students::where([
                'email' => $request->email, 'phone' => $request->phone
            ])->count() > 0 && (auth('student')->user()->phone != $request->phone || auth('student')->user()->email != $request->email)
        ){
            return back()->with('error', __('text.validation_phrase1'));
        }
        
        $data = $request->all();
        Students::find(auth('student')->id())->update($data);
        return redirect(route('student.home'))->with('success', __('text.word_Done'));
    }
 

    /* ______________________________________________________________________________________
    ONLINE APPLICATION SPECIFIC ACTIONS
    _______________________________________________________________________________________ */
    public function all_programs (Request $request)
    {
        # code...
        $data['title'] = "Our programs";
        $data['degrees'] = Degree::all();
        // return $data;
        return view('student.online.programs', $data);
    }

    public function start_application (Request $request, $step, $application_id = null)
    {
        try {

            if(auth('student')->user()->applicationForms()->where('submitted', true)->where('year_id', Helpers::instance()->getCurrentAccademicYear())->count() > 0){
                return back()->with('error', "You are allowed to submit only one application form per year");
            }

            // check if application is open now
            if(!(Helpers::instance()->application_open())){
                return redirect(route('student.home'))->with('error', 'Application closed for '.Batch::find(Config::all()->last()->year_id)->name);
            }
            # code...
            $data['step'] = $step;
            // return $this->api_service->campuses();
            $application = ApplicationForm::where(['student_id'=>auth('student')->id(), 'year_id'=>Helpers::instance()->getCurrentAccademicYear()])->first();
            if($application == null){
                $application = new ApplicationForm();
                $application->student_id = auth('student')->id();
                $application->year_id = Helpers::instance()->getCurrentAccademicYear();
                $application->save();
            }
            $data['application'] = $application;
            $data['programs'] = \App\Models\Program::where('type', 'primary')->get();
            $data['aux_programs'] = \App\Models\Program::where('type', 'auxiliary')->get();
            $data['degrees'] = Degree::all();
            $data['degree'] = $application->degree_id == null ? null : $data['degrees']->where('id', $application->degree_id)->first();
            $data['title'] = (isset($data['degree']) and ($data['degree'] != null)) ? $data['degree']->deg_name." APPLICATION" : "APPLICATION";
            return view('student.online.fill_form', $data);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error', $th->getMessage());
        }
    }

    public function persist_application(Request $request, $step, $application_id)
    {
        # code...
        // return $request->all();
        
        // check if application is open now
        if(!(Helpers::instance()->application_open())){
            return redirect(route('student.home'))->with('error', 'Application closed for '.Batch::find(Config::all()->last()->year_id)->name);
        }
        switch ($step) {
            case 1:
                # code...
                $validity = Validator::make($request->all(), [
                    'degree_id'=>'required'
                ]);
                break;
            
            case 2:
                # code...
                // return $request->all();
                $validity = Validator::make($request->all(), [
                    "name"=>'required', "dob"=>'required|date', "pob"=>'required',
                    "gender"=>'required', "id_card_number"=>'required', 
                    "id_date_of_issue"=>'required|date', "id_place_of_issue"=>'required', 
                    "nationality"=>'required', "region"=>'required', 
                    "country_of_birth"=>'required', "referer"=>'required'
                ]);
                break;
            
            case 3:
                # code...
                $validity = Validator::make($request->all(), [
                    "residence"=>'required', "phone"=>'required', "email"=>'required|email', "guardian"=>'required', "guardian_phone"=>'required', 
                    "guardian_address"=>'required', "sponsor"=>'required', "sponsor_phone"=>'required', "sponsor_address"=>'required'
                ]);
                break;
            
            case 4:
                # code...
                
                $validity = Validator::make($request->all(), [
                    "secondary_school"=>'required', "secondary_exam_center"=>'required', "secondary_candidate_number"=>'required',
                    "secondary_exam_year"=>'required', "gce_ol_record"=>'required', "high_school"=>'required', "high_school_exam_center"=>'required',
                    "high_school_candidate_number"=>'required', "high_school_exam_year"=>'required', "gce_al_record"=>'required'
                ]);
                break;
                
            case 5:
                # code...
                $validity = Validator::make($request->all(), [
                    'program'=>'required'
                ]);
                break;
                
            case 6:
                $validity = Validator::make($request->all(), ['submitted'=>'required']);
                # code...
                break;
            
        }

        if($validity->fails()){
            return back()->with('error', $validity->errors()->first());
        }
        // return $request->all();

        // persist data
        $data = $request->all();
        if($step == 4){
            $data_p1=[];
            $_data = $request->gce_ol_record;
            // return $_data;
            if($_data != null){
                foreach ($_data['subject'] as $key => $value) {
                    $data_p1[] = ['subject'=>$value, 'grade'=>$_data['grade'][$key]];
                }
                $data['gce_ol_record'] = json_encode($data_p1);
                // return $data;
            }
            $data_p2 = [];
            $e_data = $request->gce_al_record;
            if($e_data != null){
                foreach ($e_data['subject'] as $key => $value) {
                    $data_p2[] = ['subject'=>$value, 'grade'=>$e_data['grade'][$key]];
                }
                $data['gce_al_record'] = json_encode($data_p2);
                // return $data;
            }
            $data = collect($data)->filter(function($value, $key){return $key != '_token';})->toArray();
            $application = ApplicationForm::updateOrInsert(['id'=> $application_id, 'student_id'=>auth('student')->id()], $data);
        }
        else{
            $data = $request->all();
            $data = collect($data)->filter(function($value, $key){return $key != '_token';})->toArray();
            $application = ApplicationForm::updateOrInsert(['id'=> $application_id, 'student_id'=>auth('student')->id()], $data);
        }
        $step = $request->step;
        if($step == 6){return redirect(route('student.application.form.download', $application_id));}
        return redirect(route('student.application.start', [$step, $application_id]));
    }

    public function pending_payment(Request $request, $application_id)
    {
        # code...
        
        // check if application is open now
        if(!(Helpers::instance()->application_open())){
            return redirect(route('student.home'))->with('error', 'Application closed for '.Helpers::instance()->getYear()->name);
        }
        $data['title'] = "Processing Transaction";
        $data['form_id'] = $application_id;
        $data['tranzak_credentials'] = json_decode(session()->get('tranzak_credentials'));
        $data['transaction'] = json_decode(session()->get('processing_tranzak_transaction_details'));
        // return $data;
        return view('student.online.processing_payment', $data);
        
    }

    public function pending_complete(Request $request, $appl_id)
    {
        # code...
        try {
            
            // check if application is open now
            if(!(Helpers::instance()->application_open())){
                return redirect(route('student.home'))->with('error', 'Application closed for '.Helpers::instance()->getYear()->name);
            }
            //code...
            $transaction_status = (object) $request->all();
            // return $transaction_status;
            switch ($transaction_status->status) {
                case 'SUCCESSFUL':
                    # code...
                    // save transaction and update application_form
                    $transaction = ['request_id'=>$transaction_status->requestId, 'amount'=>$transaction_status->amount, 'currency_code'=>$transaction_status->currencyCode, 'purpose'=>"application fee", 'mobile_wallet_number'=>$transaction_status->mobileWalletNumber, 'transaction_ref'=>$transaction_status->mchTransactionRef, 'app_id'=>$transaction_status->appId, 'transaction_id'=>$transaction_status->transactionId, 'transaction_time'=>$transaction_status->transactionTime, 'payment_method'=>((object)($transaction_status->payer))->paymentMethod, 'payer_user_id'=>((object)($transaction_status->payer))->userId, 'payer_name'=>((object)($transaction_status->payer))->name, 'payer_account_id'=>((object)($transaction_status->payer))->accountId, 'merchant_fee'=>((object)($transaction_status->merchant))->fee, 'merchant_account_id'=>((object)($transaction_status->merchant))->accountId, 'net_amount_recieved'=>((object)($transaction_status->merchant))->netAmountReceived];
                    $transaction_instance = new Transaction($transaction);
                    $transaction_instance->save();
    
                    $appl = ApplicationForm::find($appl_id);
                    $appl->transaction_id = $transaction_instance->id;
                    $appl->save();
    
                    // // SEND SMS
                    $phone_number = auth('student')->user()->phone;
                    if(str_starts_with($phone_number, '+')){
                        $phone_number = substr($phone_number, '1');
                    }
                    if(strlen($phone_number) <= 9){
                        $phone_number = '237'.$phone_number;
                    }
                    // dd($phone_number);
                    $message="Application form for ST. LOUIS UNIVERSITY INSTITUTE submitted successfully.";
                    $sent = $this->sendSMS($phone_number, $message);
    
                    return redirect(route('student.application.form.download'))->with('success', "Payment successful. ".($sent != true ? $sent : null));
                    break;
                
                case 'CANCELLED':
                    # code...
                    // notify user
                    return redirect(route('student.home'))->with('message', 'Payment Not Made. The request was cancelled.');
                    break;
                
                case 'FAILED':
                    # code...
                    return redirect(route('student.home'))->with('error', 'Payment failed.');
                    break;
                
                case 'REVERSED':
                    # code...
                    return redirect(route('student.home'))->with('message', 'Payment failed. The request was reversed.');
                    break;
                
                default:
                    # code...
                    break;
            }
            return redirect(route('student.home'))->with('error', 'Payment failed. Unrecognised transaction status.');
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error', $th->getMessage());
        }
    }

    public function submit_application(Request $request){
        
        // check if application is open now
        if(!(Helpers::instance()->application_open())){
            return redirect(route('student.home'))->with('error', 'Application closed for '.Helpers::instance()->getYear()->name);
        }
        $applications = auth('student')->user()->currentApplicationForms()->where('submitted', 0)->get();
        $data['title'] = "Submit Application";
        $data['applications'] = $applications;
        return view('student.online.submit_form', $data);
    }

    public function submit_application_save(Request $request, $appl_id)
    {
        # code...
        $application = ApplicationForm::find($appl_id);
        if($application != null){
            $application->submitted = 1;
            $application->save();
            return back()->with('success', 'Application submitted.');
        }
        return back()->with('error', 'Application could not be found.');
    }

    public function download_application_form()
    {
        # code...
        $data['title'] = "Download Application Form";
        $data['_this'] = $this;
        $data['applications'] = auth('student')->user()->applicationForms->where('submitted', true);
        return view('student.online.download_form', $data);
    }

    public function download_form(Request $request, $application_id)
    {
        # code...
        try{
            $application = ApplicationForm::find($application_id);
            $data['application'] = $application;
            
            $title = "APPLICATION FORM FOR ".$application->degree->name;
            $data['title'] = $title;

            // if(in_array(null, array_values($data))){ return redirect(route('student.application.start', [0, $application_id]))->with('message', "Make sure your form is correctly filled and try again.");}
            // return view('student.online.form_dawnloadable', $data);
            $pdf = PDF::loadView('student.online.form_dawnloadable', $data);
            $filename = $title.' - '.$application->name.'.pdf';
            return $pdf->download($filename);
        }catch(Throwable $th){
            if(in_array(null, array_values($data))){ return redirect(route('student.application.start', [0, $application_id]))->with('message', "Make sure your form is correctly filled and try again.");}
        }
    }

}

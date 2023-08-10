@extends('student.layout')
@section('section')
    <div class="py-4">
        @switch($step)
            @case(0)
                <form enctype="multipart/form-data" id="application_form" method="post" action="{{ route('student.application.start', [1, $application->id]) }}">
                    @csrf
                    <div class="px-5 py-5 border-top shadow bg-light">
                        <div class="row w-100">
                            <div class="col-sm-12 col-md-9">
                                <label class="text-capitalize"><span style="font-weight: 700;">{{ __('text.word_degree') }}</span></label>
                                <select name="degree_id" class="form-control text-primary"  oninput="setDegreeTypes(event)" required>
                                    <option>{{ __('text.word_degree') }}</option>
                                    @foreach ($degrees as $degree)
                                        <option value="{{ $degree->id }}" {{ $application->degree_id == $degree->id ? 'selected' : '' }}>{{ $degree->name }}</option>  
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-3 pt-5 d-flex justify-content-center">
                                <button type="submit" class="px-5 py-1 btn btn-md btn-primary" onclick="event.preventDefault(); confirm('Are you sure the selected degree type is OK?') ? ($('#application_form').submit()) : null">{{ __('text.new_application') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
                @break
            @case(18)
                <form enctype="multipart/form-data" id="application_form" method="post" action="{{ route('student.application.start', [1, $application->id]) }}">
                    @csrf
                    <div class="px-5 py-5 border-top shadow bg-light" style="font-size: 2rem; font-weight: 700;">
                        <a class="text-uppercase d-block w-100 alert-primary text-center py-5 border">
                            Applying for {{ $application->type }} in {{ $application->campus }} campus
                        </a>
                        <div class="pt-5 d-flex justify-content-center text-uppercase">
                            <a href="" class="px-5 py-2 btn btn-lg btn-danger mx-3" >{{ __('text.word_back') }}</a>
                            <a href="" class="px-5 py-2 btn btn-lg btn-primary mx-3" onclick="confirm('Are you sure you are applying for  BACHELOR  Program?') ? (window.location=`{{ route('student.application.start', [1, $application->id]) }}`) : null">{{ __('text.word_continue') }}</a>
                        </div>
                    </div>
                </form>
                @break

            @case(1)
                <form enctype="multipart/form-data" id="application_form" method="post" action="{{ route('student.application.start', [2, $application->id]) }}">
                    @csrf
                    <div class="py-2 row bg-light border-top shadow">
                        <h4 class="py-3 border-bottom border-top bg-white text-primary my-4 text-uppercase col-sm-12 col-md-12 col-lg-12" style="font-weight:800;">{{ __('text.word_stage') }} 1: {{ __('text.personal_details') }} : <span class="text-danger">APPLYING FOR A(AN) {{ $degree->name??null }} PROGRAM</span></h4>
                        <div class="py-2 col-sm-6 col-md-4 col-lg-5">
                            <label class="text-secondary  text-capitalize">{{ __('text.word_name_bilang') }}</label>
                            <div class="">
                                <input type="text" class="form-control text-primary"  name="name" value="{{ auth('student')->user()->name }}" readonly required>
                            </div>
                        </div>
                        <div class="py-2 col-sm-6 col-md-4 col-lg-4">
                            <label class="text-secondary  text-capitalize">{{ __('text.date_of_birth_bilang') }}</label>
                            <div class="">
                                <input type="date" class="form-control text-primary"  name="dob" value="{{ $application->dob }}" required>
                            </div>
                        </div>
                        <div class="py-2 col-sm-6 col-md-4 col-lg-3">
                            <label class="text-secondary  text-capitalize">{{ __('text.place_of_birth_bilang') }}</label>
                            <div class="">
                                <input type="text" class="form-control text-primary"  name="pob" value="{{ $application->pob }}" required>
                            </div>
                        </div>
                        <div class="py-2 col-sm-6 col-md-4 col-lg-3">
                            <label class="text-secondary  text-capitalize">{{ __('text.word_gender_bilang') }}</label>
                            <div class="">
                                <select class="form-control text-primary"  name="gender" required>
                                    <option value="male" {{ $application->gender == 'male' ? 'selected' : '' }}>{{ __('text.word_male') }}</option>
                                    <option value="female" {{ $application->gender == 'female' ? 'selected' : '' }}>{{ __('text.word_female') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="py-2 col-sm-6 col-md-4 col-lg-3">
                            <label class="text-secondary  text-capitalize">{{ __('text.ID_card_number') }}</label>
                            <div class="">
                                <input type="number" class="form-control text-primary"  name="id_card_number" value="{{ $application->id_card_number }}" required>
                            </div>
                        </div>
                        <div class="py-2 col-sm-6 col-md-4 col-lg-3">
                            <label class="text-secondary  text-capitalize">{{ __('text.date_of_issue') }}</label>
                            <div class="">
                                <input type="date" class="form-control text-primary"  name="id_date_of_issue" value="{{ $application->id_date_of_issue }}" required>
                            </div>
                        </div>
                        <div class="py-2 col-sm-6 col-md-4 col-lg-3">
                            <label class="text-secondary  text-capitalize">{{ __('text.place_of_issue') }}</label>
                            <div class="">
                                <input type="text" class="form-control text-primary"  name="id_place_of_issue" value="{{ $application->id_place_of_issue }}" required>
                            </div>
                        </div>
                        <div class="py-2 col-sm-6 col-md-4 col-lg-3">
                            <label class="text-secondary  text-capitalize">{{ __('text.word_nationality') }}</label>
                            <div class="">
                                <select class="form-control text-primary"  name="nationality" required>
                                    <option></option>
                                    @foreach(config('all_countries.list') as $key=>$value)
                                        <option value="{{ $value['name'] }}" {{ $application->nationality== $value['name'] ? 'selected' : ($value['name'] == 'Cameroon' ? 'selected' : '') }}>{{ $value['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="py-2 col-sm-6 col-md-4 col-lg-3">
                            <label class="text-secondary  text-capitalize">{{ __('text.region_of_origin') }}</label>
                            <div class="">
                                <select class="form-control text-primary"  name="region" required oninput="loadDivisions(event)">
                                    <option value=""></option>
                                    @foreach(\App\Models\Region::all() as $value)
                                        <option value="{{ $value->id }}" {{ $application->region == $value->id ? 'selected' : '' }}>{{ $value->region }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="py-2 col-sm-6 col-md-4 col-lg-3">
                            <label class="text-secondary  text-capitalize">{{ __('text.country_of_birth') }}</label>
                            <div class="">
                                <select class="form-control text-primary"  name="country_of_birth" required>
                                    <option></option>
                                    @foreach(config('all_countries.list') as $key=>$value)
                                        <option value="{{ $value['name'] }}" {{ $application->country_of_birth == $value['name'] ? 'selected' : ($value['name'] == 'Cameroon' ? 'selected' : '') }}>{{ $value['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="py-2 col-sm-6 col-md-4 col-lg-3">
                            <label class="text-secondary  text-capitalize">{{ __('text.where_did_you_hear_about_us') }}</label>
                            <div class="">
                                <select class="form-control text-primary"  name="referer" required onchange="specify_source(event)">
                                    <option value=""></option>
                                    <option value="POSTER OR NEWS PAPER" {{ $application->referer== 'POSTER OR NEWS PAPER' ? 'selected' : '' }}>POSTER OR NEWS PAPER</option>
                                    <option value="FLYER OR BANNER" {{ $application->referer== 'FLYER OR BANNER' ? 'selected' : '' }}>FLYER OR BANNER</option>
                                    <option value="HIMS STUDENT OR EX-STUDENT" {{ $application->referer== 'HIMS STUDENT OR EX-STUDENT' ? 'selected' : '' }}>HIMS STUDENT OR EX-STUDENT</option>
                                    <option value="HIMS STAFF" {{ $application->referer== 'HIMS STAFF' ? 'selected' : '' }}>HIMS STAFF</option>
                                    <option value="INTERNET OR ADVERTISEMENT" {{ $application->referer== 'INTERNET OR ADVERTISEMENT' ? 'selected' : '' }}>INTERNET OR ADVERTISEMENT</option>
                                    <option value="OTHERS" {{ $application->referer== 'OTHERS' ? 'selected' : '' }}  >OTHERS</option>
                                </select>
                            </div>
                        </div>
                        <div class="py-2 col-sm-6 col-md-4 col-lg-3" id="specify_source"></div>
                        <div class="col-sm-12 col-md-12 col-lg-12 py-4 d-flex justify-content-center">
                            <a href="{{ route('student.application.start', [$step-1, $application->id]) }}" class="px-4 py-1 btn btn-lg btn-danger">{{ __('text.word_back') }}</a>
                            <input type="submit" class="px-4 py-1 btn btn-lg btn-primary" value="{{ __('text.save_and_continue') }}">
                        </div>
                    </div>
                </form>
                @break
        
            @case(2)
                <form enctype="multipart/form-data" id="application_form" method="post" action="{{ route('student.application.start', [ 3, $application->id]) }}">
                    @csrf
                    <div class="py-2 row bg-light border-top shadow">
                        <h4 class="py-3 border-bottom border-top bg-white text-primary my-4 text-uppercase col-sm-12 col-md-12 col-lg-12" style="font-weight:800;">{{ __('text.word_stage') }} 2: {{ __('text.address_details') }} : <span class="text-danger">APPLYING FOR A(AN) {{ $degree->name ?? null }} PROGRAM</span></h4>
                        <div class="py-2 col-sm-6 col-md-4 col-lg-4">
                            <label class="text-secondary  text-capitalize">{{ __('text.word_residence_bilang') }}</label>
                            <div class="">
                                <input type="text" class="form-control text-primary"  name="residence" value="{{ $application->residence }}" required>
                            </div>
                        </div>
                        <div class="py-2 col-sm-6 col-md-4 col-lg-4">
                            <label class="text-secondary  text-capitalize">{{ __('text.telephone_number_bilang') }}</label>
                            <div class="">
                                <input type="tel" class="form-control text-primary"  name="phone" value="{{ auth('student')->user()->phone }}" readonly required>
                            </div>
                        </div>
                        <div class="py-2 col-sm-6 col-md-4 col-lg-4">
                            <label class="text-secondary  text-capitalize">{{ __('text.home_slash_business_phone') }}</label>
                            <div class="">
                                <input type="tel" class="form-control text-primary"  name="extra_phone" value="{{ $application->extra_phone }}">
                            </div>
                        </div>
                        <div class="py-2 col-sm-6 col-md-4 col-lg-4">
                            <label class="text-secondary  text-capitalize">{{ __('text.word_email_bilang') }}</label>
                            <div class="">
                                <input type="email" class="form-control text-primary"  name="email" value="{{ auth('student')->user()->email }}" required readonly>
                            </div>
                        </div>
                        <div class="py-2 col-sm-6 col-md-4 col-lg-5">
                            <label class="text-secondary  text-capitalize">{{ __('text.guardian_slash_parent_name') }}</label>
                            <div class="">
                                <input type="text" class="form-control text-primary"  name="guardian" value="{{ $application->guardian }}" required>
                            </div>
                        </div>
                        <div class="py-2 col-sm-6 col-md-4 col-lg-3">
                            <label class="text-secondary  text-capitalize">{{ __('text.guardian_contact') }}</label>
                            <div class="">
                                <input type="tel" class="form-control text-primary"  name="guardian_phone" value="{{ $application->guardian_phone }}" required>
                            </div>
                        </div>
                        <div class="py-2 col-sm-6 col-md-4 col-lg-4">
                            <label class="text-secondary  text-capitalize">{{ __('text.guardian_address') }}</label>
                            <div class="">
                                <input type="text" class="form-control text-primary"  name="guardian_address" value="{{ $application->guardian_address }}" required>
                            </div>
                        </div>
                        <div class="py-2 col-sm-6 col-md-4 col-lg-5">
                            <label class="text-secondary  text-capitalize">{{ __('text.sponsor_name') }}</label>
                            <div class="">
                                <input type="text" class="form-control text-primary"  name="sponsor" value="{{ $application->sponsor }}" required>
                            </div>
                        </div>
                        <div class="py-2 col-sm-6 col-md-4 col-lg-3">
                            <label class="text-secondary  text-capitalize">{{ __('text.sponsor_contact') }}</label>
                            <div class="">
                                <input type="tel" class="form-control text-primary"  name="sponsor_phone" value="{{ $application->sponsor_phone }}" required>
                            </div>
                        </div>
                        <div class="py-2 col-sm-6 col-md-4 col-lg-4">
                            <label class="text-secondary  text-capitalize">{{ __('text.sponsor_address') }}</label>
                            <div class="">
                                <input type="text" class="form-control text-primary"  name="sponsor_address" value="{{ $application->sponsor_address }}" required>
                            </div>
                        </div>
                        
                        <div class="col-sm-12 col-md-12 col-lg-12 py-4 d-flex justify-content-center">
                            <a href="{{ route('student.application.start', [$step-1, $application->id]) }}" class="px-4 py-1 btn btn-lg btn-danger">{{ __('text.word_back') }}</a>
                            <input type="submit" class="px-4 py-1 btn btn-lg btn-primary" value="{{ __('text.save_and_continue') }}">
                        </div>
                    </div>
                </form>
                @break

            @case(3)
                <form enctype="multipart/form-data" id="application_form" method="post" action="{{ route('student.application.start', [4, $application->id]) }}">
                    @csrf
                    <div class="py-2 row bg-light border-top shadow">
                        <h4 class="py-3 border-bottom border-top bg-white text-primary my-4 text-uppercase col-sm-12 col-md-12 col-lg-12" style="font-weight:800;">{{ __('text.word_stage') }} 3: {{ __('text.academic_records') }} : <span class="text-danger">APPLYING FOR A(AN) {{ $degree->name ?? '' }} PROGRAM</span></h4>
                        <h4 class="py-3 border-bottom border-top bg-white text-primary my-4 text-uppercase col-sm-12 col-md-12 col-lg-12" style="font-weight:800;"> {{ __('text.GCE_OL_or_equivalent') }} </h4>
                        <div class="py-2 col-sm-6 col-md-4 col-lg-4">
                            <label class="text-secondary  text-capitalize">{{ __('text.secondary_school_attended') }}</label>
                            <div class="">
                                <input type="text" class="form-control text-primary"  name="secondary_school" value="{{ $application->secondary_school }}" required>
                            </div>
                        </div>
                        <div class="py-2 col-sm-6 col-md-4 col-lg-3">
                            <label class="text-secondary  text-capitalize">{{ __('text.exam_center') }}</label>
                            <div class="">
                                <input type="text" class="form-control text-primary"  name="secondary_exam_center" value="{{ $application->secondary_exam_center }}" required>
                            </div>
                        </div>
                        <div class="py-2 col-sm-6 col-md-4 col-lg-2">
                            <label class="text-secondary  text-capitalize">{{ __('text.candidate_number') }}</label>
                            <div class="">
                                <input type="text" class="form-control text-primary"  name="secondary_candidate_number" value="{{ $application->secondary_candidate_number }}" required>
                            </div>
                        </div>
                        <div class="py-2 col-sm-6 col-md-4 col-lg-2">
                            <label class="text-secondary  text-capitalize">{{ __('text.academic_year') }}</label>
                            <div class="">
                                <select type="text" class="form-control text-primary"  name="secondary_exam_year" required>
                                    <option></option>
                                    @for($i = 2000; $i < (int)(now()->format('Y'))+1; $i++)
                                        <option value="{{ $i.'/'.$i+1 }}" {{ $application->secondary_exam_year == ($i.'/'.$i+1) ? 'selected' : '' }}>{{ $i.'/'.$i+1 }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 py-2">
                            <table class="border">
                                <thead>
                                    <tr class="text-capitalize">
                                        <th class="text-center border-0" colspan="5">
                                            <div class="d-flex justify-content-end py-2 w-100">
                                                <span class="btn btn-sm px-4 py-1 btn-primary rounded" onclick="addTraining()">add subject</span>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr class="text-capitalize">
                                        <th class="text-center border">{{ __('text.subject_attempted') }}</th>
                                        <th class="text-center border">{{ __('text.word_grade') }}</th>
                                        <th class="text-center border"></th>
                                    <tr>
                                </thead>
                                <tbody id="previous_trainings">
                                    @foreach (json_decode($application->gce_ol_record)??[] as $key=>$record)
                                        <tr class="text-capitalize">
                                            <td class="border"><input class="form-control text-primary"  name="gce_ol_record[subject][$key]" required value="{{ $record->subject }}"></td>
                                            <td class="border"><input class="form-control text-primary"  name="gce_ol_record[grade][$key]" required value="{{ $record->grade }}"></td>
                                            <td class="border"><span class="btn btn-sm px-4 py-1 btn-danger rounded" onclick="dropTraining(event)">{{ __('text.word_drop') }}</span></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                        <h4 class="py-3 border-bottom border-top bg-white text-primary my-4 text-uppercase col-sm-12 col-md-12 col-lg-12" style="font-weight:800;">{{ __('text.GCE_AL_BACC_or_equivalent') }}</h4>
                        <div class="py-2 col-sm-6 col-md-4 col-lg-4">
                            <label class="text-secondary  text-capitalize">{{ __('text.high_school_attended') }}</label>
                            <div class="">
                                <input type="text" class="form-control text-primary"  name="high_school" value="{{ $application->high_school }}">
                            </div>
                        </div>
                        <div class="py-2 col-sm-6 col-md-4 col-lg-3">
                            <label class="text-secondary  text-capitalize">{{ __('text.exam_center') }}</label>
                            <div class="">
                                <input type="text" class="form-control text-primary"  name="high_school_exam_center" value="{{ $application->high_school_exam_center }}">
                            </div>
                        </div>
                        <div class="py-2 col-sm-6 col-md-4 col-lg-2">
                            <label class="text-secondary  text-capitalize">{{ __('text.candidate_number') }}</label>
                            <div class="">
                                <input type="text" class="form-control text-primary"  name="high_school_candidate_number" value="{{ $application->high_school_candidate_number }}">
                            </div>
                        </div>
                        <div class="py-2 col-sm-6 col-md-4 col-lg-2">
                            <label class="text-secondary  text-capitalize">{{ __('text.academic_year') }}</label>
                            <div class="">
                                <select type="text" class="form-control text-primary"  name="high_school_exam_year">
                                    <option></option>
                                    @for($i = 2000; $i < (int)(now()->format('Y'))+1; $i++)
                                        <option value="{{ $i.'/'.$i+1 }}" {{ $application->high_school_exam_year == ($i.'/'.$i+1) ? 'selected' : '' }}>{{ $i.'/'.$i+1 }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 py-2">
                            <table class="border">
                                <thead>
                                    <tr class="text-capitalize">
                                        <th class="text-center border-0" colspan="6">
                                            <div class="d-flex justify-content-end py-2 w-100">
                                                <span class="btn btn-sm px-4 py-1 btn-primary rounded" onclick="addEmployment()">add subject</span>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr class="text-capitalize">
                                        <th class="text-center border">{{ __('text.subject_attempted') }}</th>
                                        <th class="text-center border">{{ __('text.word_grade') }}</th>
                                        <th class="text-center border"></th>
                                    <tr>
                                </thead>
                                <tbody id="employments">
                                    @foreach (json_decode($application->gce_al_record)??[] as $key=>$record)
                                        <tr class="text-capitalize">
                                            <td class="border"><input class="form-control text-primary"  name="gce_al_record[subject][$key]" required value="{{ $record->subject }}"></td>
                                            <td class="border"><input class="form-control text-primary"  name="gce_al_record[grade][$key]" required value="{{ $record->grade }}"></td>
                                            <td class="border"><span class="btn btn-sm px-4 py-1 btn-danger rounded" onclick="dropEmployment(event)">{{ __('text.word_drop') }}</span></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 py-4 d-flex justify-content-center">
                            <a href="{{ route('student.application.start', [$step-1, $application->id]) }}" class="px-4 py-1 btn btn-lg btn-danger">{{ __('text.word_back') }}</a>
                            <input type="submit" class="px-4 py-1 btn btn-lg btn-primary" value="{{ __('text.save_and_continue') }}">
                        </div>
                    </div>
                </form>
                @break
        
            @case(4)
                <form enctype="multipart/form-data" id="application_form" method="post" action="{{ route('student.application.start', [5, $application->id]) }}">
                    @csrf
                    <div class="py-2 row bg-light border-top shadow">
                        <h4 class="py-3 border-bottom border-top bg-white text-primary my-4 text-uppercase col-sm-12 col-md-12 col-lg-12" style="font-weight:800;">{{ __('text.word_stage') }} 4: {{ __('text.program_choice') }} : <span class="text-danger">APPLYING FOR A(AN) {{ $degree->name??'' }} PROGRAM</span></h4>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <label class="text-secondary  text-capitalize">{{ __('text.degree_type') }}</label>
                            <div class="">
                                <select class="form-control text-capitalize text-primary" disabled >
                                    <option></option>
                                    @foreach(\App\Models\Degree::all() as $degree)
                                        <option value="{{ $degree->id }}" {{ $application->degree_id == $degree->id ? 'selected' : '' }}>{{ $degree->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <label class="text-secondary  text-capitalize">{{ __('text.word_program') }}</label>
                            <div class="">
                                <select class="form-control text-capitalize text-primary" name="program" required >
                                    <option></option>
                                    @foreach($application->degree->programs as $program)
                                        <option value="{{ $program->id }}" {{ $application->program == $program->id ? 'selected' : '' }}>{{ $program->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-sm-12 col-md-12 col-lg-12 py-4 d-flex justify-content-center">
                            <a href="{{ route('student.application.start', [$step-1, $application->id]) }}" class="px-4 py-1 btn btn-lg btn-danger">{{ __('text.word_back') }}</a>
                            <input type="submit" class="px-4 py-1 btn btn-lg btn-primary" value="{{ __('text.save_and_continue') }}">
                        </div>
                    </div>
                </form>
                @break
        
            @case(5)
                <form enctype="multipart/form-data" id="application_form" method="post" action="{{ route('student.application.start', [6, $application->id]) }}">
                    @csrf
                    <div class="py-2 row text-capitalize bg-light">
                        <!-- hidden field for submiting application form -->
                        <h4 class="py-3 border-bottom border-top bg-white text-primary my-4 text-uppercase col-sm-12 col-md-12 col-lg-12" style="font-weight:800;">{{ __('text.word_stage') }} 5: {{ __('text.preview_and_submit_form_bilang') }} : <span class="text-danger">APPLYING FOR A(AN) {{ $degree->name ?? '' }} PROGRAM</span></h4>
                        
                        <!-- STAGE 1 PREVIEW -->
                            <h4 class="py-1 border-bottom border-top border-warning bg-white text-danger my-4 text-uppercase col-sm-12 col-md-12 col-lg-12" style="font-weight:500;">{{ __('text.word_stage') }} 1: {{ __('text.personal_details_bilang') }} : <a href="{{ route('student.application.start', [1, $application->id]) }}" class="text-white btn py-1 px-2 btn-sm">{{ __('text.view_and_or_edit_stage') }} 1</a></h4>
                            <div class="py-2 col-sm-6 col-md-4 col-lg-5">
                                <label class="text-secondary  text-capitalize">{{ __('text.word_name') }}</label>
                                <div class="">
                                    <label class="form-control text-primary border-0 ">{{ $application->name ?? '' }}</label>
                                </div>
                            </div>
                            <div class="py-2 col-sm-6 col-md-4 col-lg-3">
                                <label class="text-secondary  text-capitalize">{{ __('text.word_gender_bilang') }}</label>
                                <div class="">
                                    <label class="form-control text-primary border-0 ">{{ $application->gender ?? '' }}</select>
                                </div>
                            </div>
                            <div class="py-2 col-sm-6 col-md-4 col-lg-4">
                                <label class="text-secondary  text-capitalize">{{ __('text.date_of_birth_bilang') }}</label>
                                <div class="">
                                    <label class="form-control text-primary border-0 ">{{ $application->dob ?? '' }}</label>
                                </div>
                            </div>
                            <div class="py-2 col-sm-6 col-md-4 col-lg-3">
                                <label class="text-secondary  text-capitalize">{{ __('text.place_of_birth_bilang') }}</label>
                                <div class="">
                                    <label class="form-control text-primary border-0 ">{{ $application->pob ?? '' }}</label>
                                </div>
                            </div>
                            <div class="py-2 col-sm-6 col-md-4 col-lg-3">
                                <label class="text-secondary  text-capitalize">{{ __('text.ID_card_number') }}</label>
                                <div class="">
                                    <label class="form-control text-primary border-0 ">{{ $application->id_card_number ?? '' }}</label>
                                </div>
                            </div>
                            <div class="py-2 col-sm-6 col-md-4 col-lg-3">
                                <label class="text-secondary  text-capitalize">{{ __('text.date_of_issue') }}</label>
                                <div class="">
                                    <label class="form-control text-primary border-0 ">{{ $application->id_date_of_issue ?? '' }}</label>
                                </div>
                            </div>
                            <div class="py-2 col-sm-6 col-md-4 col-lg-3">
                                <label class="text-secondary  text-capitalize">{{ __('text.place_of_issue') }}</label>
                                <div class="">
                                    <label class="form-control text-primary border-0 ">{{ $application->id_place_of_issue ?? '' }}</label>
                                </div>
                            </div>
                            <div class="py-2 col-sm-6 col-md-4 col-lg-3">
                                <label class="text-secondary  text-capitalize">{{ __('text.word_region_bilang') }}</label>
                                <div class="">
                                    <label class="form-control text-primary border-0 ">{{ $application->nationality ?? '' }}</label>
                                </div>
                            </div>
                            <div class="py-2 col-sm-6 col-md-4 col-lg-3">
                                <label class="text-secondary  text-capitalize">{{ __('text.region_of_origin') }}</label>
                                <div class="">
                                    <label class="form-control text-primary border-0 ">{{ $application->_region->region ?? '' }}</label>
                                </div>
                            </div>
                            <div class="py-2 col-sm-6 col-md-4 col-lg-3">
                                <label class="text-secondary  text-capitalize">{{ __('text.country_of_birth') }}</label>
                                <div class="">
                                    <label class="form-control text-primary border-0 ">{{ $application->country_of_birth ?? '' }}</label>
                                </div>
                            </div>
                            <div class="py-2 col-sm-6 col-md-4 col-lg-4">
                                <label class="text-secondary  text-capitalize">{{ __('text.where_did_you_hear_about_us') }}</label>
                                <div class="">
                                    <label class="form-control text-primary border-0 ">{{ $application->referer ?? '' }}</label>
                                </div>
                            </div>


                        <!-- STAGE 2 -->
                            <h4 class="py-1 border-bottom border-top border-warning bg-white text-danger my-4 text-uppercase col-sm-12 col-md-12 col-lg-12" style="font-weight:500;">{{ __('text.word_stage') }} 2: {{ __('text.address_details') }} : <a href="{{ route('student.application.start', [2, $application->id]) }}" class="text-white btn py-1 px-2 btn-sm">{{ __('text.view_and_or_edit_stage') }} 2</a></h4>
                            <div class="py-2 col-sm-6 col-md-4 col-lg-3">
                                <label class="text-secondary  text-capitalize">{{ __('text.word_residence_bilang') }}</label>
                                <div class="">
                                    <label class="form-control text-primary border-0 ">{{ $application->residence ?? '' }}<label>
                                </div>
                            </div>
                            <div class="py-2 col-sm-6 col-md-4 col-lg-5">
                                <label class="text-secondary  text-capitalize">{{ __('text.telephone_number_bilang') }}</label>
                                <div class="">
                                    <label class="form-control text-primary border-0 ">{{ $application->phone ?? '' }}</label>
                                </div>
                            </div>
                            <div class="py-2 col-sm-6 col-md-4 col-lg-5">
                                <label class="text-secondary  text-capitalize">{{ __('text.home_slash_business_phone') }}</label>
                                <div class="">
                                    <label class="form-control text-primary border-0 ">{{ $application->extra_phone ?? '' }}</label>
                                </div>
                            </div>
                            <div class="py-2 col-sm-6 col-md-4 col-lg-4">
                                <label class="text-secondary  text-capitalize">{{ __('text.word_email_bilang') }}</label>
                                <div class="">
                                    <label class="form-control text-primary border-0 ">{{ $application->email ?? '' }}</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <label class="text-secondary  text-capitalize">{{ __('text.word_guardian') }}</label>
                                <div class="">
                                    <label class="form-control text-primary border-0">{{ $application->guardian ?? '' }}</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <label class=" text-secondary text-capitalize">{{ __('text.guardian_contact') }}</label>
                                <div class="">
                                    <label class="form-control text-primary border-0">{{ $application->guardian_phone ?? '' }}</label>
                                </div>
                            </div>
                            <div class="py-2 col-sm-6 col-md-4 col-lg-3">
                                <label class="text-secondary  text-capitalize">{{ __('text.guardian_address') }}</label>
                                <div class="">
                                    <label class="form-control text-primary border-0">{{ $application->guardian_address ?? '' }}</label>
                                </div>
                            </div>
                            <div class="py-2 col-sm-6 col-md-4 col-lg-3">
                                <label class="text-secondary  text-capitalize">{{ __('text.word_sponsor') }}</label>
                                <div class="">
                                    <label class="form-control text-primary border-0">{{ $application->sponsor ?? '' }}</label>
                                </div>
                            </div>
                            <div class="py-2 col-sm-6 col-md-4 col-lg-3">
                                <label class="text-secondary  text-capitalize">{{ __('text.sponsor_contact') }}</label>
                                <div class="">
                                    <label class="form-control text-primary border-0">{{ $application->sponsor_phone ?? '' }}</label>
                                </div>
                            </div>
                            <div class="py-2 col-sm-6 col-md-4 col-lg-3">
                                <label class="text-secondary  text-capitalize">{{ __('text.sponsor_address') }}</label>
                                <div class="">
                                    <label class="form-control text-primary border-0">{{ $application->sponsor_address ?? '' }}</label>
                                </div>
                            </div>

                        <!-- STAGE 3 -->
                            <h4 class="py-1 border-bottom border-top border-warning bg-white text-danger my-4 text-uppercase col-sm-12 col-md-12 col-lg-12" style="font-weight:500;">{{ __('text.word_stage') }} 3: {{ __('text.academic_records') }} : <a href="{{ route('student.application.start', [3, $application->id]) }}" class="text-white btn py-1 px-2 btn-sm">{{ __('text.view_and_or_edit_stage') }} 3</a></h4>
                            <h4 class="py-3 border-bottom border-top bg-white text-dark my-4 text-uppercase col-sm-12 col-md-12 col-lg-12" style="font-weight:500;"> {{ __('text.GCE_OL_or_equivalent') }}</h4>
                            <div class="py-2 col-sm-6 col-md-4 col-lg-4">
                                <label class="text-secondary  text-capitalize">{{ __('text.secondary_school_attended') }}</label>
                                <div class="">
                                    <label class="form-control text-primary border-0">{{ $application->secondary_school ?? '' }}</label>
                                </div>
                            </div>
                            <div class="py-2 col-sm-6 col-md-4 col-lg-4">
                                <label class="text-secondary  text-capitalize">{{ __('text.exam_center') }}</label>
                                <div class="">
                                    <label class="form-control text-primary border-0">{{ $application->secondary_exam_center ?? '' }}</label>
                                </div>
                            </div>
                            <div class="py-2 col-sm-6 col-md-2 col-lg-2">
                                <label class="text-secondary  text-capitalize">{{ __('text.candidate_number') }}</label>
                                <div class="">
                                    <label class="form-control text-primary border-0">{{ $application->secondary_candidate_number ?? '' }}</label>
                                </div>
                            </div>
                            <div class="py-2 col-sm-6 col-md-2 col-lg-2">
                                <label class="text-secondary  text-capitalize">{{ __('text.academic_year') }}</label>
                                <div class="">
                                    <label class="form-control text-primary border-0">{{ $application->secondary_exam_year ?? '' }}</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 py-2">
                                <table class="border">
                                    <thead>
                                        <tr class="text-capitalize">
                                            <th class="text-center border">{{ __('text.word_subject') }}</th>
                                            <th class="text-center border">{{ __('text.word_grade') }}</th>
                                        <tr>
                                    </thead>
                                    <tbody id="previous_trainings">
                                        @foreach (json_decode($application->gce_ol_record)??[] as $key=>$rec)
                                            <tr class="text-capitalize">
                                                <td class="border"><label class="form-control text-primary border-0">{{ $rec->subject }}</label></td>
                                                <td class="border"><label class="form-control text-primary border-0">{{ $rec->grade }}</label></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <h4 class="py-3 border-bottom border-top bg-white text-dark my-4 text-uppercase col-sm-12 col-md-12 col-lg-12" style="font-weight:500;"> {{ __('text.GCE_AL_BACC_or_equivalent') }}</h4>
                            <div class="py-2 col-sm-6 col-md-4 col-lg-4">
                                <label class="text-secondary  text-capitalize">{{ __('text.high_school_attended') }}</label>
                                <div class="">
                                    <label class="form-control text-primary border-0">{{ $application->high_school ?? '' }}</label>
                                </div>
                            </div>
                            <div class="py-2 col-sm-6 col-md-4 col-lg-4">
                                <label class="text-secondary  text-capitalize">{{ __('text.exam_center') }}</label>
                                <div class="">
                                    <label class="form-control text-primary border-0">{{ $application->high_school_exam_center ?? '' }}</label>
                                </div>
                            </div>
                            <div class="py-2 col-sm-6 col-md-2 col-lg-2">
                                <label class="text-secondary  text-capitalize">{{ __('text.candidate_number') }}</label>
                                <div class="">
                                    <label class="form-control text-primary border-0">{{ $application->high_school_candidate_number ?? '' }}</label>
                                </div>
                            </div>
                            <div class="py-2 col-sm-6 col-md-2 col-lg-2">
                                <label class="text-secondary  text-capitalize">{{ __('text.academic_year') }}</label>
                                <div class="">
                                    <label class="form-control text-primary border-0">{{ $application->high_school_exam_year ?? '' }}</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 py-2">
                                <table class="border">
                                    <thead>
                                        <tr class="text-capitalize">
                                            <th class="text-center border">{{ __('text.word_subject') }}</th>
                                            <th class="text-center border">{{ __('text.word_grade') }}</th>
                                        <tr>
                                    </thead>
                                    <tbody id="employments">
                                        @foreach (json_decode($application->gce_al_record)??[] as $key=>$rec)
                                            <tr class="text-capitalize">
                                                <td class="border"><label class="form-control text-primary border-0">{{ $rec->subject }}</label></td>
                                                <td class="border"><label class="form-control text-primary border-0">{{ $rec->grade }}</label></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        <!-- STAGE 4 -->

                            <h4 class="py-1 border-bottom border-top border-warning bg-white text-danger my-4 text-uppercase col-sm-12 col-md-12 col-lg-12" style="font-weight:500;">{{ __('text.word_stage') }} 4: {{ __('text.program_choice') }} : <a href="{{ route('student.application.start', [4, $application->id]) }}" class="text-white btn py-1 px-2 btn-sm">{{ __('text.view_and_or_edit_stage') }} 4</a></h4>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <label class="text-secondary  text-capitalize">{{ __('text.degree_type') }}</label>
                                <div class="">
                                    <label class="form-control text-primary border-0">{{ $degree->name ?? '' }}</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <label class="text-secondary text-capitalize">{{ __('text.word_program') }}</label>
                                <div class="">
                                    <label class="form-control text-primary border-0">{{ $application->_program->name ?? '' }}</label>
                                </div>
                            </div>

                        
                        <div class="col-sm-12 col-md-12 col-lg-12 py-4 mt-5 d-flex justify-content-center text-uppercase">
                            <a href="{{ route('student.application.start', [$step-1, $application->id]) }}" class="px-4 py-1 btn btn-lg btn-danger">{{ __('text.word_back') }}</a>
                            {{-- <a href="{{ route('student.home') }}" class="px-4 py-1 btn btn-lg btn-success">{{ __('text.pay_later') }}</a> --}}
                            <button type="submit" class="px-4 py-1 btn btn-lg btn-primary text-uppercase">{{ __('text.save_and_continue') }}</button>
                        </div>
                    </div>
                </form>
                @break

            @case(6)
                <form enctype="multipart/form-data" id="application_form" method="post" action="{{ route('student.application.start', [7, $application->id]) }}">
                    @csrf
                    <div class="py-2 row bg-light border-top shadow">
                        <input type="hidden" value="1" name="submitted">
                        <div class="col-sm-12 col-md-12 col-lg-12 d-flex">
                            <div class="col-sm-10 col-md-8 col-lg-6 rounded bg-white py-5 my-3 shadow mx-auto">
                                {{-- <div class="py-4 text-info text-center ">You are about to make a payment of {{ $degree->amount }} CFA for application fee
                                </div> --}}
                                <div class="py-3">
                                    <label class="text-secondary text-capitalize">{{ __('text.momo_number_used_in_payment') }} (<span class="text-danger">{{ __('text.without_country_code') }}</span>)</label>
                                    <div class="">
                                        <input type="tel" class="form-control text-primary"  name="momo_number" value="{{ $application->momo_number }}">
                                    </div>
                                </div>
                                <div class="py-3">
                                    <label class="text-secondary text-capitalize">Transaction ID </label>
                                    <div class="">
                                        <input type="text" min="10" max="10" class="form-control text-primary"  name="transaction_id" value="{{ $application->transaction_id }}">
                                    </div>
                                </div>
                                <div class="py-5 d-flex justify-content-center">
                                    <a href="{{ route('student.application.start', [$step-1, $application->id]) }}" class="px-4 py-1 btn btn-xs btn-danger">{{ __('text.word_back') }}</a>
                                    <input type="submit" class="px-4 py-1 btn btn-xs btn-primary" value="{{ __('text.save_and_continue') }}">
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </form>
                @break
        @endswitch
        
    </div>
@endsection
@section('script')
    <script>

        $(document).ready(function(){
            if("{{ $application->degree_id }}" != null){
                loadCampusDegrees('{{ $application->campus_id }}');
            }
            if("{{ $application->division }}" != null){
                setDivisions('{{ $application->region }}');
            }
            if("{{ $application->level }}" != null){
                setLevels("{{ $application->program_first_choice }}");
            }
        });
        // momo preview generator
        let momoPreview = function(event){
            let file = event.target.files[0];
            if(file != null){
                let url = URL.createObjectURL(file);
                $('#momo_image_preview').attr('src', url);
            }
        }
        // Add and drop previous trainings form table rows
        let addTraining = function(){
            let key = `_key_${ Date.now() }_${ Math.random()*1000000 }`;
            let html = `<tr class="text-capitalize">
                            <td class="border">
                                <select class="form-control text-primary"  name="gce_ol_record[subject][${key}]" required onchange="check_specify(event)">
                                    <option>subject</option>
                                    @foreach (\App\Models\Subject::orderBy('name', 'ASC')->get() as $subj)
                                        <option value="{{ $subj->name }}">{{ $subj->name }}</option>
                                    @endforeach
                                    <option value="__SPECIFY__">SUBJECT NOT FOUND</option>
                                <select>
                            </td>
                            <td class="border">
                                <select class="form-control text-primary"  name="gce_ol_record[grade][${key}]" required value="">
                                    <option>grade</option>
                                    @foreach (['A', 'B', 'C', 'D', 'E', 'F', 'U', 'COMPENSATORY'] as $grd)
                                        <option value="{{ $grd }}">{{ $grd }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="border"><span class="btn btn-sm px-4 py-1 btn-danger rounded" onclick="dropTraining(event)">{{ __('text.word_drop') }}</span></td>
                        </tr>`;
            $('#previous_trainings').append(html);
        } 

        let check_specify = function(event){
            if(event.target.value == '__SPECIFY__'){
                let name = $(event.target).attr('name');
                let html = `<input class="form-control text-primary text-uppercase"  placeholder="specify subject"  name="${name}" required>`;
                $(event.target).parent().html(html);
            }
        }

        let dropTraining = function(event){
            let training = $(event.target).parent().parent();
            // let training = $('#previous_trainings').children().last();
            if(training != null){
                training.remove();
            }
        }
        // Add and drop AL subjects form table rows
        let addEmployment = function(){
            let key = `_key_${ Date.now() }_${ Math.random()*1000000 }`;
            let html = `<tr class="text-capitalize">
                            <td class="border">
                                <select class="form-control text-primary"  name="gce_al_record[subject][${key}]" required onchange="check_specify(event)">
                                    <option>subject</option>
                                    @foreach (\App\Models\Subject::orderBy('name', 'ASC')->get() as $subj)
                                        <option value="{{ $subj->name }}">{{ $subj->name }}</option>
                                    @endforeach
                                    <option value="__SPECIFY__">SUBJECT NOT FOUND</option>
                                </select>
                            </td>
                            <td class="border">
                                <select class="form-control text-primary"  name="gce_al_record[grade][${key}]" required>
                                    <option>grade</option>
                                    @foreach (['A', 'B', 'C', 'D', 'E', 'F', 'U', 'COMPENSATORY'] as $grd)
                                        <option value="{{ $grd }}">{{ $grd }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="border"><span class="btn btn-sm px-4 py-1 btn-danger rounded" onclick="dropEmployment(event)">{{ __('text.word_drop') }}</span></td>
                        </tr>`;
            $('#employments').append(html);
        } 

        let dropEmployment = function(event){
            let training = $(event.target).parent().parent();
            // let training = $('#previous_trainings').children().last();
            if(training != null){
                training.remove();
            }
        }

        let completeForm = function(){
            let confirmed = confirm('By clicking this button, you are confirming that every information supplied is correct.');
            if(confirmed){
                $('#application_form').submit();
            }
        }

        let setDegreeTypes = function(event){
            let campus = event.target.value;
            loadCampusDegrees(campus);
        }

        let loadCampusDegrees = function(campus){
            url = `{{ route('student.campus.degrees', '__CID__') }}`.replace('__CID__', campus);
            $.ajax({
                method: 'get', url: url,
                success: function(data){
                    console.log(data);
                    let html = `<option>{{ __('text.select_degree_type') }}</option>`;
                    data.forEach(element => {
                        html+=`<option value="${element.id}" ${ '{{ $application->degree_id }}' == element.id ? 'selected' : '' } >${element.deg_name}</option>`;
                    });
                    $('#degree_types').html(html);
                }
            })
        }

        let loadDivisions = function(event){
            let region = event.target.value;
            setDivisions(region);
        }

        let setDivisions = function(region){
            url = "{{ route('student.region.divisions', '__RID__') }}".replace('__RID__', region);
            $.ajax({
                method: 'get', url: url, 
                success: function(data){
                    let html = `<option>{{ __('text.select_division') }}</option>`
                    data.forEach(element => {
                        html+=`<option value="${element.id}" ${'{{ $application->division}}' == element.id ? 'selected' : '' }>${element.name}</option>`.replace('region_id', element.id)
                    });
                    $('#divisions').html(html);
                }
            })
        }

        let campusDegreeCertPorgrams = function(event){
            cert_id = event.target.value;
            campus_id = "{{ $application->campus_id }}";
            degree_id = "{{ $application->degree_id }}";

            url = "{{ route('student.campus.degree.cert.programs', ['__CmpID__', '__DegID__', '__CertID__']) }}".replace('__CmpID__', camus_id).replace('__DegID__').replace('__CertID__');
            $.ajax({
                method: 'get', url: url,
                success: function(data){
                    console.log(data);
                    let html = `<option></option>`;
                    data.forEach(element=>{
                        html += `<option value="${element.id}">${element.certi}</option>`;
                    })

                }
            })
        }

        let loadCplevels = function(event){
            campus_id = "{{ $application->campus_id }}";
            program_id = event.target.value;

            setLevels(program_id);
        }

        let setLevels = function(program_id){

            campus_id = "{{ $application->campus_id }}";

            url = "{{ route('student.campus.program.levels', ['__CmpID__', '__PrgID__']) }}".replace('__CmpID__', campus_id).replace('__PrgID__', program_id);
            $.ajax({
                method : 'get', url : url, 
                success : function(data){
                    console.log(data);
                    let html = `<option></option>`;
                    data.forEach(element=>{
                        html += `<option value="${element.level}" ${ "{{ $application->level }}" == element.level ? 'selected' : ''}>${element.level}</option>`;
                    });
                    $('#cplevels').html(html);
                }
            });
        }

        let specify_source = function(event){
            if(event.target.value == 'OTHERS'){
                let html = `
                    <label class="text-secondary  text-capitalize">{{ __('text.word_specify') }}</label>
                    <div class="">
                        <input type="text" class="form-control text-primary"  name="referer" required>
                    </div>`;
                $('#specify_source').html(html);
            }else{
                $('#specify_source').html('');
            }
        }

    </script>
@endsection
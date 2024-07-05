@extends('admin.layout')
@section('section')
    <div class="py-4">
        <form enctype="multipart/form-data" id="application_form" method="post">
            @csrf
            <div class="py-2 row text-capitalize bg-light">
                <!-- STAGE 1 PREVIEW -->
                    <h4 class="py-1 border-bottom border-top border-warning bg-white text-danger my-4 text-uppercase col-sm-12 col-md-12 col-lg-12" style="font-weight:500;">{{ __('text.word_stage') }} 1: {{ __('text.personal_details_bilang') }}</h4>
                    <div class="py-2 col-sm-6 col-md-4 col-lg-5">
                        <label class="text-secondary  text-capitalize">{{ __('text.word_name') }}</label>
                        <div class="">
                            <input type="text" name="name" class="form-control text-primary " value="{{ $application->name ?? '' }}">
                            {{-- <label class="form-control text-primary border-0 ">{{ $application->name ?? '' }}</label> --}}
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
                    <h4 class="py-1 border-bottom border-top border-warning bg-white text-danger my-4 text-uppercase col-sm-12 col-md-12 col-lg-12" style="font-weight:500;">{{ __('text.word_stage') }} 2: {{ __('text.address_details') }}</h4>
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
                    <h4 class="py-1 border-bottom border-top border-warning bg-white text-danger my-4 text-uppercase col-sm-12 col-md-12 col-lg-12" style="font-weight:500;">{{ __('text.word_stage') }} 3: {{ __('text.academic_records') }} </h4>
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

                    <h4 class="py-1 border-bottom border-top border-warning bg-white text-danger my-4 text-uppercase col-sm-12 col-md-12 col-lg-12" style="font-weight:500;">{{ __('text.word_stage') }} 4: {{ __('text.program_choice') }} </h4>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <label class="text-secondary  text-capitalize">{{ __('text.degree_type') }}</label>
                        <div class="">
                            <label class="form-control text-primary border-0">{{ $application->degree->name ?? '' }}</label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <label class="text-secondary text-capitalize">{{ __('text.word_program') }}</label>
                        <div class="">
                            <select class="form-control text-primary" name="program" {{ $application->admitted == 1 ? 'disabled' : '' }}>
                                <option></option>
                                @foreach ($programs as $prog)
                                    <option value="{{ $prog->id }}" {{ $application->program == $prog->id ? 'selected' : ''}}>{{ $prog->name }}</option>
                                @endforeach
                            </select>
                            {{-- <label class="form-control text-primary border-0">{{ $application->_program->name ?? '' }}</label> --}}
                        </div>
                    </div>

                
                <div class="col-sm-12 col-md-12 col-lg-12 py-4 mt-5 d-flex justify-content-center text-uppercase">
                    <a href="{{ route('admin.applications.update') }}" class="px-4 py-1 btn btn-sm btn-dark text-uppercase">{{ __('text.word_back') }}</a>
                    <button type="submit" class="px-4 py-1 btn btn-sm btn-primary text-uppercase">{{ __('text.word_update') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script>

        $(document).ready(function(){

            if("{{ $application->level }}" != null){
                setLevels("{{ $application->program_first_choice }}");
            }
        });

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

    </script>
@endsection
@extends('student.printable')
@section('section')
    <div class="py-3">
        <div class="bg-white px-3 py-1">
            <div style="border-radius: 2.3rem;" class="w-75 mx-auto my-3 border border-2 border-dark py-4 px-3 text-center">Admission Number:_______________________________________</div>
            <div style="width: 90%; border-radius: 8rem 8rem 0 0;" class="mx-auto py-5 px-3">
                <div class="w-75 mx-auto my-3 py-3 px-3 shadow text-center" style="border-radius: 7rem 7rem 0 0; font-size: 2rem; font-weight: 700;">
                    <span class="text-uppercase">in affiliation with the university of bamenda</span> (UBa)
                </div>
                <div class="text-center py-3">
                    <span class="d-block" style="font-size: 1.4rem">PO BOX 462 BUEA</span>
                    <span class="d-block" style="font-size: 1.2rem">South West Region, Republic of Cameroon</span>
                    <span class="d-block" style="font-size: 1rem">Tel +237 679 821 672 / 677 962 333</span>
                    <span class="d-block mt-3 text-primary" style="font-size: 1rem">E-mail: info@himsbuea.org/registrar@himsbuea.org</span>
                    <span class="d-block text-primary" style="font-size: 1rem">Website: www.himsbuea.org</span>
                </div>
                <div class="py-4 my-3 text-center shadow">
                    <h4 class="text-uppercase text-dark">undergraduate admission form</h4><br><span class="text-primary">IN</span>
                    <label class="d-block py-2">Programme: ________________________________________________</label>
                    <label class="d-block py-2">Level: ________________________________________________</label>
                </div>
                    <label class="d-block py-5 text-center">Academic Year<br> ________________________________________________</label>
            </div>
            <div class="w-75 mx-auto d-flex py-3 justify-content-between text-primary" style=" font-style: italic;">
                <div style="width: 35%;" class="shadow px-3 py-5 text-center">
                    Name of admission officer: <br> __________________________ <br> Signature: <br> ________________________ <br> Date: <br> ______________________
                </div>
                <div style="width: 25%;" class="shadow px-3 py-5 text-center">
                    Affix a <br> passport size <br> photo here
                </div>
                <div style="width: 35%;" class="shadow px-3 py-5 text-center">
                    <span class="text-dark">ADMISSION DECISSION</span><br>ADMITTED: <input type="checkbox" style="width:2rem; height: 2rem;"> <br> NOT ADMITTED: <input type="checkbox" style="width:2rem; height: 2rem;"> <br> OBSERVATION <br> _______________________
                </div>
            </div>
        </div>
    </div>
    <div class="py-2">
        <div class="bg-white px-3 py-1">
            <h4 class="text-uppercase py-1" style="font-weight: 700;">admission requirements</h4>
            <h4 class="text-capitalize" style="font-weight: 700;">Ensure to attach the following documents:</h4>
            <h5 class="text-capitalize" style="font-weight: 700;">for HND</h5>
            <ul style="list-style-type: circle; padding-left: 1rem;">
                <li class="text-capitalize">2 photocopies of GCE ordinary level slip/certificate or probatoire</li>
                <li class="text-capitalize">2 photocopies of GCE advanced level slip/certificate or Baccalaureat</li>
                <li class="text-capitalize">2 photocopies of birth certificate</li>
                <li class="text-capitalize">2 photocopies of valid national ID card</li>
                <li class="text-capitalize">2 passport sized photographs</li>
            </ul>
            <h5 class="text-capitalize" style="font-weight: 700;">for B.TECH/BBA</h5>
            <ul style="list-style-type: circle; padding-left: 1rem;">
                <li class="text-capitalize">Certified copy of HND result slip or certificate (By the ministry of higher education)</li>
                <li class="text-capitalize">photocopy of advanced level certificate or equivalent</li>
                <li class="text-capitalize">photocopy of ordinary level certificate or equivalent</li>
                <li class="text-capitalize">certified copy of birth certificate</li>
                <li class="text-capitalize">medical certificate of fitness from a government hospital</li>
                <li class="text-capitalize">4 coloured passport sized photographs</li>
                <li class="text-capitalize">Signed year 1&2 or HND school transcript (from your institution)</li>
                <li class="text-capitalize">photocopy of valid national ID card</li>
            </ul>
        </div> 
    </div>
    <h5 style="font-weight: 700; font-style: italic;">NB: upon admission, candidate(s) may be required to present originals for the purpose of authentification.</h5>
    <div class="py-2 mt-4">
        <div class="bg-white px-3 py-1 d-flex flex-wrap justify-content-between">
            <h4 class="text-uppercase py-1 w-100" style="font-weight: 700;">personal details</h4>
            <div class="d-flex flex-wrap text-capitalize py-1 mx-1 my-2 px-3 rounded border" style="width: 66%;"><span class="text-secondary" style="font-weight: 700;">name (as on birth certificate)<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->name }}<span></div>
            <div class="d-flex flex-wrap text-capitalize py-1 mx-1 my-2 px-3 rounded border" style="width: 32%;"><span class="text-secondary" style="font-weight: 700;">date of birth<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->dob }}<span></div>
            <div class="d-flex flex-wrap text-capitalize py-1 mx-1 my-2 px-3 rounded border" style="width: 32%;"><span class="text-secondary" style="font-weight: 700;">place of birth<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->pob }}<span></div>
            <div class="d-flex flex-wrap text-capitalize py-1 mx-1 my-2 px-3 rounded border" style="width: 32%;"><span class="text-secondary" style="font-weight: 700;">sex<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->gender }}<span></div>
            <div class="d-flex flex-wrap text-capitalize py-1 mx-1 my-2 px-3 rounded border" style="width: 32%;"><span class="text-secondary" style="font-weight: 700;">ID card number<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->id_card_number }}<span></div>
            <div class="d-flex flex-wrap text-capitalize py-1 mx-1 my-2 px-3 rounded border" style="width: 32%;"><span class="text-secondary" style="font-weight: 700;">date of issue<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->id_date_of_issue }}<span></div>
            <div class="d-flex flex-wrap text-capitalize py-1 mx-1 my-2 px-3 rounded border" style="width: 32%;"><span class="text-secondary" style="font-weight: 700;">place of issue<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->id_place_of_issue }}<span></div>
            <div class="d-flex flex-wrap text-capitalize py-1 mx-1 my-2 px-3 rounded border" style="width: 32%;"><span class="text-secondary" style="font-weight: 700;">Nationality<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->nationality }}<span></div>
            <div class="d-flex flex-wrap text-capitalize py-1 mx-1 my-2 px-3 rounded border" style="width: 32%;"><span class="text-secondary" style="font-weight: 700;">region of origin<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->_region->region }}<span></div>
            <div class="d-flex flex-wrap text-capitalize py-1 mx-1 my-2 px-3 rounded border" style="width: 32%;"><span class="text-secondary" style="font-weight: 700;">country of birth<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->country_of_birth }}<span></div>
        </div> 
    </div>
    <div class="py-2">
        <div class="bg-white px-3 py-1 d-flex flex-wrap justify-content-between">
            <h4 class="text-uppercase py-1 w-100" style="font-weight: 700;">address details</h4>
            <div class="d-flex flex-wrap text-capitalize py-1 mx-1 my-2 px-3 rounded border" style="width: 32%;"><span class="text-secondary" style="font-weight: 700;">Residential address<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->residence }}<span></div>
            <div class="d-flex flex-wrap text-capitalize py-1 mx-1 my-2 px-3 rounded border" style="width: 32%;"><span class="text-secondary" style="font-weight: 700;">personal phone number<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->phone }}<span></div>
            <div class="d-flex flex-wrap text-capitalize py-1 mx-1 my-2 px-3 rounded border" style="width: 32%;"><span class="text-secondary" style="font-weight: 700;">home/business numbers<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->extra_phone }}<span></div>
            <div class="d-flex flex-wrap text-capitalize py-1 mx-1 my-2 px-3 rounded border" style="width: 32%;"><span class="text-secondary" style="font-weight: 700;">email address<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->email }}<span></div>
            <h5 style="font-weight: 700; padding-block: 0.5rem; width:100%;">Parent's or Guardian's complete address</h5>
            <div class="d-flex flex-wrap text-capitalize py-1 mx-1 my-2 px-3 rounded border" style="width: 50%;"><span class="text-secondary" style="font-weight: 700;">name of parent/guardian<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->guardian }}<span></div>
            <div class="d-flex flex-wrap text-capitalize py-1 mx-1 my-2 px-3 rounded border" style="width: 20%;"><span class="text-secondary" style="font-weight: 700;">contact<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->guardian_contact }}<span></div>
            <div class="d-flex flex-wrap text-capitalize py-1 mx-1 my-2 px-3 rounded border" style="width: 25%;"><span class="text-secondary" style="font-weight: 700;">address<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->guardian_address }}<span></div>
            <div class="d-flex flex-wrap text-capitalize py-1 mx-1 my-2 px-3 rounded border" style="width: 50%;"><span class="text-secondary" style="font-weight: 700;">name of sponsor<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->sponsor }}<span></div>
            <div class="d-flex flex-wrap text-capitalize py-1 mx-1 my-2 px-3 rounded border" style="width: 20%;"><span class="text-secondary" style="font-weight: 700;">contact<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->sponsor_contact }}<span></div>
            <div class="d-flex flex-wrap text-capitalize py-1 mx-1 my-2 px-3 rounded border" style="width: 25%;"><span class="text-secondary" style="font-weight: 700;">address<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->sponsor_address }}<span></div>
        </div> 
    </div>
    <div class="py-2">
        <div class="bg-white px-3 py-1">
            <h4 class="text-uppercase py-1" style="font-weight: 700;">qualifications / academic records</h4>
            <h5 style="font-weight: 700; padding-block: 0.5rem; text-transform: capitalize;">GCE O/L or equivalent</h5>
            <div class="d-flex py-2">
                <table class="border border-2 w-75">
                    <thead class="text-dark border border-2 border-dark py-3" style="font-weight: 700; font-size: 1.6rem;">
                        <th class="border-left border-right">Subject attempted</th>
                        <th class="border-left border-right">Grade</th>
                    </thead>
                    <tbody style="font-size: 1.3rem">
                        @foreach (json_decode($application->gce_ol_record) as $rec)
                            <tr class="border border-2"><td class="border">{{ $rec->subject }}</td><td class="border">{{ $rec->grade }}</td></tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="border border-2 w-25">
                    <h5 class="border-border-2 py-2 px-2 text-center text-dark" style="font-weight: 700; font-size: 1.6rem;">School where the qualification was earned</h5>
                    <div class="py-3 text-center w-100 border border-2">{{ $application->secondary_school }}</div>
                    <table>
                        <thead class="border-border-2 py-2 text-dark" style="font-weight: 700; font-size: 1.6rem;">
                            <th class="border">Exam Center</th>
                            <th class="border">Candidate No:</th>
                            <th class="border">Year</th>
                        </thead>
                        <tbody style="font-size: 1.3rem">
                            <tr class="border border-2"><td class="border">{{ $application->secondary_exam_center }}</td><td class="border">{{ $application->secondary_candidate_number }}</td><td class="border">{{ $application->secondary_exam_year }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <h5 style="font-weight: 700; padding-block: 0.5rem; text-transform: capitalize;">GCE A/L or equivalent</h5>
            <div class="d-flex py-2">
                <table class="border border-2 w-75">
                    <thead class="text-dark border border-2 border-dark py-3" style="font-weight: 700; font-size: 1.6rem;">
                        <th class="border-left border-right">Subject attempted</th>
                        <th class="border-left border-right">Grade</th>
                    </thead>
                    <tbody style="font-size: 1.3rem">
                        @foreach (json_decode($application->gce_al_record) as $rec)
                            <tr class="border border-2"><td class="border">{{ $rec->subject }}</td><td class="border">{{ $rec->grade }}</td></tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="border border-2 w-25">
                    <h5 class="border-border-2 py-2 px-2 text-center text-dark" style="font-weight: 700; font-size: 1.6rem;">School where the qualification was earned</h5>
                    <div class="py-3 text-center w-100 border border-2">{{ $application->high_school }}</div>
                    <table>
                        <thead class="border-border-2 py-2 text-dark" style="font-weight: 700; font-size: 1.6rem;">
                            <th class="border">Exam Center</th>
                            <th class="border">Candidate No:</th>
                            <th class="border">Year</th>
                        </thead>
                        <tbody style="font-size: 1.3rem">
                            <tr class="border border-2"><td class="border">{{ $application->high_school_exam_center }}</td><td class="border">{{ $application->high_school_candidate_number }}</td><td class="border">{{ $application->high_school_exam_year }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
    </div>
    <div class="py-2">
        <div class="bg-white px-3 py-1">
            <h4 class="text-uppercase py-1" style="font-weight: 700;">Declaration and signature</h4>
            <div class=" py-2">
                I <span style="font-weight : 700;">{{ $application->name }}</span>, certify that the information given in this application, to the best of my knowledge, is complete and accurate.
                I further understand that falsification or failure to supply correct information may lead to disqualification of my application or my admission to the programme.
                I confirm that I have adequate resources to meet the financial obligations throughout my studies.<br>
                <span style="font-weight : 700; display: block; padding-block: 1rem;">Signature: _________________________ Date: __________________________ </span>
            </div>
        </div> 
    </div>
    <div class="py-2">
        <div class="bg-white px-3 py-1">
            <h4 class="text-uppercase py-1" style="font-weight: 700;">Source of information</h4>
            <h5>Where did you learn of admission into HIMS Buea.</h5>
            <div class=" py-2 d-flex">
                <span style="font-weight : 700; padding: 0.5rem 1rem; border-left: 1px solid gray "><input type="checkbox" style="height: 2rem; width: 2rem; margin-right: 1rem" {{ $application->referer == 'POSTER OR NEWS PAPER' ? 'checked' : '' }}>POSTER OR NEWS PAPER</span>
                <span style="font-weight : 700; padding: 0.5rem 1rem; border-left: 1px solid gray "><input type="checkbox" style="height: 2rem; width: 2rem; margin-right: 1rem" {{ $application->referer == 'FLYER OR BANNER' ? 'checked' : '' }}>FLYER OR BANNER</span>
                <span style="font-weight : 700; padding: 0.5rem 1rem; border-left: 1px solid gray "><input type="checkbox" style="height: 2rem; width: 2rem; margin-right: 1rem" {{ $application->referer == 'HIMS STUDENT OR EX-STUDENT' ? 'checked' : '' }}>HIMS STUDENT OR EX-STUDENT</span>
                <span style="font-weight : 700; padding: 0.5rem 1rem; border-left: 1px solid gray "><input type="checkbox" style="height: 2rem; width: 2rem; margin-right: 1rem" {{ $application->referer == 'HIMS STAFF' ? 'checked' : '' }}>HIMS STAFF</span>
                <span style="font-weight : 700; padding: 0.5rem 1rem; border-left: 1px solid gray "><input type="checkbox" style="height: 2rem; width: 2rem; margin-right: 1rem" {{ $application->referer == 'INTERNET OR ADVERTISEMENT' ? 'checked' : '' }}>INTERNET OR ADVERTISEMENT</span>
                @if (!in_array($application->referer, ['INTERNET OR ADVERTISEMENT', 'HIMS STAFF', 'HIMS STUDENT OR EX-STUDENT', 'FLYER OR BANNER', 'POSTER OR NEWS PAPER']))
                    Other: <span style="font-weight : 700; padding: 0.5rem 1rem; border-left: 1px solid gray  text-decoration: underline;">INTERNET OR ADVERTISEMENT</span>
                @endif
            </div>
        </div> 
    </div>
    <div class="py-2">
        <div class="bg-white px-3 py-1">
            <h4 class="text-uppercase py-1" style="font-weight: 700;">school/programme chosen</h4>
            <div style="display: flex; flex-wrap: wrap; margin-block: 0.7rem">
                <h4 style="text-transform: uppercase; font-weight: 700; padding-block: 0.4rem;" class="border-top border-bottom border-2 text-primary w-100 text-center my-0">school of business management</h4>
                <div class="w-50 border-left border-right border-2 my-0">
                    <table>
                        <thead class="border-top border-bottom border-2 py-2">
                            <th class="border-left border-right"></th>
                            <th class="border-left border-right">HND</th>
                            <th class="border-left border-right">B.TECH</th>
                        </thead>
                        <tbody>
                            @php
                                //{{-- business management hnd and btech programs --}}
                                $hnd_progs = \App\Models\Degree::where('name', 'HND')->first()->programs()->where('type', 'BUSINESS MANAGEMENT')->get();
                                $btech_progs = \App\Models\Degree::where('name', 'B.TECH')->first()->programs()->where('type', 'BUSINESS MANAGEMENT')->get();
                                $hnd_btech_programs = $hnd_progs->whereIn('id', $btech_progs->pluck('id')->toArray());
                                $bba_progs = \App\Models\Degree::where('name', 'BBA')->first()->programs()->where('type', 'BUSINESS MANAGEMENT')->get();
                            @endphp
                            @foreach ($hnd_btech_programs as $prog)
                                <tr class="border-top border-bottom border-2 py-2">
                                    <td class="border-left border-right">{{ $prog->name }}</td>
                                    <td class="border-left border-right"><input type="checkbox" style="height:1.4rem; width: 1.4rem;" {{ ($prog->id == $application->program) && ($application->degree->name == 'HND') ? 'checked' : '' }}></td>
                                    <td class="border-left border-right"><input type="checkbox" style="height:1.4rem; width: 1.4rem;" {{ ($prog->id == $application->program) && ($application->degree->name == 'B.TECH') ? 'checked' : '' }}></td>
                                <tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="w-50 border-left border-right border-2 my-0">
                    <table>
                        <thead class="border-top border-bottom border-2 py-2">
                            <th class="border-left border-right"></th>
                            <th class="border-left border-right">BBA</th>
                        </thead>
                        <tbody>
                            
                            @foreach ($bba_progs as $prog)
                                <tr class="border-top border-bottom border-2 py-2">
                                    <td class="border-left border-right">{{ $prog->name }}</td>
                                    <td class="border-left border-right"><input type="checkbox" style="height:1.4rem; width: 1.4rem;" {{ ($prog->id == $application->program) && ($application->degree->name == 'BBA') ? 'checked' : '' }}></td>
                                <tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div style="display: flex; flex-wrap: wrap; margin-block: 0.7rem">
                <div class="w-50 border-left border-right border-2 my-0">
                    <h4 style="text-transform: uppercase; font-weight: 700; padding-block: 0.4rem;" class="border-top border-bottom border-2 text-primary w-100 text-center my-0">school of engineering and technology</h4>
                    <table>
                        <thead class="border-top border-bottom border-2 py-2">
                            <th class="border-left border-right"></th>
                            <th class="border-left border-right">HND</th>
                            <th class="border-left border-right">B.TECH</th>
                        </thead>
                        <tbody>
                            @php
                                //{{-- business management hnd and btech programs --}}
                                $hnd_progs = \App\Models\Degree::where('name', 'HND')->first()->programs()->where('type', 'ENGINEERING AND TECHNOLOGY')->get();
                                $btech_progs = \App\Models\Degree::where('name', 'B.TECH')->first()->programs()->where('type', 'ENGINEERING AND TECHNOLOGY')->get();
                                $hnd_btech_programs = $hnd_progs->whereIn('id', $btech_progs->pluck('id')->toArray());
                                $bba_progs = \App\Models\Degree::where('name', 'BBA')->first()->programs()->where('type', 'BUSINESS MANAGEMENT')->get();
                            @endphp
                            @foreach ($hnd_btech_programs as $prog)
                                <tr class="border-top border-bottom border-2 py-2">
                                    <td class="border-left border-right">{{ $prog->name }}</td>
                                    <td class="border-left border-right"><input type="checkbox" style="height:1.4rem; width: 1.4rem;" {{ ($prog->id == $application->program) && ($application->degree->name == 'HND') ? 'checked' : '' }}></td>
                                    <td class="border-left border-right"><input type="checkbox" style="height:1.4rem; width: 1.4rem;" {{ ($prog->id == $application->program) && ($application->degree->name == 'B.TECH') ? 'checked' : '' }}></td>
                                <tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="w-50 border-left border-right border-2 my-0">
                    <h4 style="text-transform: uppercase; font-weight: 700; padding-block: 0.4rem;" class="border-top border-bottom border-2 text-primary w-100 text-center my-0">school of medical and biomedical sciences</h4>
                    <table>
                        <thead class="border-top border-bottom border-2 py-2">
                            <th class="border-left border-right"></th>
                            <th class="border-left border-right">HND</th>
                        </thead>
                        <tbody>
                            @php
                                //{{-- business management hnd and btech programs --}}
                                $hnd_progs = \App\Models\Program::where('type', 'MEDICAL AND BIOMEDICAL SCIENCES')->get();
                                
                            @endphp
                            @foreach ($hnd_progs as $prog)
                                <tr class="border-top border-bottom border-2 py-2">
                                    <td class="border-left border-right">{{ $prog->name }}</td>
                                    <td class="border-left border-right"><input type="checkbox" style="height:1.4rem; width: 1.4rem;" {{ ($prog->id == $application->program) && ($application->degree->name == 'HND') ? 'checked' : '' }}></td>
                                <tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div style="display: flex; flex-wrap: wrap; margin-block: 0.7rem">
                <h4 style="text-transform: uppercase; font-weight: 700; padding-block: 0.4rem;" class="border-top border-bottom border-2 text-primary w-100 text-center my-0">school of tourism, logistics and transport management</h4>
                <div class="w-50 border-left border-right border-2 my-0">
                    <table>
                        <thead class="border-top border-bottom border-2 py-2">
                            <th class="border-left border-right"></th>
                            <th class="border-left border-right">HND</th>
                            <th class="border-left border-right">B.TECH</th>
                        </thead>
                        <tbody>
                            @php
                                //{{-- business management hnd and btech programs --}}
                                $hnd_progs = \App\Models\Degree::where('name', 'HND')->first()->programs()->where('type', 'TOURISM, LOGISTICS AND TRANSPORT MANAGEMENT')->get();
                                $btech_progs = \App\Models\Degree::where('name', 'B.TECH')->first()->programs()->where('type', 'TOURISM, LOGISTICS AND TRANSPORT MANAGEMENT')->get();
                                $hnd_btech_programs = $hnd_progs->whereIn('id', $btech_progs->pluck('id')->toArray());
                                $bba_progs = \App\Models\Degree::where('name', 'BBA')->first()->programs()->where('type', 'TOURISM, LOGISTICS AND TRANSPORT MANAGEMENT')->get();
                            @endphp
                            @foreach ($hnd_btech_programs as $prog)
                                <tr class="border-top border-bottom border-2 py-2">
                                    <td class="border-left border-right">{{ $prog->name }}</td>
                                    <td class="border-left border-right"><input type="checkbox" style="height:1.4rem; width: 1.4rem;" {{ ($prog->id == $application->program) && ($application->degree->name == 'HND') ? 'checked' : '' }}></td>
                                    <td class="border-left border-right"><input type="checkbox" style="height:1.4rem; width: 1.4rem;" {{ ($prog->id == $application->program) && ($application->degree->name == 'B.TECH') ? 'checked' : '' }}></td>
                                <tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="w-50 border-left border-right border-2 my-0">
                    <table>
                        <thead class="border-top border-bottom border-2 py-2">
                            <th class="border-left border-right"></th>
                            <th class="border-left border-right">BBA</th>
                        </thead>
                        <tbody>
                            
                            @foreach ($bba_progs as $prog)
                                <tr class="border-top border-bottom border-2 py-2">
                                    <td class="border-left border-right">{{ $prog->name }}</td>
                                    <td class="border-left border-right"><input type="checkbox" style="height:1.4rem; width: 1.4rem;" {{ ($prog->id == $application->program) && ($application->degree->name == 'BBA') ? 'checked' : '' }}></td>
                                <tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
    </div>
    <div class="py-2">
        <div class="bg-white px-3 py-1">
            <div style="display: flex; flex-wrap: wrap; margin-block: 0.7rem">
                <div class="w-50 my-0">
                    <h4 class="text-uppercase py-1" style="font-weight: 700;">student admission number:</h4>
                    <label  class="form-control"></label>
                </div>
                <div class="w-50 my-0 text-capitalize" style="font-weight: 700;">
                    <div class="text-center py-3">
                        <h6>signature</h6> __________________________
                    </div>
                    <div class="text-center py-3">
                        <h6>date</h6> __________________________
                    </div>
                </div>
            </div>
        </div> 
    </div>
@endsection
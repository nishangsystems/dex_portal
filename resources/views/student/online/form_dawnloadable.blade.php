@extends('student.printable')
@section('section')
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
    <div class="py-2">
        <div class="bg-white px-3 py-1">
            <h4 class="text-uppercase py-1" style="font-weight: 700;">personal details</h4>
            <div class="d-flex flex-wrap text-capitalize py-1"><span class="text-secondary" style="font-weight: 700;">name (as on birth certificate)<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->name }}<span></div>
            <div class="d-flex flex-wrap text-capitalize py-1"><span class="text-secondary" style="font-weight: 700;">date of birth<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->dob }}<span></div>
            <div class="d-flex flex-wrap text-capitalize py-1"><span class="text-secondary" style="font-weight: 700;">place of birth<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->pob }}<span></div>
            <div class="d-flex flex-wrap text-capitalize py-1"><span class="text-secondary" style="font-weight: 700;">sex<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->gender }}<span></div>
            <div class="d-flex flex-wrap text-capitalize py-1"><span class="text-secondary" style="font-weight: 700;">ID card number<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->id_card_number }}<span></div>
            <div class="d-flex flex-wrap text-capitalize py-1"><span class="text-secondary" style="font-weight: 700;">date of issue<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->id_date_of_issue }}<span></div>
            <div class="d-flex flex-wrap text-capitalize py-1"><span class="text-secondary" style="font-weight: 700;">place of issue<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->id_place_of_issue }}<span></div>
            <div class="d-flex flex-wrap text-capitalize py-1"><span class="text-secondary" style="font-weight: 700;">Nationality<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->nationality }}<span></div>
            <div class="d-flex flex-wrap text-capitalize py-1"><span class="text-secondary" style="font-weight: 700;">region of origin<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->_region->region }}<span></div>
            <div class="d-flex flex-wrap text-capitalize py-1"><span class="text-secondary" style="font-weight: 700;">country of birth<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->country_of_birth }}<span></div>
        </div> 
    </div>
    <div class="py-2">
        <div class="bg-white px-3 py-1">
            <h4 class="text-uppercase py-1" style="font-weight: 700;">address details</h4>
            <div class="d-flex flex-wrap text-capitalize py-1"><span class="text-secondary" style="font-weight: 700;">Residential address<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->residence }}<span></div>
            <div class="d-flex flex-wrap text-capitalize py-1"><span class="text-secondary" style="font-weight: 700;">personal phone number<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->phone }}<span></div>
            <div class="d-flex flex-wrap text-capitalize py-1"><span class="text-secondary" style="font-weight: 700;">home/business numbers<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->extra_phone }}<span></div>
            <div class="d-flex flex-wrap text-capitalize py-1"><span class="text-secondary" style="font-weight: 700;">email address<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->email }}<span></div>
            <h5 style="font-weight: 700; padding-block: 0.5rem;">Parent's or Guardian's complete address</h5>
            <div class="d-flex flex-wrap text-capitalize py-1"><span class="text-secondary" style="font-weight: 700;">name of parent/guardian<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->guardian }}<span></div>
            <div class="d-flex flex-wrap text-capitalize py-1"><span class="text-secondary" style="font-weight: 700;">contact<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->guardian_contact }}<span></div>
            <div class="d-flex flex-wrap text-capitalize py-1"><span class="text-secondary" style="font-weight: 700;">address<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->guardian_address }}<span></div>
            <div class="d-flex flex-wrap text-capitalize py-1"><span class="text-secondary" style="font-weight: 700;">name of sponsor<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->sponsor }}<span></div>
            <div class="d-flex flex-wrap text-capitalize py-1"><span class="text-secondary" style="font-weight: 700;">contact<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->sponsor_contact }}<span></div>
            <div class="d-flex flex-wrap text-capitalize py-1"><span class="text-secondary" style="font-weight: 700;">address<span> : <span class="text-dark" style="font-weight: 700;">{{ $application->sponsor_address }}<span></div>
        </div> 
    </div>
    <div class="py-2">
        <div class="bg-white px-3 py-1">
            <h4 class="text-uppercase py-1" style="font-weight: 700;">qualifications / academic records</h4>
            <h5 style="font-weight: 700; padding-block: 0.5rem; text-transform: capitalize;">GCE O/L or equivalent</h5>
            <div class="d-flex py-2">
                <table class="border border-2">
                    <thead class="text-dark border border-2 border-dark py-1" style="font-weight: 700; font-size: 1.6rem;">
                        <th class="border">Subject attempted</th>
                        <th class="border">Grade</th>
                    </thead>
                    <tbody style="font-size: 1.3rem">
                        @foreach (json_decode($application->gce_ol_record) as $rec)
                            <tr class="border border-2"><td class="border">{{ $rec->subject }}</td><td class="border">{{ $rec->grade }}</td></tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="border border-2">
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
                <table class="border border-2">
                    <thead class="text-dark border border-2 border-dark py-1" style="font-weight: 700; font-size: 1.6rem;">
                        <th class="border">Subject attempted</th>
                        <th class="border">Grade</th>
                    </thead>
                    <tbody style="font-size: 1.3rem">
                        @foreach (json_decode($application->gce_al_record) as $rec)
                            <tr class="border border-2"><td class="border">{{ $rec->subject }}</td><td class="border">{{ $rec->grade }}</td></tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="border border-2">
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
            <div style="display: flex; flex-wrap: wrap;">
                <h4 style="text-transform: uppercase; font-weight: 700; padding-block: 0.3rem;" class="border-top border-bottom border-2 text-primary w-100 text-center">school of business management</h4>
                <div class="w-50 border-left border-right border-2">
                    <table>
                        <thead class="border-top border-bottom border-2">
                            <th class="border-left border-right"></th>
                            <th class="border-left border-right">HND</th>
                            <th class="border-left border-right">B.TECH</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
            </div>
        </div> 
    </div>
@endsection
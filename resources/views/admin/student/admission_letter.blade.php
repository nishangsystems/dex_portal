@extends('student.printable')
@section('section')
    <div class="py-2" style="line-height: 2.1rem; font-size:larger;">
        <div style="display: flex; justify-content: space-around;" class="my-1">
            <div>Our Ref: ....<span class="text-uppercase"><u> PRE/REC/REG/BU/{{ now()->format('m/Y') }} </u></span></div>
            <div class="text-right">Admitted on: .....<u><i>{{$admitted_on}}</i></u></div>
        </div>
        {{-- <div class="my-4 text-uppercase"><b><h4>{{ $name }}<br>{{ $matric }}</h4></b></div> --}}
        <div class="my-2"><h4>Dear <b class="text-uppercase">{{ $name }}</b>,</h4></div>
        <div class="my-3 text-center font-semibold"><h3><b>ADMISSION LETTER</b></h3></div>
        <p class="py-2 text-justify mb-1">We are pleased to offer you admission into the {{$school}}, at DEX UNIVERSITY for a {{$program_duration}} years program running for the {{$batch}} academic year with matriculation number ({{ $matric }}), in view of obtaining an {{$degree}} in the Specialty of {{$program}}.</p>
        <p class="py-2 text-justify mb-1">At DEX University, you will be given the opportunity to attain your goals and objectives of becoming an expert in your chosen field of studies and becoming nationally and internationally outstanding </p>
        <p class="py-2 text-justify mb-1">You are expected to pay the first installment of your fees on or before <b>{{now()->parse($fee2_dateline)->format('d/m/Y')}}</b>. All financial transactions are done at <b>ECOBANK, Account Number: 31090014363, Account Name: Dex Higher Institute of Biomedical Science, Management and Technology (DHIBMAT).</b>   <i>Ensure to submit the copy of the bank slip at the Finance office within five (05) working days. <b>Failure to do so, your payment will not be processed by the Finance office</b></i>.</p>

        <p class="py-2 text-justify mb-1"><b>NB: Money paid is not refundable</b>. </p>
        <p class="py-2 text-justify mb-1">As an admitted student, you are invited to participate in an orientation scheduled to take place on campus.   This event will provide you with essential information about your program, resources and vibrant campus life at DEX University. </p>
        <p class="py-2 text-justify mb-1">Kindly stop by the Admissions Office and collect your students’ Code of Conduct, Fee Structure and Calendar of activities for the academic year {{$batch}}.</p>
        <p class="py-2 text-justify mb-1">We heartily welcome you to the DEX UNIVERSITY family and hope that you will help us make your stay at the university fruitful and pleasant. </p>
        <span class="d-block  my-3 py-1"> Sincerely,</span>

        <p class="mt-3 pt-3">
            <label for="" class="text-capitalize">Ndeme Ndeme Alain Desire</label><br><strong>Registrar</strong>
            {{-- add a signature --}}<br>
            <img src="{{ asset('assets/images/avatars/signature.png') }}" alt="signature" style="width: 80px;">
        </p>
    </div>
@endsection
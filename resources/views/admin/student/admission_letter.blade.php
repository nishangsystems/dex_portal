@extends('student.printable')
@section('section')
    <div class="py-2" style="line-height: 2.3rem; font-size:larger;">
        {{-- <table>
            <thead>
                <td>
                    <div class="my-2">Our Ref: .....................<!-- <span class="text-uppercase">PRE/REC/REG/BU/{{ now()->format('m/Y') }}</span> --></div>
                </td>
                <td>
                    <div class="my-2 text-right">Admitted on: .....................<span class="text-uppercase"></span></div>
                </td>
            </thead>
        </table> --}}
        {{-- <div class="my-4 text-uppercase"><b><h4>{{ $name }}<br>{{ $matric }}</h4></b></div> --}}
        <div class="my-4"><h4>Dear <b class="text-uppercase">{{ $name }}</b>,</h4></div>
        <div class="my-4 text-center font-semibold"><h3><b>ADMISSION LETTER</b></h3></div>
        <p class="py-2 text-justify mb-3">We are pleased to offer you admission for the <b>{{ $batch }}</b> academic year into the <b>{{$degree}}</b> program in, <b>{{$program??'PROGRAM'}}</b> at DEX UNIVERSITY.</p>
        <p class="py-2 text-justify mb-3">At DEX University, you will be given the opportunity to attain your goals and objectives of becoming an expert in your chosen field of studies and becoming nationally and internationally outstanding. </p>
        <p class="py-2 text-justify mb-3">You are expected to pay the first installment of your fees on or before October 15th, 2024. All financial transactions are done at <b>UBA Bank, Account Number: 16078000013-14, Account Name: Dex Higher Institute of Biomedical, Management and Technology.</b>   Ensure to submit the copy of the bank slip at the Finance office within five (05) working days. </p>
        <p class="py-2 text-justify mb-3">Kindly stop by the Admissions Office and collect your students’ Code of Conduct, Fee Structure and Calendar of activities for the academic year {{$batch}} </p>
        <p class="py-2 text-justify mb-3">We heartily welcome you to the DEX UNIVERSITY family and hope that you will help us make your stay at the university fruitful and pleasant. </p>
        <span class="d-block  my-4 py-2"> Sincerely,</span>
    </div>
@endsection
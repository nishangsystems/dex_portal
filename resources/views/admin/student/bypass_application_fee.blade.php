@extends('admin.layout')
@section('section')
    @php
        $campuses = collect(json_decode($_this->api_service->campuses())->data);
        $degrees = collect(json_decode($_this->api_service->degrees())->data);
        $programs = collect(json_decode($_this->api_service->programs())->data);
    @endphp
    <div class="py-3">
    @isset($application)
        <form method="POST">
            @csrf
            <div class="card my-5">
                <div class="card-header heading text-center"><b><span class="text-capitalize"> Bypass Application Fee</span>::{{ $application->name }}</b></div>
                <div class="card-body">
                    <div class="my-3 ">
                        <div class="text-sm text-secondary text-capitalize">@lang('text.word_applicant'):</div>
                        <div class="my-1">
                            <input type="text" class="form-control border-0" readonly value="{{ $application->name??'' }}">
                        </div>
                    </div>
                    <div class="my-3 ">
                        <div class="text-sm text-secondary text-capitalize">@lang('text.word_degree'):</div>
                        <div class="my-1">
                            <input type="text" class="form-control border-0" readonly value="{{ $degrees->where('id', $application->degree_id)->first()->deg_name??null }}">
                        </div>
                    </div>
                    <div class="my-3 ">
                        <div class="text-sm text-secondary text-capitalize">@lang('text.program_first_choice'):</div>
                        <div class="my-1">
                            <input type="text" class="form-control border-0" readonly value="{{ $programs->where('id', $application->program_first_choice)->first()->name??null }}">
                        </div>
                    </div>
                    <div class="my-3 ">
                        <div class="text-sm text-secondary text-capitalize">@lang('text.program_second_choice'):</div>
                        <div class="my-1">
                            <input type="text" class="form-control border-0" readonly value="{{ $programs->where('id', $application->program_second_choice)->first()->name??null }}">
                        </div>
                    </div>
                    <div class="my-3 ">
                        <div class="text-sm text-secondary text-capitalize">@lang('text.word_level'):</div>
                        <div class="my-1">
                            <input type="text" class="form-control border-0" readonly value="{{ $application->level??'' }}">
                        </div>
                    </div>
                    <div class="my-3 ">
                        <div class="text-sm text-secondary text-capitalize">@lang('text.word_reason'):</div>
                        <div class="my-1">
                            <textarea name="bypass_reason" class="form-control rounded" required rows="4">{{ old('bypass_reason', $application->bypass_reason??'') }}</textarea>
                        </div>
                    </div>
                    <div class="my-3 d-flex justify-content-end">
                        <button class="btn btn-sm btn-primary" type="submit">@lang('text.word_bypass')</button>
                    </div>
                </div>
            </div>
        </form>
    @endisset
        <div class="py-2">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-light table-stripped" id="hidden-table-info">
                <thead>
                    <tr class="text-capitalize border-bottom border-dark">
                        <th class="border-left border-right" rowspan="2">#</th>
                        <th class="border-left border-right" rowspan="2">{{__('text.word_name')}}</th>
                        <th class="border-left border-right" rowspan="2">{{__('text.word_email')}}</th>
                        <th class="border-left border-right" rowspan="2">{{__('text.word_phone')}}</th> 
                        <th class="border-left border-right" rowspan="2">{{__('text.word_campus')}}</th> 
                        <th class="border-left border-right" rowspan="2">{{__('text.word_degree')}}</th> 
                        <th class="border-left border-right" colspan="2">{{__('text.word_programs')}}</th> 
                        <th class="border-left border-right" rowspan="2"></th>
                    </tr>
                    <tr class="text-capitalize border-bottom border-dark">
                        <th class="border-left border-right">{{__('text.word_first')}}</th>
                        <th class="border-left border-right">{{__('text.word_second')}}</th> 
                    </tr>
                </thead>
                <tbody id="table_body">
                    @php($k = 1)
                    @foreach ($applications as $appl)
                        <tr class="border-bottom">
                            <td class="border-left border-right">{{ $k++ }}</td>
                            <td class="border-left border-right">{{ $appl->name == null ? \App\Models\Students::find($appl->student_id)->name : $appl->name }}</td>
                            <td class="border-left border-right">{{ $appl->email == null ? \App\Models\Students::find($appl->student_id)->email : $appl->email }}</td>
                            <td class="border-left border-right">{{ $appl->phone == null ? \App\Models\Students::find($appl->student_id)->phone : $appl->phone }}</td>
                            <td class="border-left border-right">{{ $campuses->where('id', $appl->campus_id)->first()->name??null }}</td>
                            <td class="border-left border-right">{{ $degrees->where('id', $appl->degree_id)->first()->deg_name??null }}</td>
                            <td class="border-left border-right">{{ $programs->where('id', $appl->program_first_choice)->first()->name??null }}</td>
                            <td class="border-left border-right">{{ $programs->where('id', $appl->program_second_choice)->first()->name??null }}</td>
                            <td class="border-left border-right">
                                <a href="{{ route('admin.bypass.application', $appl->id) }}" class="btn btn-xs btn-primary mt-1 text-capitalize">@lang('text.word_bypass')</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">

            </div>
        </div>
    </div>
@endsection
@extends('student.layout')
@section('section')
    <div class="w-100">
        <div id="accordion" class="accordion-style1 panel-group">
            @foreach ($programs as $key => $program_group)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$key}}">
                                <i class="ace-icon fa fa-angle-down bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
                                &nbsp;{{ $key }}
                            </a>
                        </h4>
                    </div>
                    
                    <div class="panel-collapse" id="collapse_{{$key}}">
                        
                        <div class="">
                            <div class="itemdiv dialogdiv">
                                <table>
                                    <thead><tr class="text-capitalize border-bottom">
                                        <th class="border-left border-right">{{ __('text.sn') }}</th>
                                        <th class="border-left border-right">{{ __('text.word_program') }}</th>
                                        {{-- <th class="border-left border-right">{{ __('text.degree_type') }}</th> --}}
                                    </tr></thead>
                                    <tbody>
                                    @php($k = 1)
                                        @foreach ($program_group as $program)
                                        <tr class="border-bottom">  
                                            <td class="border-left border-right">{{ $k++ }}</td>
                                            <td class="border-left border-right"><span class="text-danger">{{ $program->degree }}</span> / {{ $program->name }}</td>
                                            {{-- <td class="border-left border-right">{{  $program->degree_type  }}</td> --}}
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- <div class="body">
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
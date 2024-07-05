@extends('admin.layout')

@section('section')

    <div class="w-100 py-3">
        <form action="{{ Request::url() }}" method="get">
            <div class="form-group">
                <div class="d-flex flex-wrap justify-content-between">
                    <div class="">
                        <label for="" class="text-secondary h4 fw-bold text-capitalize">{{__('text.filter_by')}}:</label>
                        <select name="filter" id="stats_filter" class="form-control">
                            <option value="">{{__('text.statistics_filter')}}</option>
                            <option value="program" {{request('filter') == 'program' ? 'selected' : ''}}>{{__('text.word_program')}}</option>
                            <option value="degree" {{request('filter') == 'degree' ? 'selected' : ''}}>{{__('text.word_degree')}}</option>
                        </select>
                    </div>
                    <div class="py-3 mt-3 border-top" id="filterLoader">
                    </div>
                    <div class="">
                        <input type="submit" name="" id="" class="h-auto w-auto btn btn-primary btn-md" value="{{ __('text.word_next') }}">
                    </div>
                </div>
            </div>
        </form>
        <div class="mt-5 pt-2">
            <table class="table table-stripped">
                <thead class="bg-secondary text-black text-capitalize">
                    @php($counter = 1)
                    <th>##</th>
                    <th>{{__('text.word_name')}}</th>
                    <th>{{__('text.word_count')}}</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($programs ?? [] as $prog)
                        <tr class="border-bottom border-dark">
                            <td class="border-left border-right">{{$counter++}}</td>
                            <td class="border-left border-right">{{$prog->filter_name}}</td>
                            <td class="border-left border-right">{{$prog->count}}</td>
                        </tr>
                    @endforeach
                    <tr class="text-black fw-bolder border-bottom border-dark fw-bolder fs-2" style="background-color: rgba(200,200,200,0.2);">
                        <td class="border-left border-right border-light text-capitalize" colspan="2">@lang('text.word_total')</td>
                        <td class="border-left border-right border-light">{{$programs->sum('count')}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
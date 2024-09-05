@extends('admin.layout')
@section('section')
    <div class="py-3">
        <table class="table-stripped border-left border-right border-dark">
            <thead class="border-bottom text-uppercase bg-light">
                <th class="border-left border-right">{{ __('text.sn') }}</th>
                <th class="border-left border-right">{{ __('text.word_name') }}</th>
                <th class="border-left border-right">{{ __('text.word_tel') }}</th>
                <th class="border-left border-right">{{ __('text.word_amount') }}</th>
                <th class="border-left border-right">{{ __('text.paid_on') }}</th>
                <th class="border-left border-right">{{ __('text.recorded_by') }}</th>
            </thead>
            <tbody>
                @php($k = 1)
                @foreach ($appls as $appl)
                    <tr class="border-bottom">
                        <td class="border-left border-right">{{ $k++ }}</td>
                        <td class="border-left border-right">{{ $appl->name }}</td>
                        <td class="border-left border-right">{{ $appl->phone }}</td>
                        <td class="border-left border-right">{{ optional($appl->transaction)->amount??'' }}</td>
                        <td class="border-left border-right">{{ optional($appl->transaction)->created_at??'' }}</td>
                        <td class="border-left border-right">{{ optional($appl->transaction)->amount??'' > 0 ? "Momo Payment" : 'Bypassed by '.( \App\Models\User::find(optional($appl->transaction)->request_id??0)->name??'') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@extends('admin.layout')
@section('section')
    <table class="table table-stripped">
        <thead class="border-top border-bottom border-2 border-dark text-uppercase">
            <th class="border">S/N</th>
            <th class="border">PROGRAMME</th>
            <th class="border">No OF APPLICATIONS</th>
            <th class="border"></th>
        </thead>
        <tbody>
            @php
                $k = 1;
            @endphp
            <tr>
                <td class="border">{{ $k++ }}</td>
                <td class="border">ALL PROGRAMS</td>
                <td class="border">{{ \App\Models\ApplicationForm::whereNotNull('submitted')->where(['year_id'=>$current_year])->whereNotNull('transaction_id')->count() }}</td>
                <td class="border"><form method="POST" action="{{ route('admin.applications.download') }}">@csrf<input type="submit" class="btn btn-sm btn-primary" value="Download"></form></td>
            </tr>
            @foreach ($programs as $prog)
                <tr>
                    <td class="border">{{ $k++ }}</td>
                    <td class="border">{{ $prog->name }}</td>
                    <td class="border">{{ \App\Models\ApplicationForm::whereNotNull('submitted')->where(['year_id'=>$current_year,'program'=> $prog->id])->whereNotNull('transaction_id')->count() }}</td>
                    <td class="border"><form method="POST" action="{{ route('admin.applications.download', $prog->id) }}">@csrf<input type="submit" class="btn btn-sm btn-primary" value="Download"></form></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
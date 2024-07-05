@extends('admin.layout')
@section('section')
    <div class="py-3">
        <table class="table">
            <thead class="text-capitalize">
                <th>SN</th>
                <th>Applicant Name</th>
                <th>Applicant Phone</th>
                <th>Bypass Reason</th>
                <th>Degree</th>
                <th>Program</th>
                <th>Done By</th>
            </thead>
            <tbody>
            @php
                $counter = 1;
            @endphp
            @foreach ($bypasses as $bypass)
                <tr class="border-bottom">
                    <td>{{ $counter++ }}</td>
                    <td>{{ $bypass->name }}</td>
                    <td>{{ $bypass->phone }}</td>
                    <td>{{ $bypass->reason }}</td>
                    <td>{{ $bypass->degree_name }}</td>
                    <td>{{ $bypass->program_name }}</td>
                    <td>{{ $bypass->user }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
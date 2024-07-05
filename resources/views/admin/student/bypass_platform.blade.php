@extends('admin.layout')
@section('section')
    <div class="py-2">
        @if ($student??null != null)
            <div class="card container-fluid mx-0 border-0 shadow py-3">
                <div class="card-body ">
                    <form method="post" action="{{ Request::url() }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 text-capitalize text-secondary">Bypass Reason</div>
                            <div class="col-md-8">
                                <textarea class="form-control" rows="4" name="reason" required placeholder="Platform charges bypass reason here"></textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end py-3">
                            <button class="btn btn-primary btn-sm rounded" type="submit">Bypass</button>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <table class="table table-light">
                <thead class="text-capitalize">
                    <tr>
                        <th class="header text-center">@lang('text.word_student')</th>
                        <th colspan="4"> <input type="search" name="" id="" oninput="searchStudent(this)" class="form-control" placeholder="search student by name, email or phone number"></th>
                    </tr>
                    <tr class="border-y border-dark">
                        <th>#</th>
                        <th>@lang('text.word_name')</th>
                        <th>@lang('text.word_email')</th>
                        <th>@lang('text.word_phone')</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="students_data"></tbody>
            </table>
        @endif
    </div>
@endsection
@section('script')
<script>
    let searchStudent = function(element){
        let input = $(element).val();
        let url = `{{ route('admin.search_student') }}`;
        $.ajax({
            method: 'get',
            url: url,
            data: {'key': input},
            success: function(resp){
                let html = '';
                let counter = 1;
                console.log(resp);

                resp.forEach(element => {
                    html += `
                        <tr>
                            <td>${counter++}</td>
                            <td>${element.name}</td>
                            <td>${element.email}</td>
                            <td>${element.phone}</td>
                            <td>
                                <a href="{{ route('admin.bypass.platform') }}/${element.id}" class="btn btn-xs btn-primary rounded">@lang('text.word_bypass')</a>
                            </td>
                        </tr>;
                        `
                });
                $('#students_data').html(html);
            }
            
        });
    }
</script>
@endsection
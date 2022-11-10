@extends('student.layout')


@section('section')

<div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    <i class="ace-icon fa fa-angle-down bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
                    &nbsp;{{__('text.all_notifications')}}
                </a>
            </h4>
        </div>
        
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Audience</th>
                        <th>Created on</th>
                        <th>Due date</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($notifications as $notification)
                        
                        <!-- @if(request('type') != 'departmental' && $notification->visibility != 'general'||'teachers')
                        @endif -->
                                <tr>  
                                    <td>{{$notification->title}}</td>
                                    <td>{{$notification->audience()}}</td>
                                    <td>  <h6 class="mb-0">{{ $notification->created_at }}</h6>
                                    {{ $notification->created_at->diffForHumans() }}</td>
                                    <td><span class="btn btn-xs {{(time() > strtotime($notification->date))?'btn-danger':'btn-success'}} m-2">{{(time() >= strtotime($notification->date))?"Passed":"Pending"}}</span></td>
                                    <td class="text-capitalize">
                                        <a href="{{route('student.notification.show',[$notification->id])}}" class=" btn btn-success btn-xs m-2">{{__('text.word_view')}}</a>
                                    </td>
                                </tr>
                          
                    @empty
                        <tr>  
                            <td colspan="5" class="text-center">{{__('text.no_notifications_found')}}</td>
                        </tr>
                    @endforelse
                
                </tbody>
            </table>
        </div>
     </div>
 <div>
@stop
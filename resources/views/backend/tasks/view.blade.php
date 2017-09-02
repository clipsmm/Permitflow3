@extends('layouts.module')

@section('body')

    <div class="panel panel-default panel-form m-r-10 m-l-10">
        <div class="panel-heading clearfix">
            <div class="pull-right" role="">
                <form method="post">
                    {!! csrf_field() !!}
                    <a href="{{ route('backend.tasks.queue', [$module->slug]) }}"
                       class="btn btn-sm btn-default">
                        <span class="fa fa-arrow-left"></span> @lang('common.back_to_tasks')
                    </a>

                    @if(!$task->application->complete && $task->user_id  == user()->id)
                        @foreach($actions as $action => $props)
                            @if(array_get($props,'feedback',false))
                                <button type="button" class="btn btn-sm btn-{{array_get($props,'color')}}"
                                        data-toggle="modal" data-target="#md_tskv_{{ $action.'_'.$task->id}}">
                                    <span class="fa fa-{{ array_get($props,'icon') }}"></span> {{array_get($props,'name')}}
                                </button>

                                @push('modals')
                                    <div class="modal fade modal-wide" id="md_tskv_{{ $action.'_'.$task->id}}"
                                         tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
                                         aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form class="modal-content" method="post">
                                                {!! csrf_field() !!}
                                                <div class="modal-header">
                                                    <h4 class="modal-title"
                                                        id="exampleModalLongTitle"> @lang('labels.reason_for', [ 'action' => array_get($props,'name') ])  </h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                                <textarea name="comment"
                                                                          class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-default" data-dismiss="modal"
                                                            aria-label="Close">@lang('labels.cancel')</button>
                                                    <button type="submit" class="btn btn-primary"
                                                            value="{{ $action }}" name="action">
                                                        <span class="fa fa-{{ array_get($props,'icon') }}"></span> {{array_get($props,'name')}}
                                                    </button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                @endpush
                            @else
                                <button type="submit" class="btn btn-sm btn-success" value="{{ $action }}"
                                        name="action">
                                    <span class="fa fa-{{ array_get($props,'icon') }}"></span> {{array_get($props,'name')}}
                                </button>
                            @endif

                        @endforeach
                    @endif
                </form>


            </div>
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">

            <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">


                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <div class="thumbnail m-t-0 m-b-5 m-l-5 m-r-0">
                        <img class="img-responsive hidden-xs" src="https://accounts.ecitizen.go.ke/profile-picture/25272520?t=citizen">
                    </div>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">

                    <div class="panel m-b-0">

                        <div class="panel-body p-t-0 p-l-5 p-r-5 p-b-0">
                            <table class="table table-hover table-special table-striped">

                                <tbody>
                                <tr class=' '>
                                    <td class="big-data width-40">
                                        <h1>Ref:</h1>

                                    </td>
                                    <td class="hidden-xs hidden-sm">{{ $task->application->application_number }}</td>
                                </tr>

                                <tr class=' '>
                                    <td class="big-data width-40">
                                        <h1>Submited by:</h1>

                                    </td>
                                    <td class="hidden-xs hidden-sm">{{ $task->application->user }}</td>
                                </tr>

                                <tr class=' '>
                                    <td class="big-data width-40">
                                        <h1>Date of Submission:</h1>

                                    </td>
                                    <td class="hidden-xs hidden-sm">{{ $task->application->submitted_at }}</td>
                                </tr>
                                <tr class=' '>
                                    <td class="big-data width-40">
                                        <h1>Days in progress::</h1>

                                    </td>

                                    <td>
                                        <a href="#" class="btn btn-xs btn-default">
                                            {{ carbon($task->application->submitted_at)->diffInDays($task->application->complete ? $task->application->completed_at : null) }}
                                        </a>
                                    </td>
                                </tr>
                                <tr class=' '>
                                    <td class="big-data width-40">
                                        <h1>Approval:</h1>

                                    </td>

                                    <td>
                                        <a href="#" class="btn btn-xs btn-primary">
                                            <span class="fa fa-callender"></span> {{ $task->application->status }}
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--Task Details-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Task Details</h3>
                </div>
                <div class="panel-body padding-0">
                    <table class="table table-vertical m-b-0">
                        <thead>
                        <tr>
                            <th>Application #</th>
                            <th>Type</th>
                            <th>Submitted</th>
                            <th>Status</th>
                            <th>Assigned To</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ $task->application->application_number }}</td>
                            <td>{{ $task->name }}</td>
                            <td> {{ $task->completed_at }}</td>
                            <td><span class="label label-default">{{ $task->application->status }}</span></td>
                            <td>{{ $task->user }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--End Task Details-->

            <!--Payment Details-->
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Payment Details</h3>
                </div>
                <div class="panel-body padding-0">
                    <div class="table-responsive">
                        <table class="table table-special m-b-0 b-b-0">
                            <thead>
                            <tr>
                                <th>
                                    Receipt No
                                </th>
                                <th>
                                    Amount
                                </th>
                                <th>
                                    Paid On
                                </th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($task->application->invoices as $invoice)

                                <tr style="">
                                    <td>
                                        {{ $invoice->id }}
                                    </td>
                                    <td>
                                        KES {{ $invoice->amount }}
                                    </td>
                                    <td>
                                        {{ $invoice->created_at }}
                                    </td>
                                    <td>
                                        <a href="#"
                                           class="btn btn-xs btn-success">
                                            <i class="fa fa-print"></i>
                                            Print Receipt </a>
                                    </td>
                                </tr>
                            @empty

                                <tr style="">
                                    <td colspan="4">
                                        No payments made
                                    </td>
                                </tr>

                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--End Payment Details-->

            {!! $module->render_application_view($task->application) !!}

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Review History</h3>
                </div>
                <div class="panel-body padding-0">
                    <div id="task-comments-container">
                        <table class="table table-special m-b-0 b-b-0">
                            <thead>
                            <tr>
                                <th>
                                    Type of Task
                                </th>
                                <th>
                                    Created At
                                </th>
                                <th>
                                    Assigned To
                                </th>
                                <th>
                                    Assigned At
                                </th>
                                <th>
                                    Processed At
                                </th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($task->application->tasks as $task)
                                <tr>
                                    <td>
                                        {{ $task->name }}
                                    </td>
                                    <td>
                                        {{ $task->created_at }}
                                    </td>
                                    <td>
                                        {{ $task->user }}
                                    </td>
                                    <td>
                                        {{ $task->assigned_at }}
                                    </td>
                                    <td>
                                        {{ $task->completed_at }}
                                    </td>
                                    <td></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6"> No revision history</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table> <!----></div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Corrections History</h3>
                </div>
                <div class="panel-body padding-0">
                    <table class="table table-special m-b-0 b-b-0">
                        <thead>
                        <tr>
                            <th>
                                Date Of Correction
                            </th>
                            <th>
                                Name Of Reviewer
                            </th>
                            <th>
                                Comments
                            </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($task->application->corrections as $correction)
                            <tr>
                                <td>
                                    {{ $correction->created_at }}
                                </td>
                                <td>
                                    {{ $correction->task->user }}
                                </td>
                                <td>
                                    {!! $correction->comment !!}
                                </td>
                                <td></td>
                            </tr>
                        @empty

                        @endforelse

                        </tbody>
                    </table>
                </div>
            </div>



        </div>
    </div>

@endsection

@push('modals')

@endpush




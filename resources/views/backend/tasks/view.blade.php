@extends('layouts.module')

@section('body')

    <div id="vue-root" class="panel panel-default panel-form m-r-10 m-l-10">
        <div class="panel-heading clearfix">
            <div class="pull-right" role="">
                    @if(!$task->application->complete && $task->user_id  == user()->id && !$task->application->in_corrections)
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
                                {!! render_action($props) !!}
                            @endif

                        @endforeach
                    @endif

            </div>
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">@lang("Applicant Details")</h3>
                </div>
                <div class="panel-body padding-0 no-margin">

                    <table class="table table-hover table-special table-striped m-b-0">
                        <thead>
                        <tr>
                            <th>@lang('Submitted By')</th>
                            <th>@lang('Date of Submission')</th>
                            <th>@lang('Days In Progress')</th>
                            <th>@lang('Approval')</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class=' '>
                            <td>{{ $task->application->user }}</td>
                            <td>{{ $task->application->submitted_at }}</td>
                            <td>{{ carbon($task->application->submitted_at)->diffInDays($task->application->complete ? $task->application->completed_at : null) }}</td>
                            <td><span class="fa fa-callender"></span> {{ $task->application->status }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--Task Details-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">@lang("Task Details")</h3>
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


            {!! $module->render_application_view($task->application) !!}

        <!--Payment Details-->
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">@lang("Payment Details")</h3>
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


            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">@lang("Review History")</h3>
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




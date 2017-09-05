@extends('layouts.frontend')
@section('body')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="pull-left">
                @lang('Application Details')
            </h4>
            <div class="pull-right">

            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            @if($application->outputs->count())
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="panel-title">@lang("Downloads")</div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-special m-b-0 b-b-0">
                            <thead>
                            <tr>
                                <th colspan="2">
                                    @lang("Name")
                                </th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($application->outputs as $output)
                                <tr>
                                    <td colspan="2">{!!  $output->output->name !!} </td>
                                    <td>
                                        <a target="_blank" class="btn btn-success btn-sm" href="{{ route('application.download', [$application->module_slug, $application->id, $output->id]) }}">
                                            <i class="fa fa-download"></i> Download </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            @if($application->in_corrections && $correction = $application->active_correction)
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <div class="panel-title">@lang("Pending Correction")</div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-special m-b-0 b-b-0">
                            <thead>
                            <tr>
                                <th colspan="3">
                                    @lang("Comments")
                                </th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td colspan="3">{!!  $correction->comment !!} </td>
                                <td>
                                    <a class="btn btn-sm btn-danger" href="{{$application->module->get_edit_url($application)}}"><i class="fa fa-pencil-square-o"></i> Edit </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
            {!! $module->render_application_view($application) !!}

            <!--Payment Details-->
                <div class="panel panel-default m-t-10">
                    <div class="panel-heading">
                        <h3 class="panel-title">Bills</h3>
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
                                        Bill Date
                                    </th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($application->invoices as $invoice)

                                    <tr style="">
                                        <td>
                                            {{ $invoice->id }}
                                        </td>
                                        <td>
                                            {{ money($invoice->amount, $invoice->currency) }}
                                        </td>
                                        <td>
                                            {{ $invoice->created_at }}
                                        </td>
                                        <td>
                                            @if($invoice->status != 'paid')
                                                <a class="btn btn-xs btn-success" href="{{ route('application.checkout', [$application->module->slug, $application->id, $invoice->pk]) }}">
                                                    <i class="fa fa-money"></i> Pay
                                                </a>
                                            @endif
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
        </div>
    </div>

@endsection
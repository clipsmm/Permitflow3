@extends('layouts.frontend')
@section('body')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="pull-left">
                @lang('Application Details')
            </h4>
            <div class="pull-right">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @lang('labels.downloads') <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        @forelse($application->outputs as $output)
                            <li><a target="_blank" href="{{ route('application.download', [$application->module_slug, $application->id, $output->id]) }}">{{ $output->output->name }}</a> </li>
                        @empty
                            <li><a href="#">@lang('labels.no_downloads')</a> </li>
                        @endforelse
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
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
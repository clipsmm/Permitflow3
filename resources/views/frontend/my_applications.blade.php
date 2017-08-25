@extends('layouts.frontend')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading p-t-10">
                        <div class="panel-heading">@lang('labels.application_history')</div>
                    </div>
                    <div class="panel-body padding-0">
                                <div class="panel panel-form m-r-10 m-l-10 m-t-0 m-b-0">
                                    <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">
                                        <table class="table table-responsive table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Service</th>
                        <th>Ref No</th>
                        <th>Bill Status</th>
                        <th>Application Status</th>
                        <th>Submitted On</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse($applications as $application)
                        <tr>
                            <td>{{ $application->module['name'] }}</td>
                            <td>{{ $application->application_number }}</td>
                            <td>{{ $application->status }}</td>
                            <td>{{ $application->status }}</td>
                            <td>{{ $application->submitted_at }}</td>
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
            </div>

        </div>
    </div>

@endsection
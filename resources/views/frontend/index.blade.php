@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @include('layouts.partials.sidebarnav')

            <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="#" class="btn btn-sm btn-default">
                            <span class="fa fa-th-list"></span> Recent Applications </a><div class="btn-group pull-right" role="group">

                            <a href="#" class="btn btn-sm btn-primary pull-right">
                                <span class="fa fa-plus-circle"></span>
                                Make Application</a>
                        </div> </div>

                    <div class="panel-body table-responsive">
                        <table class="table table-hover table-special table-striped">
                            <thead>
                            <tr>
                                <th>Application Name</th>
                                <th>Application No</th>
                                <th>Status</th>
                                <th class="pull-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>skjd</td>
                                <td>CDF34554</td>
                                <td>Pending</td>
                                <td>
                                    <a href="#" class="btn btn-primary pull-right btn-xs">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td>skjd</td>
                                <td>BDS34564</td>
                                <td>Completed</td>
                                <td>
                                    <a href="#" class="btn btn-primary pull-right btn-xs">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td>skjd</td>
                                <td>KDR12987</td>
                                <td>Denied</td>
                                <td >
                                    <a href="#" class="btn btn-primary pull-right btn-xs">View</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="#" class="btn btn-sm btn-success">
                            <span class="fa fa-th-list"></span> Applications History </a><div class="btn-group pull-right" role="group">

                            <a href="#" class="btn btn-sm btn-primary pull-right">
                                <span class="fa fa-plus-circle"></span>
                                Make Application</a>
                        </div> </div>

                    <div class="panel-body table-responsive">
                        <table class="table table-hover table-special table-striped">
                            <thead>
                            <tr>
                                <th>Application Name</th>
                                <th>Application No</th>
                                <th>Status</th>
                                <th class="pull-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>skjd</td>
                                <td>CDF34554</td>
                                <td>Pending</td>
                                <td>
                                    <a href="#" class="btn btn-primary pull-right btn-xs">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td>skjd</td>
                                <td>BDS34564</td>
                                <td>Completed</td>
                                <td>
                                    <a href="#" class="btn btn-primary pull-right btn-xs">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td>skjd</td>
                                <td>KDR12987</td>
                                <td>Denied</td>
                                <td >
                                    <a href="#" class="btn btn-primary pull-right btn-xs">View</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>



@endsection
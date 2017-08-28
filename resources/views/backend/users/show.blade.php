@extends('layouts.backend')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-body ">
                        <div class="tab-content">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">User Details</h3>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-responsive table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <td>{{$user->first_name}}</td>
                                        <td>{{$user->last_name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td></td>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="panel-footer"><span><a href="/backend/users" class="btn btn-default">Back</a></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
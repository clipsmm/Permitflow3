@extends('layouts.backend')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-body padding-0">
                        <div class="tab-content">
                            <div class="panel panel-form m-r-10 m-l-10 m-t-0 m-b-0">
                                <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">
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
                                    <span><a href="/backend/users" class="btn btn-default">Back</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
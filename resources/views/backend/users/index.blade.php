@extends('layouts.backend')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading p-t-10">
                        @include('backend.settings._backend_settings_menu')
                    </div>
                    <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab1default">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            View Users
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-hover table-special table-striped">
                                            <thead class="thead-default">
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($users as $user)
                                                <tr>
                                                    <td>{{$user->first_name}}</td>
                                                    <td>{{$user->last_name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>
                                                        <a href="{{route('backend.users.show', ['user' => $user])}}" class="btn btn-xs btn-primary">
                                                            <span class="fa fa-eye"></span> @lang('View')
                                                        </a>
                                                        <a href="{{route('backend.users.edit', ['user' => $user])}}" class="btn btn-xs btn-default">
                                                            <span class="fa fa-pencil"></span> @lang('Edit')
                                                        </a>
                                                        <a href="{{route('backend.users.roles.edit', ['user' => $user])}}" class="btn btn-xs btn-warning">
                                                            <span class="fa fa-pencil"></span> @lang(' Roles')
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection

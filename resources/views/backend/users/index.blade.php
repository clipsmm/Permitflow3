@extends('layouts.backend')

@section('title', 'Users')

@section('body')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>Users List</h2>

        </div>
        <div class="panel-body">

            <table class="table table-responsive table-bordered table-hover table-striped" style="width: 92%;">
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
                            <a href="{{route('backend.users.show', ['user' => $user])}}" class="btn btn-xs btn-default">
                                @lang('View')
                            </a>
                            <a href="{{route('backend.users.edit', ['user' => $user])}}" class="btn btn-xs btn-warning">
                                @lang('Edit')
                            </a>

                            <a href="{{route('backend.users.roles.edit', ['user' => $user])}}" class="btn btn-xs btn-warning">
                                @lang('Edit Roles')
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
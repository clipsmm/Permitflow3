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
                                <a href="/backend/users/{{$user->id}}" class="btn btn-sm btn-default">view</a>
                                <a href="/backend/users/{{$user->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
    </table>
        </div>
    </div>

@endsection
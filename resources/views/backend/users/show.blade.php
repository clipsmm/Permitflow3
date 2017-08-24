@extends('layouts.backend')

@section('title', 'Users')

@section('body')

<div class="container">

    <div class="row">

        <h2>Users List</h2>

        <div class="col-md-8">
            <div class="row">

                <table class="table table-responsive table-bordered table-hover" style="width: 92%;">
                    <tr>
                        <td>{{$user->full_name}}</td>
                    </tr>
                    <tr>
                        <td>{{$user->id_number}}</td>
                    </tr>
                    <tr>
                        <td>{{$user->email}}</td>
                    </tr>
                    <tr>
                        <td>{{$user->phone_number}}</td>
                    </tr>
                    <tr>
                        <td>{{$user->gender}}</td>
                    </tr>
                    <tr>
                        <td>{{$user->id_type}}</td>
                    </tr>
                </table>

                <span><a href="/backend/users" class="btn btn-default">Back</a></span>

            </div>
        </div>

    </div>

</div>

@endsection
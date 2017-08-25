@extends('layouts.backend')

@section('title', 'Roles')

@section('body')
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                @lang("Roles")
                <a href="{{route('backend.roles.create')}}" class="btn btn-sm btn-primary">Add Role</a>
            </div>
            <div class="panel-body">
                <table class="table table-responsive table-bordered table-hover table-striped" style="width: 92%;">
                    <thead class="thead-default">
                    <tr>
                        <th>Role Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <a href="/backend/roles/{{ $role->id }}/edit" class="btn btn-sm btn-default">Edit</a>
                                    {{--<a href="/backend/roles/{{ $role->id }}/delete" class="btn btn-sm btn-primary">Delete</a>--}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
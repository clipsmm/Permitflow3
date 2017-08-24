@extends('layouts.backend')
@section('body')
    {!! Form::open(['url' => route('backend.users.roles.update', $user)]) !!}
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('Edit User Roles')
        </div>
        <div class="panel-body">
            <h4>
                @lang('User'): {{$user->full_name}}
            </h4>
            @foreach($roles as $role)
                <div class="col-sm-3">
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('roles[]', $role->id, $user->hasRole($role->name)) !!}
                            {{$role->name}}
                        </label>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="panel-footer text-right">
            <button type="submit" class="btn btn-sm btn-primary">
                @lang('Save')
            </button>
        </div>
    </div>
    {!! Form::close() !!}
    
@endsection
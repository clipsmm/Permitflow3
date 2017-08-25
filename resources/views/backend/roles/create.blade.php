@extends('layouts.backend')

@section('title', 'Roles')

@section('body')
    <div class="col-md-12">
        {!! Form::model($role, ['url' => route('backend.roles.store')]) !!}
        <div class="panel panel-default panel-form">
            <div class="panel-heading">@lang("Add Role")</div>
            <div class="panel-body">
                @include('backend.roles.form')
            </div>
            <div class="panel-footer text-right">
                <button type="submit" class="btn btn-primary">
                    @lang("Submit")
                </button>
                <span class="pull-left">
                    <a href="/backend/roles" class="btn btn-md btn-default">Back</a>
                </span>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

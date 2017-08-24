@extends('layouts.backend')

@section('title', 'Roles')

@section('body')
    <div class="col-md-12">
        {!! Form::model($role, ['method' => 'PUT', 'url' => route('backend.roles.update', $role->id)]) !!}
          @include('backend.roles.form')
        {!! Form::close() !!}
    </div>
@endsection

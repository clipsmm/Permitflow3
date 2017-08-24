@extends('layouts.backend')

@section('title', 'Roles')

@section('body')
    <div class="col-md-12">
        {!! Form::model($role, ['url' => route('backend.roles.store')]) !!}
          @include('backend.roles.form')
        {!! Form::close() !!}
    </div>
@endsection

@extends('applications.edit')

@section('form-body')
    <div class="form-group {{error_class($errors, 'first_name')}}">
        <label>Surname <span class="required">*</span> </label>
        {!! Form::text('surname', null, ['class' => 'form-control']) !!}
        {!! error_tag($errors, 'first_name') !!}
    </div>
    <div class="form-group {{error_class($errors, 'first_name')}}">
        <label>First Name <span class="required">*</span> </label>
        {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
        {!! error_tag($errors, 'visa_type') !!}
    </div>
    <div class="form-group {{error_class($errors, 'first_name')}}">
        <label>Last Name <span class="required">*</span> </label>
        {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
        {!! error_tag($errors, 'visa_type') !!}
    </div>

@endsection
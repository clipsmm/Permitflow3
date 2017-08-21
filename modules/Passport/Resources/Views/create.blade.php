@extends('applications.create')
@section('form-body')
    <div class="form-group {{error_class($errors, 'surname')}}">
        <label>Surname <span class="required">*</span> </label>
        {!! Form::text('surname', null, ['class' => 'form-control']) !!}
        {!! error_tag($errors, 'surname') !!}
    </div>
    <div class="form-group {{error_class($errors, 'first_name')}}">
        <label>First Name <span class="required">*</span> </label>
        {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
        {!! error_tag($errors, 'first_name') !!}
    </div>
    <div class="form-group {{error_class($errors, 'last_name')}}">
        <label>Last Name <span class="required">*</span> </label>
        {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
        {!! error_tag($errors, 'last_name') !!}
    </div>


@endsection
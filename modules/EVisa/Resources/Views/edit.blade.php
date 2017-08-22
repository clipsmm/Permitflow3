@extends('applications.edit')
@section('form-body')
    <div class="col-sm-6">
        <div class="form-group {{error_class($errors, 'visa_type')}}">
            <label for="">
                @lang('Visa Type')
            </label>
            {!! Form::select('visa_type', ['32_page' => __('32 Page'), '48_page' => __('48 Page')], '32_page', ['class' => 'form-control input-sm']) !!}
            {!! error_tag($errors, 'visa_type') !!}
        </div>
    </div>
@stop
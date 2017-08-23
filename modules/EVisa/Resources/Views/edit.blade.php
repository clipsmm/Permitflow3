@extends('layouts.frontend')
@php
    if(!isset($step)){
        $step = 1;
    }
@endphp
@section('body')
    {!! Form::model($model, ['url' => route('e-visa.application.update', ['application' => $application, 'step' => $step])]) !!}
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('Edit Application')
        </div>
        <div class="panel-body">
            @include('e-visa::form_body')
        </div>
        <div class="panel-footer text-right">
            @if($step > 1)
                <a href="#" class="btn btn-primary btn-sm">
                    @lang('Previous')
                </a>
            @endif
            <button type="submit" class="btn btn-sm btn-primary">@lang('Next')</button>
        </div>
    </div>
    {!! Form::close() !!}
@stop

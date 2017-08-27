@extends('layouts.frontend')
@php
    if(!isset($step)){
    $step = 1;
    }
@endphp
@section('body')
    <div class="container">
        <div class="row m-t-0">
            <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                <div class="panel panel-default panel-form">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            @lang('e-visa::common.kenyan_visa'):
                            {{$application->application_number}}
                        </h3>
                    </div>
                    {!! Form::model($model, ['files' => true, 'url' => route('e-visa.application.update', ['application' => $application, 'step' => $step])]) !!}
                    <div class="panel-body">
                        <div class="panel panel-default">
                            <div class="panel-body p-t-0 p-r-0 p-b-0 p-l-0">
                                @include('e-visa::form_body')
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer text-right">
                        @if($step > 1)
                            <a href="{{route('e-visa.application.edit', ['application' => $application, 'step' => $step - 1])}}" class="btn btn-md btn-success btn-sm">
                                <span class="fa fa-eye"></span>  @lang('Previous')
                            </a>
                        @endif
                        <button type="submit" class="btn btn-sm btn-primary">@lang('Next')</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
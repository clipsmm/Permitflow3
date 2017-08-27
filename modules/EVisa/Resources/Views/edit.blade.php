@extends('layouts.frontend')
@php
    if(!isset($step)){
    $step = 1;
    }
@endphp
@section('body')
    <div class="row m-t-0">
        <div class="col-md-12">
            <div class="panel panel-default panel-form">
                {!! Form::model($model, ['files' => true, 'url' => route('e-visa.application.update', ['application' => $application, 'step' => $step])]) !!}
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4>
                                @lang('e-visa::common.kenyan_visa'):
                                {{$application->application_number}}
                            </h4>
                            <hr>
                            <div>
                                @include('e-visa::steps.progress_bar')
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                            @include('e-visa::form_body')
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="panel m-b-0 m-t-0">
                                @include('e-visa::steps.side_info')
                            </div>
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
@stop
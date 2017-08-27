@extends('layouts.frontend')
@php
    if(!isset($step)){
    $step = 1;
    }
@endphp
@section('body')
    <div class="container">
    <div class="row m-t-0">
        <div class="col-md-12">
            <div class="panel panel-default panel-form">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        @lang('e-visa::common.single_entry_visa'):
                        {{$application->application_number}}
                    </h3>
                </div>
                <div class="panel-body">
                {!! Form::model($model, ['files' => true, 'url' => route('e-visa.application.update', ['application' => $application, 'step' => $step])]) !!}
                    <div class="row">
                            {{--<div>--}}
                                {{--@include('e-visa::steps.progress_bar')--}}
                            {{--</div>--}}
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            @include('e-visa::form_body')
                        </div>
                        {{--<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">--}}
                            {{--<div class="panel m-b-0 m-t-0">--}}
                                {{--@include('e-visa::steps.side_info')--}}
                            {{--</div>--}}
                        {{--</div>--}}
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
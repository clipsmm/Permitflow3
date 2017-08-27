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
                    @lang('e-visa::common.single_entry_visa')
                </h3>
                </div>
                <div class="panel-body">
                {!! Form::model($model, ['files' => true, 'url' => route('e-visa.application.new', ['step' => $step])]) !!}

                    <div class="row">
                        <div class="col-sm-12">
                            {{--<div>--}}
                                {{--@include('e-visa::steps.progress_bar')--}}
                            {{--</div>--}}
                        </div>
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
                    @if($step ==  1)
                        <a href="{{ route('e-visa.retrieve_existing') }}" class="btn btn-default" title="">
                            @lang('e-visa::common.retrieve_existing_application')
                        </a>
                    @endif
                    @if($step > 1)
                        <a href="{{route('e-visa.application.new', ['step' => $step - 1])}}"
                           class="btn btn-default btn-sm">
                            @lang('Previous')
                        </a>
                    @endif
                    <button type="submit" class="btn btn-sm btn-primary">@lang('Next')</button>
                </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    </div>
@stop
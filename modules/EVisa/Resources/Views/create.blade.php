@extends('layouts.frontend')
@php
    if(!isset($step)){
    $step = 1;
    }
@endphp
@section('body')
    <div class="row m-t-0">
        <div class="col-md-12">
            <!-- panel -->
            <div class="panel panel-default panel-form m-r-10 m-l-10">
                <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        @include('e-visa::steps.progress_bar')
                        {!! Form::model($model, ['files' => true, 'url' => route('e-visa.application.new', ['step' => $step])]) !!}
                        <div class="panel-heading">
                            @lang('e-visa::common.single_entry_visa')
                        </div>
                        <div class="panel-body">
                            @include('e-visa::form_body')
                        </div>
                        <div class="panel-footer text-right">
                            @if($step > 1)
                                <a href="{{route('e-visa.application.new', ['step' => $step - 1])}}" class="btn btn-primary btn-sm">
                                    @lang('Previous')
                                </a>
                            @endif
                            <button type="submit" class="btn btn-sm btn-primary">@lang('Next')</button>
                        </div>
                         {!! Form::close() !!}
                    </div>
                    @include('e-visa::steps.side_info')
                </div>
            </div>
        </div>
    </div>
@stop
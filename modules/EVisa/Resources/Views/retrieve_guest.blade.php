@extends('layouts.frontend')
@section('content')
    <div class="col-sm-6 col-sm-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('Retrieve your application to continue')</div>
            <div class="panel-body">
                {!! Form::open(['url' => route('e-visa.guest.continue', ['return_code' => $return_code])]) !!}
                    <div class="form-group {{error_class($errors, 'application_number')}}">
                        <label for="">
                            @lang('Application Reference Number')
                        </label>
                        {!! Form::text('application_number', NULL, ['class' => 'form-control input-sm']) !!}
                        {!! error_tag($errors, 'application_number') !!}
                    </div>
                <div class="form-group {{error_class($errors, 'recaptcha')}}">
                    {{--<div class="g-recaptcha" data-sitekey="{{env('RECAPTCHA_KEY')}}"></div>--}}
                    {{--{!! error_tag($errors, 'recaptcha') !!}--}}
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-primary text-right">
                        @lang('Continue')
                    </button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
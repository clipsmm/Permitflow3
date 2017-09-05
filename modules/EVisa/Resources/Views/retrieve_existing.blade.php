@extends('layouts.frontend')
@section('body')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"> {{$current_module->name}}
                : @lang('e-visa::common.retrieve_existing_application')</h3>
        </div>
        <div class="panel-body">
            {!! Form::open(['url' => route('e-visa.retrieve_existing.submit')]) !!}
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group {{error_class($errors, 'application_number')}}">
                        <label>
                            @lang('common.application_number')
                        </label>
                        {!! Form::text('application_number', null, ['class' => 'form-control', 'placeholder' => __('common.application_number')]) !!}
                        <span class="help-block">
                                For Example EV-48DJSK
                            </span>
                        {!! error_tag($errors, 'application_number') !!}
                    </div>

                    <div class="form-group {{error_class($errors, 'email')}}">
                        <label>
                            @lang('forms.email_address')
                        </label>
                        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => __('forms.email_address')]) !!}
                        <span class="help-block">
                                Input the email address used in the application
                            </span>
                        {!! error_tag($errors, 'email') !!}
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <button type="submit" class="btn btn-primary btn-sm">
                        @lang('forms.submit')
                    </button>
                </div>
                {!! Form::close() !!}
            </div>

        </div>
        <div class="panel-footer">
            <a href="{{ $current_module->newUrl() }}">Or create a new application</a>
        </div>
    </div>

@endsection
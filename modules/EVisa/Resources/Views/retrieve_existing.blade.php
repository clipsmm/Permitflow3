@extends('layouts.frontend')
@section('body')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-sm-4 col-sm-offset-4">
                <h4>
                    {{$module->name}}: @lang('e-visa::common.retrieve_existing_application')
                </h4>
                <hr>
                {!! Form::open(['url' => route('e-visa.retrieve_existing.submit')]) !!}
                <div class="form-group {{error_class($errors, 'application_number')}}">
                    <label>
                        @lang('common.application_number')
                    </label>
                    <div class="alert alert-info m-b-5 padding-5">
                        For Example EV-48DJSK
                    </div>
                    {!! Form::text('application_number', null, ['class' => 'form-control input-sm', 'placeholder' => __('common.application_number')]) !!}
                    {!! error_tag($errors, 'application_number') !!}
                </div>

                <div class="form-group {{error_class($errors, 'email')}}">
                    <label>
                        @lang('forms.email_address')
                    </label>
                    <div class="alert alert-info m-b-5 padding-5">
                        Input the email address used in the application
                    </div>
                    {!! Form::email('email', null, ['class' => 'form-control input-sm', 'placeholder' => __('forms.email_address')]) !!}
                    {!! error_tag($errors, 'email') !!}
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary btn-sm">
                        @lang('forms.submit')
                    </button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
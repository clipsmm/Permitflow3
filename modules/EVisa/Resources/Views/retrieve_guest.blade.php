@extends('layouts.frontend')
@section('body')
        <div class="panel panel-default">
            <div class="panel-heading">@lang('Retrieve Application')</div>
            <div class="panel-body">
                {!! Form::open(['url' => route('e-visa.guest.resume', ['return_code' => $return_code])]) !!}
                    <div class="form-group {{error_class($errors, 'application_number')}}">
                        <label for="">
                            @lang('Reference Number')
                        </label>
                        {!! Form::text('application_number', NULL, ['class' => 'form-control input-sm']) !!}
                        {!! error_tag($errors, 'application_number') !!}
                    </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('import_existing') !!}
                            @lang('e-visa::forms.import_existing')
                        </label>
                    </div>
                </div>
                <div class="form-group {{error_class($errors, 'recaptcha')}}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-primary text-right">
                        @lang('Continue')
                    </button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
@endsection
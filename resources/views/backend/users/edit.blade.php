@extends('layouts.backend')

@section('title', 'Users')

@section('body')
    <div class="col-md-12">
        {!! Form::model($user, ['method' => 'PUT', 'url' => route('backend.users.update', $user->id)]) !!}
        <div class="panel panel-default">
            <div class="panel-heading">@lang("Edit Profile")</div>
            <div class="panel-body">
                <div class="col-md-4">
                    <div class="form-group{{ error_class($errors, 'first_name') }}">
                        <label for="name" class="control-label">@lang("First Name")</label>
                        {!!  Form::text('first_name', null, ['class' => 'form-control input-sm']) !!}
                        {!! error_tag($errors, 'first_name') !!}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group{{ error_class($errors, 'surname') }}">
                        <label for="surname" class="control-label">@lang("Surname")</label>
                        {!!  Form::text('surname', null, ['class' => 'form-control input-sm']) !!}
                        {!! error_tag($errors, "surname") !!}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group{{ error_class($errors, "last_name") }}">
                        <label for="last_name" class="control-label">@lang("Last Name")</label>
                        {!!  Form::text('last_name', null, ['class' => 'form-control input-sm']) !!}
                        {!! error_tag($errors, "last_name") !!}
                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="col-md-4">
                    <div class="form-group{{ error_class($errors, "email") }}">
                        <label for="email" class="control-label">@lang("Email")</label>
                        {!!  Form::email('email', null, ['class' => 'form-control input-sm']) !!}
                        {!! error_tag($errors, "email") !!}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group{{ error_class($errors, "phone_number") }}">
                        <label for="phone_number" class="control-label">@lang("Phone Number")</label>
                        {!!  Form::text('phone_number', null, ['class' => 'form-control input-sm']) !!}
                        {!! error_tag($errors, "phone_number") !!}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group{{ error_class($errors, "gender") }}">
                        <label for="gender" class="control-label">@lang("Gender")</label>
                        {{Form::select("gender", ["M" => __("Male"), "F" => __("Female"), "other" => __("Other")], null, ['class' => 'form-control']) }}
                        {!! error_tag($errors, "gender") !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-4">
                    <div class="form-group{{ error_class($errors, "id_number") }}">
                        <label for="id_number" class="control-label">@lang("Id Number")</label>
                        {!!  Form::text('id_number', null, ['class' => 'form-control input-sm']) !!}
                        {!! error_tag($errors, "id_number") !!}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group{{ error_class($errors, "id_type") }}">
                        <label for="id_type" class="control-label">@lang("Id Type")</label>
                        {{Form::select("id_type", ["citizen" => __("Citizen"), "alien" => __("Foreign Resident"), "visitor" => __("Foreigner")], null, ['class' => 'form-control']) }}
                        {!! error_tag($errors, "id_type") !!}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group{{ error_class($errors, "dob") }}">
                        <label for="dob" class="control-label">@lang("Date Of Birth")</label>
                        {{Form::date("dob", null, ['class' => 'form-control']) }}
                        {!! error_tag($errors, "dob") !!}
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="panel-footer text-right">
                <button type="submit" class="btn btn-primary">
                    @lang("Submit Edit")
                </button>
                <span class="pull-left">
                        <a href="/backend/users" class="btn btn-md btn-default">Back</a>
                    </span>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

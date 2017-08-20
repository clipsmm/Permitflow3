@extends('backend.index')

@section('content')
    <div class="col-md-12">
        <form method="PUT" action="/users/{{$user->id}}">
            <div class="panel panel-default">
                <div class="panel-heading">@lang("Edit Profile")</div>
                <div class="panel-body">
                    {{ csrf_field() }}
                    <div class="col-md-4">
                        <div class="form-group{{ error_class($errors, 'first_name') }}">
                            <label for="name" class="control-label">@lang("First Name")</label>
                            <input id="name" type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" autofocus>
                            {!! error_tag($errors, 'first_name') !!}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group{{ error_class($errors, 'surname') }}">
                            <label for="surname" class="control-label">@lang("Surname")</label>
                            <input id="surname" type="text" class="form-control" name="surname" value="{{ $user->surname }}" autofocus>
                            {!! error_tag($errors, "surname") !!}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group{{ error_class($errors, "last_name") }}">
                            <label for="last_name" class="control-label">@lang("Last Name")</label>
                            <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $user->last_name }}">
                            {!! error_tag($errors, "last_name") !!}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group{{ error_class($errors, "email") }}">
                            <label for="email" class="control-label">@lang("Email")</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}">
                            {!! error_tag($errors, "email") !!}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group{{ error_class($errors, "phone_number") }}">
                            <label for="phone_number" class="control-label">@lang("Phone Number")</label>
                            <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ $user->phone_number }}">
                            {!! error_tag($errors, "phone_number") !!}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group{{ error_class($errors, "gender") }}">
                            <label for="gender" class="control-label">@lang("Gender")</label>
                            {{Form::select("gender", ["M" => __("Male"), "F" => __("Female"), "other" => __("Other")], $user->gender, ['class' => 'form-control']) }}
                            {!! error_tag($errors, "gender") !!}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group{{ error_class($errors, "id_number") }}">
                            <label for="id_number" class="control-label">@lang("Id Number")</label>
                            <input id="id_number" type="text" class="form-control" name="id_number" value="{{ $user->id_number }}">
                            {!! error_tag($errors, "id_number") !!}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group{{ error_class($errors, "id_type") }}">
                            <label for="id_type" class="control-label">@lang("Id Type")</label>
                            {{Form::select("id_type", ["citizen" => __("Citizen"), "alien" => __("Foreign Resident"), "visitor" => __("Foreigner")], $user->id_type, ['class' => 'form-control']) }}
                            {!! error_tag($errors, "id_type") !!}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group{{ error_class($errors, "dob") }}">
                            <label for="dob" class="control-label">@lang("Date Of Birth")</label>
                            {{Form::date("dob", $user->dob, ['class' => 'form-control']) }}
                            {!! error_tag($errors, "dob") !!}
                        </div>
                    </div>

                </div>

                <div class="panel-footer text-right">
                    <button type="submit" class="btn btn-primary">
                        @lang("Submit Edit")
                    </button>
                    <span class="pull-left">
                        <a href="/users" class="btn btn-md btn-default">Back</a>
                    </span>
                </div>
            </div>
        </form>
    </div>
@endsection

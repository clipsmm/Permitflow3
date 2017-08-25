@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row m-t-0">
            <div class="col-md-12">
                <div class="panel panel-default panel-form m-r-10 m-l-10">
                    <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                            <h3 class="p-l-20">Register</h3>
                            <form method="POST" action="{{ route('register') }}">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            {{ csrf_field() }}
                            <div class="col-md-6">
                                <div class="form-group{{ error_class($errors, 'first_name') }}">
                                    <label for="name" class="control-label">@lang("First Name")</label>
                                    <input id="name" type="text" class="form-control" name="first_name"
                                           value="{{ old('first_name') }}" autofocus>
                                    {!! error_tag($errors, 'first_name') !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group{{ error_class($errors, 'surname') }}">
                                    <label for="surname" class="control-label">@lang("Surname")</label>
                                    <input id="surname" type="text" class="form-control" name="surname"
                                           value="{{ old('surname') }}" autofocus>
                                    {!! error_tag($errors, "surname") !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group{{ error_class($errors, "last_name") }}">
                                    <label for="last_name" class="control-label">@lang("Last Name")</label>
                                    <input id="last_name" type="text" class="form-control" name="last_name"
                                           value="{{ old('last_name') }}">
                                    {!! error_tag($errors, "last_name") !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group{{ error_class($errors, "email") }}">
                                    <label for="email" class="control-label">@lang("Email")</label>
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}">
                                    {!! error_tag($errors, "email") !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group{{ error_class($errors, "phone_number") }}">
                                    <label for="phone_number" class="control-label">@lang("Phone Number")</label>
                                    <input id="phone_number" type="text" class="form-control" name="phone_number"
                                           value="{{ old('phone_number') }}">
                                    {!! error_tag($errors, "phone_number") !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group{{ error_class($errors, "gender") }}">
                                    <label for="gender" class="control-label">@lang("Gender")</label>
                                    {{Form::select("gender", ["M" => __("Male"), "F" => __("Female"), "other" => __("Other")], "M", ['class' => 'form-control']) }}
                                    {!! error_tag($errors, "gender") !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group{{ error_class($errors, "id_number") }}">
                                    <label for="id_number" class="control-label">@lang("Id Number")</label>
                                    <input id="id_number" type="text" class="form-control" name="id_number"
                                           value="{{ old('id_number') }}">
                                    {!! error_tag($errors, "id_number") !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group{{ error_class($errors, "id_type") }}">
                                    <label for="id_type" class="control-label">@lang("Id Type")</label>
                                    {{Form::select("id_type", ["citizen" => __("Citizen"), "alien" => __("Foreign Resident"), "visitor" => __("Foreigner")], "citizen", ['class' => 'form-control']) }}
                                    {!! error_tag($errors, "id_type") !!}
                                </div>
                            </div>

                            {{--<div class="col-md-6">--}}
                                {{--<div class="form-group{{ error_class($errors, "dob") }}">--}}
                                    {{--<label for="dob" class="control-label">@lang("Date Of Birth")</label>--}}
                                    {{--{{Form::date("dob", \Carbon\Carbon::today(), ['class' => 'form-control']) }}--}}
                                    {{--{!! error_tag($errors, "dob") !!}--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="col-md-6">
                                <div class="form-group{{ error_class($errors, "password") }}">
                                    <label for="password" class="control-label">@lang("Password")</label>
                                    {{Form::password("password", ['class' => 'form-control']) }}
                                    {!! error_tag($errors, "password") !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group{{ error_class($errors, "password_confirmation") }}">
                                    <label for="password_confirmation"
                                           class="control-label">@lang("Password Confirmation")</label>
                                    {{Form::password("password_confirmation", ['class' => 'form-control']) }}
                                    {!! error_tag($errors, "password_confirmation") !!}
                                 </div>
                            </div>
                        </div>
                        <div class="panel-footer text-right">
                                <span class="pull-left">Already have an account? <a href="{{ url('login') }}">Sign In</a>  </span>

                                <a href="{{config('app.ss-on-url')}}" type="submit" class="btn btn-default">
                                    @lang('Register via eCitizen')
                                </a>

                            <button type="submit" class="btn btn-primary">
                                @lang("Register")
                            </button>
                        </div>
                    </div>
                </form>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="panel m-b-0 m-t-0">
                                <div class="panel-body p-t-0 p-l-5 p-r-5 p-b-0">
                                    <div class="alert alert_sucess_custom" role="alert">
                                        <i class="fa fa-lg" aria-hidden="true"></i>
                                        <strong>Registration Process !</strong>    </br></br>
                                        Please, type the date you plan to enter Kenya to the related field.</br></br>
                                        The validity period of your e-Visa will begin as of the date you enter Kenya.
                                        </br></br>
                                        Please note that the validity period is different than the period of stay. The period of stay cannot exceed the duration stated on the left-hand side. If you wish to stay longer, you must apply to your local Police Station for a residency permit.
                                        </br></br>
                                        If you exceed the duration stated on the left-hand side on a single entry without having a residency permit, you may be required to pay fines, deported, or banned from future travel to Kenya for a period of time.
                                        </br></br>
                                        The e-Visa system does not inform you the number of days you stay in Kenya. It is your responsibility to make sure that you do not overstay your visa.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')


@section('content')
    @include('layouts.partials.topnav1')
    @if (Auth::guest())
        @include('layouts.partials.top_nav_default')
    @else
        @include('layouts.partials.topnave2')
    @endif
    <div id="vue-root" class="container">
        <div class="row m-t-0">
            <div class="col-md-12">
                <div class="panel panel-default panel-form m-r-10 m-l-10">
                    <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Register</h3>
                        </div>
                        <form method="POST" action="{{ route('register') }}">

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
                                    <intl-telephone-input value="{{old('phone_number')}}" name="phone_number" ></intl-telephone-input>
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
                         </form>
                     </div>
                        </div>

                    </div>
                 </div>
            </div>
        </div>
    </div>
@endsection

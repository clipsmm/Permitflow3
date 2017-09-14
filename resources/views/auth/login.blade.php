@extends('layouts.app')

@section('content')
    @include('layouts.partials.topnav1')
    @if (Auth::guest())
        @include('layouts.partials.top_nav_default')
    @else
        @include('layouts.partials.topnave2')
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login</h3>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        <div class="panel-body">
                            @if(session()->has('link-sent'))
                            <div class="alert alert-info">
                                {{session('link-sent')}}
                            </div>
                            @endif
                            <div class="">

                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="control-label">E-Mail Address</label>

                                    <input id="email" type="text" class="form-control" name="email"
                                           value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <br>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="control-label">Password</label>

                                    <input id="password" type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"
                                                   name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            Remember Me
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg">
                                        Login
                                    </button>
                                </div>

                                <div class="form-group">
                                    <a class="btn btn-default btn-block btn-lg" href="{{ route('auth.sso_redirect') }}">
                                        Login with eCitizen
                                    </a>
                                </div>

                                <div class="form-group">
                                    <button type='submit' class="btn btn-success btn-block btn-lg" name="magic-login" value="true">
                                        Email-Only Log In
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-right">
                            <span class="pull-left">
                                You don't have an account? <a
                                        href="{{ url('register') }}">Register</a>
                            </span>
                            <span class="pull-right">
                                <a class="btn btn-link btn-block" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </span>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

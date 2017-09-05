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
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login</h3>
                    </div>
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        <div class="panel-body">

                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <br>


                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"
                                                   name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                Forgot Your Password?
                                            </a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <a class="btn btn-default" href="{{ route('auth.sso_redirect') }}">
                                        Login with eCitizen
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="panel-footer text-right">
                            <div class="clearfix">
                                <span class="pull-left clearfix">You don't have an account? <a
                                            href="{{ url('register') }}">Register</a>  </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

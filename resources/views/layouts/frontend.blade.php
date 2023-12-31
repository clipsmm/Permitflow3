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
            @if (!Auth::guest())
                <div class="col-sm-2 col-md-2 col-lg-2 hidden-xs">
                    <div class="side-bar">
                        <div class="side-profile-menu m-b-10">
                            <div class="thumbnail">
                                <img class="img-responsive hidden-xs" src="{{url('images/avatar.png')}}">
                            </div>
                            <div class="profile-info">
                                <h4 class="profile-name">{{ user()->full_name }} </h4>
                                <ul class="nav navbar-nav nav-profile">
                                    <li>{{ user()->id_number }}</li>
                                    <li>{{ user()->phone }}</li>
                                    <li class="truncate">{{ user()->email }}</li>
                                </ul>
                            </div>
                            @isset($my_modules)
                            <div class="left-nav hidden-xs">
                                <div class="sidebar-nav">
                                    <div class="profile-info">
                                        <h4 class="profile-name">Modules</h4>
                                    </div>
                                    <ul class="nav">
                                        @foreach($my_modules as $mod)
                                            <li><a href="{{ route("backend.tasks.queue", $mod->slug)    }}">{{ $mod->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endisset
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">Need Help?</div>
                        </div>
                        <div class=panel-body>
                            eVisa services Queries:<br/>
                            +254 790 724 571 <br/><br/>
                            ePassport services Queries:<br/>
                            +254 790 724 485 <br/><br/>
                            Payment Issues:<br/>
                            +254 709 480 000<br/><br/>
                            Email: support@im.go.ke
                        </div>
                    </div>
                </div>
            @endif
            @if (Auth::guest())
                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                    @else
                        <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                            @endif
                            @include('partials.notifier')
                            @yield('body')
                        </div>
                </div>
                @stack('modals')
        </div>

@endsection
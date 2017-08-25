@extends('layouts.app')
@section('content')
    @include('layouts.partials.topnav1')
    @include('layouts.partials.topnave2')
    <div class="container">
        <div class="row">
            <div class="col-sm-2 col-md-2 col-lg-2 hidden-xs">
                <div class="side-bar">
                    <div class="side-profile-menu m-b-10">
                        <div class="thumbnail">
                            <img class="img-responsive hidden-xs" src="https://accounts.ecitizen.go.ke/profile-picture/25272520?t=citizen">
                        </div>
                        <div class="profile-info">
                            <h4 class="profile-name">{{ user()->full_name }} </h4>
                            <ul class="nav navbar-nav nav-profile">
                                <li>{{ user()->id_number }}</li>
                                <li>{{ user()->phone }}</li>
                                <li class="truncate">{{ user()->email }}</li>
                            </ul>
                        </div>
                        <div class="left-nav hidden-xs">
                        </div>
                    </div>
                </div>


                @isset($current_module)
                    <div class="side-profile-menu m-b-10">
                        <div class="profile-info">
                            <h4 class="profile-name">{{ $current_module->name }}</h4>
                        </div>
                        <div class="sidebar-nav">
                            <ul class="nav ">
                                @foreach($current_module->get_menus() as $menu)
                                    <li class="{{ request()->fullUrl() == array_get($menu, 'action') ? 'active' : '' }}"><div class="panel-title"><a href="{{ array_get($menu, 'action') }}"><i class="{{ array_get($menu, 'icon') }}"></i> {{ array_get($menu,'name') }}</a></div></li>
                                @endforeach

                            </ul>
                        </div>
                    </div>

                @endisset
                <div class="side-profile-menu">
                    <div class="sidebar-nav">
                        <div class="profile-info">
                            <h4 class="profile-name">Modules</h4>
                        </div>
                        <ul class="nav">
                            @foreach($active_modules as $mod)
                                <li><a href="{{ route("backend.tasks.queue", $mod->slug)    }}">{{ $mod->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                @include('partials.notifier')
                @yield('body')
            </div>
        </div>
        @stack('modals')
    </div>
@endsection
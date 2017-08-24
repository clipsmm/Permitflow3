@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-sm-2 col-md-2 col-lg-2 hidden-xs">
                <div class="side-bar">
                    <div class="side-profile-menu m-b-10">
                        <div class="thumbnail">
                            <img class="img-responsive hidden-xs" src="https://accounts.ecitizen.go.ke/profile-picture/25272520?t=citizen">
                        </div>

                        <div class="profile-info">
                            <h4 class="profile-name">ISAAC KINYANJUI KIRAI </h4>
                            <ul class="nav navbar-nav nav-profile">
                                <li>25272520</li>
                                <li>+254725716411</li>
                                <li class="truncate">kinyanjuiisaac@gmail.com</li>
                            </ul>
                        </div>

                        <!-- side-profile-menu-->
                        <div class="left-nav hidden-xs">
                        </div>

                    </div>
                </div>

                @isset($module)
                    <div class="side-profile-menu">
                        <div class="profile-info">
                            <h4 class="profile-name">Business Registration Service</h4>
                        </div>
                        <div class="sidebar-nav">
                            <ul class="nav">
                                @foreach($module->get_menus() as $menu)
                                    <li class="{{ request()->fullUrl() == array_get($menu, 'action') ? 'active' : '' }}">
                                        <a href="{{ array_get($menu, 'action') }}"><i class="{{ array_get($menu, 'icon') }}"></i> {{ array_get($menu, 'name') }}</a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>

                @endisset

                @isset($backend_modules)
                    <div class="side-profile-menu">
                        <div class="sidebar-nav">
                            <h3>Modules</h3>
                            <ul class="nav">
                                @foreach($backend_modules as $mod)
                                    <li><a href="{{ route("backend.tasks.queue", $mod->slug) }}">{{ $mod->name }}</a></li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                @endisset



            </div>

            <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                @include('partials.notifier')
                @yield('body')
            </div>






        </div>

        <!-- Modal -->
        @stack('modals')
    </div>

@endsection
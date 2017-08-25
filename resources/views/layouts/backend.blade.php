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

                        <!-- side-profile-menu-->
                        <div class="left-nav hidden-xs">
                        </div>

                    </div>
                </div>

                    <div class="side-profile-menu">
                        <div class="sidebar-nav">
                            <div class="profile-info">
                                <h4 class="profile-name">Modules</h4>
                            </div>
                            <ul class="nav">
                                @foreach($active_modules as $mod)
                                    <li><a href="{{ route("backend.tasks.queue", $mod->slug) }}">{{ $mod->name }}</a></li>
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

        <!-- Modal -->
        @stack('modals')
    </div>

@endsection
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
                            <img class="img-responsive hidden-xs"
                                 src="https://accounts.ecitizen.go.ke/profile-picture/25272520?t=citizen">
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
            <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                @include('partials.notifier')
                @yield('body')
            </div>
        </div>
        @stack('modals')
    </div>

@endsection
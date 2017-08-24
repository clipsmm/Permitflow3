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


                @isset($my_modules)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">Modules</div>
                        </div>
                        <div class=panel-body>
                            <ul class="nav navbar-nav nav-profile">
                                @foreach($my_modules as $mod)
                                    <li><a href="{{ route('backend.tasks.queue', $mod['slug']) }}">{{ $mod['name'] }}</a></li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                @endisset

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">Need Help?</div>
                    </div>
                    <div class=panel-body>

                        eVisa services Queries:<br/>
                        +254 790 724 571 <br/><br/>
                        ePassport services Queries:<br/>
                        +254 790 724 485  <br/><br/>
                        Payment Issues:<br/>
                        +254 709 480 000<br/><br/>
                        Email: support@im.go.ke
                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">

                @include('partials.notifier')

                <!-- pannel -->
            @yield('body')

                <!--   end pannel -->
            </div>






        </div>

        <!-- Modal -->
        @stack('modals')
    </div>

@endsection
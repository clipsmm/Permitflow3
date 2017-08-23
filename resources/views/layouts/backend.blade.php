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



                <div class="alert alert_sucess_custom" role="alert">
                    <i class="fa fa-check fa-lg" aria-hidden="true"></i>
                    <strong>Notice!</strong> Our system has been facing some challenges due to some maintenance that is currently being undertaken
                    that is causing some delays in processing applications. Please accept our apologies for any inconvenience caused, we are making every effort to restore our services.
                </div>




                <!-- pannel -->
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <div class="pull-right" role="">

                            <a href="{{ route('backend.tasks.index') }}" class="btn btn-sm btn-success">
                                <span class="fa fa-tasks"></span> Tasks
                            </a>
                            <a href="#" class="btn btn-sm btn-primary">
                                <span class="fa fa-list"></span> Applications
                            </a>
                            <a href="#" class="btn btn-sm btn-warning">
                                <span class="fa fa-file-text"></span> Reports
                            </a>
                            <a href="#" class="btn btn-sm btn-info">
                                <span class="fa fa-cogs"></span> Settings
                            </a>
                        </div>
                        <h3 class="panel-title">Tasks</h3>
                        <!--   <small> Application tasks</small> -->
                    </div>


                    <div class="panel-body">

                        @yield('body')

                    </div>





                </div>


                <!--   end pannel -->
            </div>






        </div>

        <!-- Modal -->
        @stack('modals')
    </div>

@endsection
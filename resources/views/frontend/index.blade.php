@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-sm-2 col-md-2 col-lg-2 hidden-xs">
                <div class="side-bar">
                    <div class="side-profile-menu">
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
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="#" class="btn btn-sm btn-default">
                            <span class="fa fa-th-list"></span> Recent Applications </a><div class="btn-group pull-right" role="group">

                            <a href="#" class="btn btn-sm btn-primary pull-right">
                                <span class="fa fa-plus-circle"></span>
                                Make Application</a>
                        </div> </div>

                    <div class="panel-body table-responsive">
                        <table class="table table-hover table-special table-striped">
                            <thead>
                            <tr>
                                <th>Application Name</th>
                                <th>Application No</th>
                                <th>Status</th>
                                <th class="pull-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>skjd</td>
                                <td>CDF34554</td>
                                <td>Pending</td>
                                <td>
                                    <a href="#" class="btn btn-primary pull-right btn-xs">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td>skjd</td>
                                <td>BDS34564</td>
                                <td>Completed</td>
                                <td>
                                    <a href="#" class="btn btn-primary pull-right btn-xs">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td>skjd</td>
                                <td>KDR12987</td>
                                <td>Denied</td>
                                <td >
                                    <a href="#" class="btn btn-primary pull-right btn-xs">View</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="#" class="btn btn-sm btn-success">
                            <span class="fa fa-th-list"></span> Applications History </a><div class="btn-group pull-right" role="group">

                            <a href="#" class="btn btn-sm btn-primary pull-right">
                                <span class="fa fa-plus-circle"></span>
                                Make Application</a>
                        </div> </div>

                    <div class="panel-body table-responsive">
                        <table class="table table-hover table-special table-striped">
                            <thead>
                            <tr>
                                <th>Application Name</th>
                                <th>Application No</th>
                                <th>Status</th>
                                <th class="pull-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>skjd</td>
                                <td>CDF34554</td>
                                <td>Pending</td>
                                <td>
                                    <a href="#" class="btn btn-primary pull-right btn-xs">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td>skjd</td>
                                <td>BDS34564</td>
                                <td>Completed</td>
                                <td>
                                    <a href="#" class="btn btn-primary pull-right btn-xs">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td>skjd</td>
                                <td>KDR12987</td>
                                <td>Denied</td>
                                <td >
                                    <a href="#" class="btn btn-primary pull-right btn-xs">View</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            


        </div>
    </div>



@endsection
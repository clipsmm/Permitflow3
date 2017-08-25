<!DOCTYPE html>
<!-- saved from url=(0054)http://getbootstrap.com/examples/sticky-footer-navbar/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>eVisa</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,400,700" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="./css/font-awesome.min.css" rel="stylesheet">
    <link href="./css/app.css" rel="stylesheet">

    <![endif]-->
</head>

<body>
<!-- Start Header -->
<header>
    <!-- Fixed navbar -->
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">eBusiness</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/">Home</a></li>
                    <li class="hidden-sm hidden-md hidden-lg"><a href="/accounts/46/services">Make Application</a></li>
                    <li class="hidden-sm hidden-md hidden-lg"><a href="/accounts/46/applications">Application History</a></li>
                    <li class="hidden-sm hidden-md hidden-lg"><a href="/auth/logout">Logout</a>
                </ul>

                <div id="searchbar" class="col-sm-3 col-md-6">
                    <form accept-charset="UTF-8" action="/search-business" class="navbar-form navbar-left" method="get" role="search"><input name="_utf8" type="hidden" value="✓">                            <div class="input-group">
                            <input class="form-control" id="search_q" name="search[q]" placeholder="Search businesses by name" type="text">                                <span class="input-group-btn">
                                    <button class="btn btn-default">
                                        <span class="fa fa-search"></span>
                                    </button>
                                </span>
                        </div>
                    </form>                    </div>

                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden-xs"><a href="/">{{ Auth::user()->name }}</a></li>
                    <li class="dropdown hidden-xs">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/auth/logout">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>

    <nav class="navbar navbar-default navbar-fixed-top"  style="margin-top: 50px; background-color: #FFF; z-index: 900;">
        <div class="container">
            <div class="navbar-header">
                <div class="col-sm-2 col-md-2 col-lg-2 hidden-xs">
                    <a class="navbar-brand" href="/">
                        <span class="hidden-xs">Personal</span>
                        <span  class="hidden-sm hidden-md hidden-lg">ISAAC KINYANJUI KIRAI</span></a>
                </div>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav tp-icon">
                    <li><a href="/accounts/46/services"><strong>Make Application</strong></a></li>
                    <li><a href="/businesses">Businesses</a></li>
                    <li>
                        <a href="/accounts/46/collaterals">Collateral Registry(MPSR)</a>
                    </li>
                    <li><a href="/accounts/46/applications">Application History</a></li>

                </ul>

            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>
    <!-- End Header -->
</header>

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



                <div class="alert alert_sucess_custom" role="alert">
                    <i class="fa fa-check fa-lg" aria-hidden="true"></i>
                    <strong>Notice!</strong> Our system has been facing some challenges due to some maintenance that is currently being undertaken
                    that is causing some delays in processing applications. Please accept our apologies for any inconvenience caused, we are making every effort to restore our services.
                </div>




                <!-- pannel -->
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <div class="pull-right" role="">

                            <a href="#" class="btn btn-sm btn-info">
                                <span class="fa fa-tasks"></span> Tasks
                            </a>
                            <a href="#" class="btn btn-sm btn-info">
                                <span class="fa fa-list"></span> Applications
                            </a>
                            <a href="#" class="btn btn-sm btn-info">
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

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel with-nav-tabs panel-default">
                                    <div class="panel-heading p-t-10">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#tab1default" data-toggle="tab">Queued <span class="label label-default"> 3000</span></a></li>
                                            <li><a href="#tab2default" data-toggle="tab">My Task <span class="label label-default"> 3000</span></a></li>
                                            <li><a href="#tab3default" data-toggle="tab">Awaiting Corrections <span class="label label-default"> 200</span></a></li>
                                            <li><a href="#tab2default" data-toggle="tab">Proccessing <span class="label label-default"> 5600</span></a></li>
                                            <li><a href="#tab2default" data-toggle="tab">completed <span class="label label-default"> 3000</span></a></li>

                                        </ul>
                                    </div>
                                    <div class="panel-body padding-0">
                                        <div class="tab-content">
                                            <div class="tab-pane fade in active" id="tab1default">

                                                <div class="panel-body">
                                                    <div class="panel panel-default m-b-0">





                                                        <div class="panel-body b-b-1">
                                                            <form class="col-sm-6" accept-charset="UTF-8" action="" method="get"><input name="_utf8" type="hidden" value="✓">
                                                                <div class="input-group " id="adv-search">
                                                                    <input type="hidden" name="application_id" value=''>
                                                                    <input id="search_type" name="search[type]" type="hidden">            <input class="form-control" id="search_q" name="search[q]" placeholder="Search Business Name or Registration No." type="text" value="">
                                                                    <div class="input-group-btn">
                                                                        <div class="btn-group" role="group">
                                                                            <div class="dropdown dropdown-lg full_width"></div>
                                                                            <button type="submit" name="submit" class="btn btn5 btn-primary"><span class="search_btn_txt"> <span class="fa fa-search"></span> Search</span></button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </form>
                                                            <a href="#" class="btn btn-sm btn-success pull-right">
                                                                <span class="fa fa-tasks"></span> Pick Task
                                                            </a>

                                                        </div>



                                                        <div class="panel-body padding-0">
                                                            <table class="table table-hover table-special table-striped">
                                                                <thead>
                                                                <tr>
                                                                    <th>Service</th>
                                                                    <th class="hidden-xs hidden-sm">Ref no.</th>

                                                                    <th class="hidden-xs">Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr class=' '>
                                                                    <td class="big-data width-40">
                                                                        <h1>Single Entry Visa</h1>
                                                                        <p>20 Feb 2017 09:39 am</p>
                                                                        <small class="hidden-md hidden-lg">NS-NLDHMX</small>
                                                                    </td>
                                                                    <td class="hidden-xs hidden-sm">NS-NLDHMX</td>


                                                                    <td>

                                                                        <a href="#" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                                                                            <span class="fa fa-eye"></span> View
                                                                        </a>

                                                                    </td>
                                                                </tr>

                                                                <tr class=' '>
                                                                    <td class="big-data width-40">
                                                                        <h1>Mulptiple Entry Visa</h1>
                                                                        <p>20 Feb 2017 09:39 am</p>
                                                                        <small class="hidden-md hidden-lg">NS-NLDHMX</small>
                                                                    </td>
                                                                    <td class="hidden-xs hidden-sm">NS-NLDHMX</td>


                                                                    <td>

                                                                        <a href="#" class="btn btn-xs btn-primary">
                                                                            <span class="fa fa-eye"></span> View
                                                                        </a>

                                                                    </td>
                                                                </tr>


                                                                <tr class=' '>
                                                                    <td class="big-data width-40">
                                                                        <h1>Diplomatic Visa</h1>
                                                                        <p>20 Feb 2017 09:39 am</p>
                                                                        <small class="hidden-md hidden-lg">NS-NLDHMX</small>
                                                                    </td>
                                                                    <td class="hidden-xs hidden-sm">NS-NLDHMX</td>


                                                                    <td>

                                                                        <a href="#" class="btn btn-xs btn-primary">
                                                                            <span class="fa fa-eye"></span> View
                                                                        </a>

                                                                    </td>
                                                                </tr>


                                                                <tr class=' '>
                                                                    <td class="big-data width-40">
                                                                        <h1>Transit Visa</h1>
                                                                        <p>20 Feb 2017 09:39 am</p>
                                                                        <small class="hidden-md hidden-lg">NS-NLDHMX</small>
                                                                    </td>
                                                                    <td class="hidden-xs hidden-sm">NS-NLDHMX</td>


                                                                    <td>

                                                                        <a href="#" class="btn btn-xs btn-primary">
                                                                            <span class="fa fa-eye"></span> View
                                                                        </a>

                                                                    </td>
                                                                </tr>



                                                                <tr class=' '>
                                                                    <td class="big-data width-40">
                                                                        <h1>Courtesy Visa</h1>
                                                                        <p>20 Feb 2017 09:39 am</p>
                                                                        <small class="hidden-md hidden-lg">NS-NLDHMX</small>
                                                                    </td>
                                                                    <td class="hidden-xs hidden-sm">NS-NLDHMX</td>


                                                                    <td>

                                                                        <a href="#" class="btn btn-xs btn-primary">
                                                                            <span class="fa fa-eye"></span> View
                                                                        </a>

                                                                    </td>
                                                                </tr>

                                                                <tr class=' '>
                                                                    <td class="big-data width-40">
                                                                        <h1>Single Entry Visa</h1>
                                                                        <p>20 Feb 2017 09:39 am</p>
                                                                        <small class="hidden-md hidden-lg">NS-NLDHMX</small>
                                                                    </td>
                                                                    <td class="hidden-xs hidden-sm">NS-NLDHMX</td>


                                                                    <td>

                                                                        <a href="#" class="btn btn-xs btn-primary">
                                                                            <span class="fa fa-eye"></span> View
                                                                        </a>

                                                                    </td>
                                                                </tr>

                                                                <tr class=' '>
                                                                    <td class="big-data width-40">
                                                                        <h1>Mulptiple Entry Visa</h1>
                                                                        <p>20 Feb 2017 09:39 am</p>
                                                                        <small class="hidden-md hidden-lg">NS-NLDHMX</small>
                                                                    </td>
                                                                    <td class="hidden-xs hidden-sm">NS-NLDHMX</td>


                                                                    <td>

                                                                        <a href="#" class="btn btn-xs btn-primary">
                                                                            <span class="fa fa-eye"></span> View
                                                                        </a>

                                                                    </td>
                                                                </tr>


                                                                <tr class=' '>
                                                                    <td class="big-data width-40">
                                                                        <h1>Diplomatic Visa</h1>
                                                                        <p>20 Feb 2017 09:39 am</p>
                                                                        <small class="hidden-md hidden-lg">NS-NLDHMX</small>
                                                                    </td>
                                                                    <td class="hidden-xs hidden-sm">NS-NLDHMX</td>


                                                                    <td>

                                                                        <a href="#" class="btn btn-xs btn-primary">
                                                                            <span class="fa fa-eye"></span> View
                                                                        </a>

                                                                    </td>
                                                                </tr>


                                                                <tr class=' '>
                                                                    <td class="big-data width-40">
                                                                        <h1>Transit Visa</h1>
                                                                        <p>20 Feb 2017 09:39 am</p>
                                                                        <small class="hidden-md hidden-lg">NS-NLDHMX</small>
                                                                    </td>
                                                                    <td class="hidden-xs hidden-sm">NS-NLDHMX</td>


                                                                    <td>

                                                                        <a href="#" class="btn btn-xs btn-primary">
                                                                            <span class="fa fa-eye"></span> View
                                                                        </a>

                                                                    </td>
                                                                </tr>



                                                                <tr class=' '>
                                                                    <td class="big-data width-40">
                                                                        <h1>Courtesy Visa</h1>
                                                                        <p>20 Feb 2017 09:39 am</p>
                                                                        <small class="hidden-md hidden-lg">NS-NLDHMX</small>
                                                                    </td>
                                                                    <td class="hidden-xs hidden-sm">NS-NLDHMX</td>


                                                                    <td>

                                                                        <a href="#" class="btn btn-xs btn-primary">
                                                                            <span class="fa fa-eye"></span> View
                                                                        </a>

                                                                    </td>
                                                                </tr>
                                                                <tr class=' '>
                                                                    <td class="big-data width-40">
                                                                        <h1>Single Entry Visa</h1>
                                                                        <p>20 Feb 2017 09:39 am</p>
                                                                        <small class="hidden-md hidden-lg">NS-NLDHMX</small>
                                                                    </td>
                                                                    <td class="hidden-xs hidden-sm">NS-NLDHMX</td>


                                                                    <td>

                                                                        <a href="#" class="btn btn-xs btn-primary">
                                                                            <span class="fa fa-eye"></span> View
                                                                        </a>

                                                                    </td>
                                                                </tr>

                                                                <tr class=' '>
                                                                    <td class="big-data width-40">
                                                                        <h1>Mulptiple Entry Visa</h1>
                                                                        <p>20 Feb 2017 09:39 am</p>
                                                                        <small class="hidden-md hidden-lg">NS-NLDHMX</small>
                                                                    </td>
                                                                    <td class="hidden-xs hidden-sm">NS-NLDHMX</td>


                                                                    <td>

                                                                        <a href="#" class="btn btn-xs btn-primary">
                                                                            <span class="fa fa-eye"></span> View
                                                                        </a>

                                                                    </td>
                                                                </tr>





                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>






                                                <div class="panel-footer">


                                                    <div class="page-nation">
                                                        <ul class="pagination pagination-large">
                                                            <li class="disabled"><span>«</span></li>
                                                            <li class="active"><span>1</span></li>
                                                            <li><a href="#">2</a></li>
                                                            <li><a href="#">3</a></li>
                                                            <li><a href="#">4</a></li>
                                                            <li><a href="#">6</a></li>
                                                            <li><a href="#">7</a></li>
                                                            <li><a href="#">8</a></li>
                                                            <li><a href="#">9</a></li>
                                                            <li class="disabled"><span>...</span></li><li>
                                                            <li><a rel="next" href="#">Next</a></li>

                                                        </ul>
                                                    </div>

                                                </div>







                                            </div>



                                            <div class="tab-pane fade" id="tab2default">




                                                <div class="panel-body">
                                                    <div class="panel panel-default m-b-0">





                                                        <div class="panel-body b-b-1">
                                                            <form class="col-sm-6" accept-charset="UTF-8" action="" method="get"><input name="_utf8" type="hidden" value="✓">
                                                                <div class="input-group " id="adv-search">
                                                                    <input type="hidden" name="application_id" value=''>
                                                                    <input id="search_type" name="search[type]" type="hidden">            <input class="form-control" id="search_q" name="search[q]" placeholder="Search Business Name or Registration No." type="text" value="">
                                                                    <div class="input-group-btn">
                                                                        <div class="btn-group" role="group">
                                                                            <div class="dropdown dropdown-lg full_width"></div>
                                                                            <button type="submit" name="submit" class="btn btn5 btn-primary"><span class="search_btn_txt"> <span class="fa fa-search"></span> Search</span></button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </form>
                                                            <a href="#" class="btn btn-sm btn-success pull-right">
                                                                <span class="fa fa-tasks"></span> Pick Task
                                                            </a>

                                                        </div>



                                                        <div class="panel-body padding-0">
                                                            <table class="table table-hover table-special table-striped">
                                                                <thead>
                                                                <tr>
                                                                    <th>Service</th>
                                                                    <th class="hidden-xs hidden-sm">Ref no.</th>

                                                                    <th class="hidden-xs">Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr class=' '>
                                                                    <td class="big-data width-40">
                                                                        <h1>Single Entry Visa</h1>
                                                                        <p>20 Feb 2017 09:39 am</p>
                                                                        <small class="hidden-md hidden-lg">NS-NLDHMX</small>
                                                                    </td>
                                                                    <td class="hidden-xs hidden-sm">NS-NLDHMX</td>


                                                                    <td>

                                                                        <a href="#" class="btn btn-xs btn-primary">
                                                                            <span class="fa fa-eye"></span> View
                                                                        </a>

                                                                    </td>
                                                                </tr>

                                                                <tr class=' '>
                                                                    <td class="big-data width-40">
                                                                        <h1>Mulptiple Entry Visa</h1>
                                                                        <p>20 Feb 2017 09:39 am</p>
                                                                        <small class="hidden-md hidden-lg">NS-NLDHMX</small>
                                                                    </td>
                                                                    <td class="hidden-xs hidden-sm">NS-NLDHMX</td>


                                                                    <td>

                                                                        <a href="#" class="btn btn-xs btn-primary">
                                                                            <span class="fa fa-eye"></span> View
                                                                        </a>

                                                                    </td>
                                                                </tr>


                                                                <tr class=' '>
                                                                    <td class="big-data width-40">
                                                                        <h1>Diplomatic Visa</h1>
                                                                        <p>20 Feb 2017 09:39 am</p>
                                                                        <small class="hidden-md hidden-lg">NS-NLDHMX</small>
                                                                    </td>
                                                                    <td class="hidden-xs hidden-sm">NS-NLDHMX</td>


                                                                    <td>

                                                                        <a href="#" class="btn btn-xs btn-primary">
                                                                            <span class="fa fa-eye"></span> View
                                                                        </a>

                                                                    </td>
                                                                </tr>


                                                                <tr class=' '>
                                                                    <td class="big-data width-40">
                                                                        <h1>Transit Visa</h1>
                                                                        <p>20 Feb 2017 09:39 am</p>
                                                                        <small class="hidden-md hidden-lg">NS-NLDHMX</small>
                                                                    </td>
                                                                    <td class="hidden-xs hidden-sm">NS-NLDHMX</td>


                                                                    <td>

                                                                        <a href="#" class="btn btn-xs btn-primary">
                                                                            <span class="fa fa-eye"></span> View
                                                                        </a>

                                                                    </td>
                                                                </tr>



                                                                <tr class=' '>
                                                                    <td class="big-data width-40">
                                                                        <h1>Courtesy Visa</h1>
                                                                        <p>20 Feb 2017 09:39 am</p>
                                                                        <small class="hidden-md hidden-lg">NS-NLDHMX</small>
                                                                    </td>
                                                                    <td class="hidden-xs hidden-sm">NS-NLDHMX</td>


                                                                    <td>

                                                                        <a href="#" class="btn btn-xs btn-primary">
                                                                            <span class="fa fa-eye"></span> View
                                                                        </a>

                                                                    </td>
                                                                </tr>

                                                                <tr class=' '>
                                                                    <td class="big-data width-40">
                                                                        <h1>Single Entry Visa</h1>
                                                                        <p>20 Feb 2017 09:39 am</p>
                                                                        <small class="hidden-md hidden-lg">NS-NLDHMX</small>
                                                                    </td>
                                                                    <td class="hidden-xs hidden-sm">NS-NLDHMX</td>


                                                                    <td>

                                                                        <a href="#" class="btn btn-xs btn-primary">
                                                                            <span class="fa fa-eye"></span> View
                                                                        </a>

                                                                    </td>
                                                                </tr>

                                                                <tr class=' '>
                                                                    <td class="big-data width-40">
                                                                        <h1>Mulptiple Entry Visa</h1>
                                                                        <p>20 Feb 2017 09:39 am</p>
                                                                        <small class="hidden-md hidden-lg">NS-NLDHMX</small>
                                                                    </td>
                                                                    <td class="hidden-xs hidden-sm">NS-NLDHMX</td>


                                                                    <td>

                                                                        <a href="#" class="btn btn-xs btn-primary">
                                                                            <span class="fa fa-eye"></span> View
                                                                        </a>

                                                                    </td>
                                                                </tr>


                                                                <tr class=' '>
                                                                    <td class="big-data width-40">
                                                                        <h1>Diplomatic Visa</h1>
                                                                        <p>20 Feb 2017 09:39 am</p>
                                                                        <small class="hidden-md hidden-lg">NS-NLDHMX</small>
                                                                    </td>
                                                                    <td class="hidden-xs hidden-sm">NS-NLDHMX</td>


                                                                    <td>

                                                                        <a href="#" class="btn btn-xs btn-primary">
                                                                            <span class="fa fa-eye"></span> View
                                                                        </a>

                                                                    </td>
                                                                </tr>


                                                                <tr class=' '>
                                                                    <td class="big-data width-40">
                                                                        <h1>Transit Visa</h1>
                                                                        <p>20 Feb 2017 09:39 am</p>
                                                                        <small class="hidden-md hidden-lg">NS-NLDHMX</small>
                                                                    </td>
                                                                    <td class="hidden-xs hidden-sm">NS-NLDHMX</td>


                                                                    <td>

                                                                        <a href="#" class="btn btn-xs btn-primary">
                                                                            <span class="fa fa-eye"></span> View
                                                                        </a>

                                                                    </td>
                                                                </tr>



                                                                <tr class=' '>
                                                                    <td class="big-data width-40">
                                                                        <h1>Courtesy Visa</h1>
                                                                        <p>20 Feb 2017 09:39 am</p>
                                                                        <small class="hidden-md hidden-lg">NS-NLDHMX</small>
                                                                    </td>
                                                                    <td class="hidden-xs hidden-sm">NS-NLDHMX</td>


                                                                    <td>

                                                                        <a href="#" class="btn btn-xs btn-primary">
                                                                            <span class="fa fa-eye"></span> View
                                                                        </a>

                                                                    </td>
                                                                </tr>
                                                                <tr class=' '>
                                                                    <td class="big-data width-40">
                                                                        <h1>Single Entry Visa</h1>
                                                                        <p>20 Feb 2017 09:39 am</p>
                                                                        <small class="hidden-md hidden-lg">NS-NLDHMX</small>
                                                                    </td>
                                                                    <td class="hidden-xs hidden-sm">NS-NLDHMX</td>


                                                                    <td>

                                                                        <a href="#" class="btn btn-xs btn-primary">
                                                                            <span class="fa fa-eye"></span> View
                                                                        </a>

                                                                    </td>
                                                                </tr>

                                                                <tr class=' '>
                                                                    <td class="big-data width-40">
                                                                        <h1>Mulptiple Entry Visa</h1>
                                                                        <p>20 Feb 2017 09:39 am</p>
                                                                        <small class="hidden-md hidden-lg">NS-NLDHMX</small>
                                                                    </td>
                                                                    <td class="hidden-xs hidden-sm">NS-NLDHMX</td>


                                                                    <td>

                                                                        <a href="#" class="btn btn-xs btn-primary">
                                                                            <span class="fa fa-eye"></span> View
                                                                        </a>

                                                                    </td>
                                                                </tr>





                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>






                                                <div class="panel-footer">


                                                    <div class="page-nation">
                                                        <ul class="pagination pagination-large">
                                                            <li class="disabled"><span>«</span></li>
                                                            <li class="active"><span>1</span></li>
                                                            <li><a href="#">2</a></li>
                                                            <li><a href="#">3</a></li>
                                                            <li><a href="#">4</a></li>
                                                            <li><a href="#">6</a></li>
                                                            <li><a href="#">7</a></li>
                                                            <li><a href="#">8</a></li>
                                                            <li><a href="#">9</a></li>
                                                            <li class="disabled"><span>...</span></li><li>
                                                            <li><a rel="next" href="#">Next</a></li>

                                                        </ul>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>





                </div>


                <!--   end pannel -->

            </div>






        </div>

        <!-- Modal -->
        <div class="modal fade modal-wide" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">Visa Application Form </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">


                        <div class="row">

                            <div class="col-md-12">

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9"></div>

                                </div>


                            </div>

                        </div>


                        <div class="row">

                            <div class="col-md-12">


                                <!-- pannel -->
                                <div class="panel panel-default">



                                    <div class="panel-body">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel with-nav-tabs panel-default">
                                                    <div class="panel-heading p-t-10">
                                                        <ul class="nav nav-tabs">
                                                            <li class="active"><a href="#tab1default" data-toggle="tab">Visitors Details</a></li>
                                                            <li><a href="#tab2default" data-toggle="tab">Nationality and residence</a></li>
                                                            <li><a href="#tab3default" data-toggle="tab">Passport / Travel document Info</a></li>
                                                            <li><a href="#tab2default" data-toggle="tab">Reasons and date of travel</a></li>
                                                            <li><a href="#tab2default" data-toggle="tab">Travel history</a></li>

                                                        </ul>
                                                    </div>
                                                    <div class="panel-body padding-0">
                                                        <div class="tab-content">
                                                            <div class="tab-pane fade in active" id="tab1default">

                                                                <div class="panel-body">
                                                                    <div class="panel panel-default m-b-0">




                                                                        <div class="panel-body padding-0">
                                                                            <table class="table table-hover table-special table-striped">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Question</th>
                                                                                    <th class="hidden-xs hidden-sm">answer</th>

                                                                                    <th class="hidden-xs">Action</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <tr class=' '>
                                                                                    <td class="big-data width-40">
                                                                                        <h1>Where are you making this application from?</h1>

                                                                                    </td>
                                                                                    <td class="hidden-xs hidden-sm">  Afghanistan</td>
                                                                                    <td>
                                                                                        <a href="#" class="btn btn-xs btn-primary">
                                                                                            <span class="fa fa-eye"></span> View
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>

                                                                                <tr class=' '>
                                                                                    <td class="big-data width-40">
                                                                                        <h1>Are you applying for yourself or for your Child?</h1>

                                                                                    </td>
                                                                                    <td class="hidden-xs hidden-sm">  Afghanistan</td>
                                                                                    <td>
                                                                                        <a href="#" class="btn btn-xs btn-primary">
                                                                                            <span class="fa fa-eye"></span> View
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>


                                                                                <tr class=' '>
                                                                                    <td class="big-data width-40">
                                                                                        <h1>Surname / Family Name</h1>

                                                                                    </td>
                                                                                    <td class="hidden-xs hidden-sm">  Afghanistan</td>
                                                                                    <td>
                                                                                        <a href="#" class="btn btn-xs btn-primary">
                                                                                            <span class="fa fa-eye"></span> View
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>



                                                                                <tr class=' '>
                                                                                    <td class="big-data width-40">
                                                                                        <h1>Other Names in Full</h1>

                                                                                    </td>
                                                                                    <td class="hidden-xs hidden-sm">  Afghanistan</td>
                                                                                    <td>
                                                                                        <a href="#" class="btn btn-xs btn-primary">
                                                                                            <span class="fa fa-eye"></span> View
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>

                                                                                <tr class=' '>
                                                                                    <td class="big-data width-40">
                                                                                        <h1>Gender</h1>

                                                                                    </td>
                                                                                    <td class="hidden-xs hidden-sm">  Afghanistan</td>
                                                                                    <td>
                                                                                        <a href="#" class="btn btn-xs btn-primary">
                                                                                            <span class="fa fa-eye"></span> View
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>

                                                                                <tr class=' '>
                                                                                    <td class="big-data width-40">
                                                                                        <h1>Date of Birth</h1>

                                                                                    </td>
                                                                                    <td class="hidden-xs hidden-sm">  Afghanistan</td>
                                                                                    <td>
                                                                                        <a href="#" class="btn btn-xs btn-primary">
                                                                                            <span class="fa fa-eye"></span> View
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>


                                                                                <tr class=' '>
                                                                                    <td class="big-data width-40">
                                                                                        <h1>Current occupation</h1>

                                                                                    </td>
                                                                                    <td class="hidden-xs hidden-sm">  Afghanistan</td>
                                                                                    <td>
                                                                                        <a href="#" class="btn btn-xs btn-primary">
                                                                                            <span class="fa fa-eye"></span> View
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>



                                                                                <tr class=' '>
                                                                                    <td class="big-data width-40">
                                                                                        <h1>Fathers Name</h1>

                                                                                    </td>
                                                                                    <td class="hidden-xs hidden-sm">  Afghanistan</td>
                                                                                    <td>
                                                                                        <a href="#" class="btn btn-xs btn-primary">
                                                                                            <span class="fa fa-eye"></span> View
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>






                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>





                                                            </div>



                                                            <div class="tab-pane fade" id="tab2default">

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>





                                </div>


                                <!--   end pannel -->



                            </div>

                        </div>



                    </div>

                </div>
            </div>
        </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/js/vendor.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
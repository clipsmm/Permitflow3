@extends('layouts.app')

@section('content')
    <div class="container">
        @include('layouts.partials.sidebarnav')

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



    </div>



@endsection
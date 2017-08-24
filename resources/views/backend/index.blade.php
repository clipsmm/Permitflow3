@extends('layouts.app')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading p-t-10">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1default" data-toggle="tab">Queued<span class="label label-default"> 300000</span></a></li>
                        <li><a href="#tab2default" data-toggle="tab">My Task <span class="label label-default"> 3000</span></a></li>
                        <li><a href="#tab3default" data-toggle="tab">Awaiting Corrections <span class="label label-default"> 200</span></a></li>
                        <li><a href="#tab2default" data-toggle="tab">Proccessing <span class="label label-default"> 5600</span></a></li>
                        <li><a href="#tab2default" data-toggle="tab">completed <span class="label label-default"> 3000</span></a></li>

            </ul>
                </div >
                    <div class="panel-body padding-0">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab1default">

                            <div class="panel-body">
                                <div class="panel panel-default m-b-0">


                                    <div class="panel-body b-b-1">
                                        <form class="col-sm-6" accept-charset="UTF-8" action="" method="get"><input name="_utf8" type="hidden" value="✓">
                                            <div class="input-group " id="adv-search">
                                                <input type="hidden" name="application_id" value=''>
                                                <input id="search_type" name="search[type]" type="hidden">            <input class="form-control" id="search_q" name="search[q]" placeholder="Enter Ref No." type="text" value="">
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
                                                <input id="search_type" name="search[type]" type="hidden">            <input class="form-control" id="search_q" name="search[q]" placeholder="Enter Ref No." type="text" value="">
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

@endsection
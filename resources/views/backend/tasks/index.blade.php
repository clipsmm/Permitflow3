@extends('layouts.backend')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading p-t-10">
                    <ul class="nav nav-tabs">
                        <li class="{{ menu_current_route('backend.tasks.queue') }}"><a href="{{ route('backend.tasks.queue', [$module->slug]) }}" >Queued <span class="label label-default"> 3000</span></a></li>
                        <li class="{{ menu_current_route('backend.tasks.inbox') }}"><a href="{{ route('backend.tasks.inbox', [$module->slug]) }}" >My Task <span class="label label-default"> 3000</span></a></li>
                        <li class="{{ menu_current_route('backend.tasks.corrections') }}"><a href="{{ route('backend.tasks.corrections', [$module->slug]) }}" >Awaiting Corrections <span class="label label-default"> 200</span></a></li>
                        <li class="{{ menu_current_route('backend.tasks.outbox') }}"><a href="{{ route('backend.tasks.outbox', [$module->slug]) }}" >completed <span class="label label-default"> 3000</span></a></li>

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
                                            @forelse($tasks as $task)
                                                <tr class=' '>
                                                    <td class="big-data width-40">
                                                        <h1>{{ $task->name }}</h1>
                                                        <p>{{ $task->submitted_at }}</p>
                                                        <small class="hidden-md hidden-lg">{{ $task->application->application_number }}</small>
                                                    </td>
                                                    <td class="hidden-xs hidden-sm">{{ $task->application->application_number }}</td>


                                                    <td>

                                                        <a href="{{ route('backend.tasks.show',[$module->slug, $task->id]) }}" class="btn btn-xs btn-primary" >
                                                            <span class="fa fa-eye"></span> View
                                                        </a>

                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3">No tasks available</td>
                                                </tr>
                                            @endforelse

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>






                            <div class="panel-footer">
                                {!! $tasks->render() !!}
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

@push('modals')
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

                            <!-- panel -->

                            <div class="panel panel-default panel-form m-r-10 m-l-10">
                                <div class="panel-heading clearfix">
                                    <div class="pull-right" role="">

                                        <a href="#" class="btn btn-sm btn-success">
                                            <span class="fa fa-check"></span> Approve
                                        </a>
                                        <a href="#" class="btn btn-sm btn-warning">
                                            <span class="fa fa-exclamation-triangle"></span> Send for correction
                                        </a>
                                        <a href="#" class="btn btn-sm btn-info">
                                            <span class="fa fa-tasks"></span> Asign Task
                                        </a>








                                    </div>
                                    <h3 class="panel-title"></h3>
                                    <!--   <small> Application tasks</small> -->
                                </div>

                                <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">


                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <div class="thumbnail m-t-0 m-b-5 m-l-5 m-r-0">
                                            <img class="img-responsive hidden-xs" src="images/profile.jpg">
                                        </div>

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">

                                        <div class="panel m-b-0">

                                            <div class="panel-body p-t-0 p-l-5 p-r-5 p-b-0">
                                                <table class="table table-hover table-special table-striped">

                                                    <tbody>
                                                    <tr class=' '>
                                                        <td class="big-data width-40">
                                                            <h1>Ref:</h1>

                                                        </td>
                                                        <td class="hidden-xs hidden-sm">AA00AA001</td>
                                                    </tr>

                                                    <tr class=' '>
                                                        <td class="big-data width-40">
                                                            <h1>Submited by:</h1>

                                                        </td>
                                                        <td class="hidden-xs hidden-sm">John Doe</td>
                                                    </tr>

                                                    <tr class=' '>
                                                        <td class="big-data width-40">
                                                            <h1>Date of Submission:</h1>

                                                        </td>
                                                        <td class="hidden-xs hidden-sm">15 May 2016</td>
                                                    </tr>




                                                    <tr class=' '>
                                                        <td class="big-data width-40">
                                                            <h1>Days in progress::</h1>

                                                        </td>

                                                        <td>
                                                            <a href="#" class="btn btn-xs btn-default">
                                                                23 Days
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr class=' '>
                                                        <td class="big-data width-40">
                                                            <h1>Approval:</h1>

                                                        </td>

                                                        <td>
                                                            <a href="#" class="btn btn-xs btn-primary">
                                                                <span class="fa fa-callender"></span> Pending
                                                            </a>
                                                        </td>
                                                    </tr>








                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>


                                    </div>




                                </div>

                            </div>

                            <!-- panel -->

                        </div>

                    </div>




                </div>

            </div>
        </div>
    </div>
@endpush
@extends('layouts.backend')

@section('body')
    <div class="panel panel-default">
        <div class="panel-body">
            <h3>BACKEND LANDING PAGE</h3>
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


                    <div class="row">

                        <div class="col-md-12">


                            <!-- pannel -->
                            <div class="panel">



                                <div class="panel-body">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel with-nav-tabs panel-default m-b-0">
                                                <div class="panel-heading p-t-10">
                                                    <ul class="nav nav-tabs">
                                                        <li class="active"><a href="#tab11default" data-toggle="tab">Single Entry Visa</a></li>
                                                        <li><a href="#tab22default" data-toggle="tab">Traveler Information</a></li>
                                                        <li><a href="#tab33default" data-toggle="tab">Nationality and Residence</a></li>
                                                        <li><a href="#tab44default" data-toggle="tab">Passport / Travel Document Info</a></li>
                                                        <li><a href="#tab55default" data-toggle="tab">Travel Information</a></li>
                                                        <li><a href="#tab66default" data-toggle="tab">Travel history</a></li>
                                                        <li><a href="#tab77default" data-toggle="tab">Supporting Documents</a></li>

                                                    </ul>
                                                </div>
                                                <div class="panel-body padding-0">
                                                    <div class="tab-content">


                                                        <!-- tab -->

                                                        <div class="tab-pane fade in active" id="tab11default">
                                                            <div class="panel panel-form m-r-10 m-l-10 m-t-0 m-b-0">


                                                                <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">


                                                                    <form>

                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type">Where are you making this application from?</label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder="Afghanistan" value="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                                                            <div class="form-group ">
                                                                                <label class="pull-left" for="name_search_name">Are you applying for yourself or for your Child</label>
                                                                                <input @input="nameToUpper" class="form-control text-black required" id="name_search_name" maxlength="160" name="name_search[name]" placeholder="Self" required="true" type="text" v-model="name" value="">
                                                                            </div>
                                                                        </div>


                                                                    </form>


                                                                </div>

                                                            </div>


                                                        </div>

                                                        <!-- tab1 -->


                                                        <!-- tab1 -->

                                                        <div class="tab-pane fade" id="tab22default">


                                                            <div class="panel panel-form m-r-10 m-l-10 m-t-0 m-b-0">

                                                                <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">


                                                                    <form>
                                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type"> Surname / Family Name</label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder="Kirai" value="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type">Other Names in Full</label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder="Isaac Kinyanjui" value="">
                                                                            </div>
                                                                        </div>


                                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type">Gender </label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder="Male" value="">
                                                                            </div>
                                                                        </div>


                                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type">Date of Birth</label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder="12/7/1980" value="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type">Place of Birth</label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder="Nairobi" value="">
                                                                            </div>
                                                                        </div>


                                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type">Country of Birth</label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder="Kenya" value="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type">Current occupation</label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder="Farmer" value="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type">Fathers Name</label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder="James Doe" value="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type">Mothers Name</label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder="Lucy Doe" value="">
                                                                            </div>
                                                                        </div>


                                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type">Spouse Name</label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder="Great Lucy" value="">
                                                                            </div>
                                                                        </div>

                                                                    </form>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <!-- tab1 -->

                                                        <!-- tab -->
                                                        <div class="tab-pane fade" id="tab33default">

                                                            <div class="panel panel-form m-r-10 m-l-10 m-t-0 m-b-0">

                                                                <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">

                                                                    <form>


                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type">Current Nationality</label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder="Kenyan" value="">
                                                                            </div>
                                                                        </div>


                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type">Country of Residence</label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder="Kenya" value="">
                                                                            </div>
                                                                        </div>


                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type">Physical address in the Country of Residence</label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder="Moi Avenue" value="">
                                                                            </div>
                                                                        </div>


                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type">Phone Number</label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder="+254 725716411" value="">
                                                                            </div>
                                                                        </div>


                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type">City / Town</label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder="Nairobi" value="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type">Email</label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder="doe@gmail.com" value="">
                                                                            </div>
                                                                        </div>

                                                                    </form>


                                                                </div>

                                                            </div>


                                                        </div>

                                                        <!-- tab1 -->

                                                        <!-- tab -->
                                                        <div class="tab-pane fade" id="tab44default">

                                                            <div class="panel panel-form m-r-10 m-l-10 m-t-0 m-b-0">

                                                                <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">

                                                                    <form>



                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type">Passport Number </label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder="25272520" value="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type">Place of issue</label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder="Nairobi" value="">
                                                                            </div>
                                                                        </div>


                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type">Date of Issue</label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder="12/12/1990" value="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type">Expiry date</label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder="12/12/1990" value="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type">Issued by</label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder="John Doe" value="">
                                                                            </div>
                                                                        </div>


                                                                    </form>

                                                                </div>

                                                            </div>


                                                        </div>

                                                        <!-- tab1 -->



                                                        <!-- tab -->
                                                        <div class="tab-pane fade" id="tab55default">

                                                            <div class="panel panel-form m-r-10 m-l-10 m-t-0 m-b-0">

                                                                <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">

                                                                    <form>

                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type">   Reason For Travel </label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder="Business" value="">
                                                                            </div>
                                                                        </div>


                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type">Proposed Date of Entry</label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder="12/12/2017" value="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type">Proposed Date of Departure from Kenya</label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder="12/12/2017" value="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type">Full names and Physical address of Hotels / Places / Firms / Friends or Relatives to be visited in Kenya</label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder="John Doe Kamau" value="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type">Telephone/Cell no</label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder="+254 725716411" value="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type">Email</label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder="doe@gmail.com" value="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type">Arriving by</label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder="Air" value="">
                                                                            </div>
                                                                        </div>


                                                                    </form>

                                                                </div>

                                                            </div>


                                                        </div>

                                                        <!-- tab1 -->

                                                        <!-- tab -->
                                                        <div class="tab-pane fade" id="tab66default">

                                                            <div class="panel panel-form m-r-10 m-l-10 m-t-0 m-b-0">

                                                                <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">



                                                                    <form>

                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type">Dates and Duration of recent visits to other countries in the last 3 months</label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder="12/11/12" value="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type">Dates and Duration of previous visits to Kenya</label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder="12/11/12" value="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type">Will you be returning to your Country of Residence/Domicile?</label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder=" Yes" value="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type">Have you been previously denied entry into Kenya? If yes state when and give reasons for denial</label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder="Yes" value="">
                                                                            </div>
                                                                        </div>


                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type">Have you been previously denied entry into another Country? If yes state when and give reasons for denial.</label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder="No" value="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                                                            <div class="form-group ">
                                                                                <label class="" for="name_search_type">Have you ever been convicted of any offence under any system of law? If yes give offense and penalty?</label>
                                                                                <input class="form-control text-black" id="" maxlength="160" name="name_search[name]" placeholder="Yes" value="">
                                                                            </div>
                                                                        </div>


                                                                    </form>


                                                                </div>

                                                            </div>


                                                        </div>

                                                        <!-- tab1 -->

                                                        <!-- tab -->
                                                        <div class="tab-pane fade" id="tab77default">

                                                            <div class="panel panel-form m-r-10 m-l-10 m-t-0 m-b-0">

                                                                <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">



                                                                    <div class="panel panel-default panel-form m-r-10 m-l-10">

                                                                        <div class="panel-heading"><span class="fa fa-id-card"></span> Scaned Passport</div>

                                                                        <div class="panel-body p-t-10 p-b-10">

                                                                            <img class="img-responsive hidden-xs" src="images/pass.jpg">


                                                                        </div>

                                                                    </div>


                                                                    <div class="panel panel-default panel-form m-r-10 m-l-10">

                                                                        <div class="panel-heading"><span class="fa fa-envelope-o"></span> Scaned Invitation Letter</div>

                                                                        <div class="panel-body p-t-10 p-b-10">

                                                                            <img class="img-responsive hidden-xs" src="images/invite.jpg">


                                                                        </div>

                                                                    </div>



                                                                    <div class="panel panel-default panel-form m-r-10 m-l-10">

                                                                        <div class="panel-heading"> <span class="fa fa-id-card"></span> Scaned Host ID card</div>

                                                                        <div class="panel-body p-t-10 p-b-10">

                                                                            <img class="img-responsive hidden-xs" src="images/id.jpg">


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

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endpush
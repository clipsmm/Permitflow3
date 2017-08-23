<div class="panel with-nav-tabs panel-default m-b-0">
    <div class="panel-heading p-t-10">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab11default" data-toggle="tab">
                    @lang('e-visa::common.single_entry_visa')</a>
            </li>
            <li><a href="#tab22default" data-toggle="tab">@lang('e-visa::common.traveler_info')</a></li>
            <li>
                <a href="#tab33default" data-toggle="tab">
                    @lang('Nationality and Residence')
                </a></li>
            <li>
                <a href="#tab44default" data-toggle="tab">
                    @lang('Passport / Travel Documents')
                    </a>
            </li>
            <li>
                <a href="#tab55default" data-toggle="tab">
                    @lang('Travel Information')
                </a>
            </li>
            <li><a href="#tab66default" data-toggle="tab">
                    @lang('Travel history')
                </a></li>
            <li>
                <a href="#tab77default" data-toggle="tab">
                    @lang('Supporting Documents')
                </a>
            </li>
        </ul>
    </div>
    <div class="panel-body padding-0">
        <div class="tab-content">
            <div class="tab-pane fade in active" id="tab11default">
                <div class="panel panel-form m-r-10 m-l-10 m-t-0 m-b-0">
                    <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th>
                                    @lang('e-visa::forms.country_of_application')
                                </th>
                                <td>
                                    {{$lookup_data['country_codes'][$model->country_of_application]}}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- tab1 -->


            <!-- tab1 -->

            <div class="tab-pane fade" id="tab22default">
                <div class="panel panel-form m-r-10 m-l-10 m-t-0 m-b-0">

                    <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">
                    </div>

                </div>

            </div>

            <!-- tab1 -->

            <!-- tab -->
            <div class="tab-pane fade" id="tab33default">

                <div class="panel panel-form m-r-10 m-l-10 m-t-0 m-b-0">

                    <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">
                    </div>

                </div>


            </div>

            <!-- tab1 -->

            <!-- tab -->
            <div class="tab-pane fade" id="tab44default">

                <div class="panel panel-form m-r-10 m-l-10 m-t-0 m-b-0">

                    <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">

                    </div>

                </div>


            </div>

            <!-- tab1 -->


            <!-- tab -->
            <div class="tab-pane fade" id="tab55default">

                <div class="panel panel-form m-r-10 m-l-10 m-t-0 m-b-0">

                    <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">

                    </div>

                </div>


            </div>

            <!-- tab1 -->

            <!-- tab -->
            <div class="tab-pane fade" id="tab66default">

                <div class="panel panel-form m-r-10 m-l-10 m-t-0 m-b-0">

                    <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">


                    </div>

                </div>


            </div>

            <!-- tab1 -->

            <!-- tab -->
            <div class="tab-pane fade" id="tab77default">

                <div class="panel panel-form m-r-10 m-l-10 m-t-0 m-b-0">

                    <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">


                        <div class="panel panel-default panel-form m-r-10 m-l-10">

                            <div class="panel-heading"><span class="fa fa-id-card"></span>
                                Scaned Passport
                            </div>

                            <div class="panel-body p-t-10 p-b-10">

                                <img class="img-responsive hidden-xs" src="images/pass.jpg">


                            </div>

                        </div>


                        <div class="panel panel-default panel-form m-r-10 m-l-10">

                            <div class="panel-heading"><span class="fa fa-envelope-o"></span>
                                Scaned Invitation Letter
                            </div>

                            <div class="panel-body p-t-10 p-b-10">

                                <img class="img-responsive hidden-xs" src="images/invite.jpg">


                            </div>

                        </div>

                        <div class="panel panel-default panel-form m-r-10 m-l-10">

                            <div class="panel-heading"><span class="fa fa-id-card"></span>
                                Scaned Host ID card
                            </div>

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
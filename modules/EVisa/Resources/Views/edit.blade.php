@extends('layouts.frontend')
@php
    if(!isset($step)){
        $step = 1;
    }
@endphp
@section('body')
    <div class="row m-t-0">
        <div class="col-md-12">


            <div class="panel panel-default panel-form m-r-10 m-l-10">

                <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="row bs-wizard m-b-20 seven-cols" style="border-bottom:0;">

                            <div class="col-md-1 bs-wizard-step complete p-l-0 p-r-0 m-r-0 m-l-0">
                                <div class="text-center bs-wizard-stepnum">Step 1</div>
                                <div class="progress"><div class="progress-bar"></div></div>
                                <a href="#" class="bs-wizard-dot"></a>

                            </div>

                            <div class="col-md-1 bs-wizard-step complete p-l-0 p-r-0 m-r-0 m-l-0"><!-- complete -->
                                <div class="text-center bs-wizard-stepnum">Step 2</div>
                                <div class="progress"><div class="progress-bar"></div></div>
                                <a href="#" class="bs-wizard-dot"></a>

                            </div>

                            <div class="col-md-1 bs-wizard-step disabled p-l-0 p-r-0 m-r-0 m-l-0"><!-- complete -->
                                <div class="text-center bs-wizard-stepnum">Step 3</div>
                                <div class="progress"><div class="progress-bar"></div></div>
                                <a href="#" class="bs-wizard-dot"></a>

                            </div>

                            <div class="col-md-1 bs-wizard-step disabled p-l-0 p-r-0 m-r-0 m-l-0"><!-- active -->
                                <div class="text-center bs-wizard-stepnum">Step 4</div>
                                <div class="progress"><div class="progress-bar"></div></div>
                                <a href="#" class="bs-wizard-dot"></a>

                            </div>


                            <div class="col-md-1 bs-wizard-step disabled p-l-0 p-r-0 m-r-0 m-l-0"><!-- active -->
                                <div class="text-center bs-wizard-stepnum">Step 5</div>
                                <div class="progress"><div class="progress-bar"></div></div>
                                <a href="#" class="bs-wizard-dot"></a>

                            </div>


                            <div class="col-md-1 bs-wizard-step disabled p-l-0 p-r-0 m-r-0 m-l-0"><!-- active -->
                                <div class="text-center bs-wizard-stepnum">Step 6</div>
                                <div class="progress"><div class="progress-bar"></div></div>
                                <a href="#" class="bs-wizard-dot"></a>

                            </div>


                            <div class="col-md-1 bs-wizard-step disabled p-l-0 p-r-0 m-r-0 m-l-0"><!-- active -->
                                <div class="text-center bs-wizard-stepnum">Step 7</div>
                                <div class="progress"><div class="progress-bar"></div></div>
                                <a href="#" class="bs-wizard-dot"></a>

                            </div>



                        </div>

                    {!! Form::model($model, ['files' => true, 'url' => route('e-visa.application.update', ['application' => $application, 'step' => $step])]) !!}

        <div class="panel-heading">
            @lang('Edit Application')
        </div>
        <div class="panel-body">
            @include('e-visa::form_body')
        </div>
        <div class="panel-footer text-right">
            @if($step > 1)
                <a href="{{route('e-visa.application.edit', ['application' => $application, 'step' => $step - 1])}}" class="btn btn-md btn-success btn-sm">
                    <span class="fa fa-eye"></span>  @lang('Previous')
                </a>
            @endif
            <button type="submit" class="btn btn-sm btn-primary">@lang('Next')</button>
        </div>
    </div>
    {!! Form::close() !!}



    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

        <div class="panel m-b-0 m-t-0">

            <div class="panel-body p-t-0 p-l-5 p-r-5 p-b-0">


                <div class="alert alert_sucess_custom" role="alert">
                    <i class="fa fa-lg" aria-hidden="true"></i>
                    <strong>Information Note !</strong>    </br></br>
                    Please, type the date you plan to enter Turkey to the related field.</br></br>

                    The validity period of your e-Visa will begin as of the date you enter Turkey.
                    </br></br>
                    Please note that the validity period is different than the period of stay. The period of stay cannot exceed the duration stated on the left-hand side. If you wish to stay longer, you must apply to your local Police Station for a residency permit.
                    </br></br>

                    If you exceed the duration stated on the left-hand side on a single entry without having a residency permit, you may be required to pay fines, deported, or banned from future travel to Turkey for a period of time.
                    </br></br>


                    The e-Visa system does not inform you the number of days you stay in Turkey. It is your responsibility to make sure that you do not overstay your visa.

                </div>


            </div>
        </div>


    </div>
        </div>
    </div>
        </div>
    </div>
@stop

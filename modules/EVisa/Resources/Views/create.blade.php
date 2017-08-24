@extends('layouts.frontend')
@php
    if(!isset($step)){
        $step = 1;
    }
@endphp
@section('body')
    <div class="row m-t-0">

        <div class="col-md-12">

            <!-- panel -->

            <div class="panel panel-default panel-form m-r-10 m-l-10">

                <!--         <div class="panel-heading">2. Arrival Date in Kenya</div> -->


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

                            <div class="col-md-1 bs-wizard-step active p-l-0 p-r-0 m-r-0 m-l-0"><!-- complete -->
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

             {!! Form::model($model, ['files' => true, 'url' => route('e-visa.application.new', ['step' => $step])]) !!}

            <div class="panel-heading">
                @lang('e-visa::common.single_entry_visa')
            </div>
            <div class="panel-body">
                @include('e-visa::form_body')
            </div>
            <div class="panel-footer text-right">
                @if($step > 1)
                    <a href="{{route('e-visa.application.new', ['step' => $step - 1])}}" class="btn btn-primary btn-sm">
                        @lang('Previous')
                    </a>
                @endif
                <button type="submit" class="btn btn-sm btn-primary">@lang('Next')</button>
            </div>
        </div>
         {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop

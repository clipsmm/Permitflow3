@extends('layouts.backend')

@section('body')
    <div class="container">

        <div class="row">
            <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading p-t-10">
                        @include('backend.settings._backend_settings_menu')
                    </div>
                    <div class="panel-body padding-0">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab1default">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Reset Landing Page</h3>
                                    </div>
                                    <form class="form-horizontal" method="post" action="{{ route('e-visa.settings.save') }}">
                                    <div class="panel-body">

                                            {!! csrf_field() !!}
                                            <div class="form-group m-b-10">
                                                <label class="control-label col-sm-2"> @lang('labels.landing_page') </label>
                                                <div class="col-sm-5">
                                                    {!! Form::select('landing_page',['' => "System Default"] + $a_mods, settings('landing_page'), [ 'class' => 'form-control']) !!}
                                                </div>
                                            </div>

                                    </div>
                                    <div class="panel-footer clearfix">
                                        <button type="submit" class="btn btn-primary pull-right"> @lang('labels.update_settings')</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
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
                                <div class="panel panel-form m-r-10 m-l-10 m-t-0 m-b-0">
                                    <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">
                                        <form class="form-horizontal" method="post" action="{{ route('e-visa.settings.save') }}">
                                            {!! csrf_field() !!}
                                            <div class="form-group m-b-10">
                                                <label class="control-label col-sm-2"> @lang('labels.landing_page') </label>
                                                <div class="col-sm-5">
                                                    {!! Form::select('landing_page',['' => "System Default"] + $a_mods, settings('landing_page'), [ 'class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary"> @lang('labels.update_settings')</button>
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
    </div>
@endsection
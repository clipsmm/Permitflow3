@extends('layouts.backend')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading p-t-10">
                        @include('backend.settings._backend_settings_menu')
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab1default">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Set Landing Page</h3>
                                        </div>
                                        <form class="form-horizontal form" method="post" action="">
                                            <div class="panel-body">
                                                {!! csrf_field() !!}
                                                <div class="form-group">
                                                    {!! Form::label('site_name', 'Site Title', ['class' => 'control-label col-sm-2']) !!}
                                                    <div class="col-sm-5">
                                                        {!! Form::text('site_name', (settings('site_name')) ? settings('site_name') : null, array('class' => 'form-control')) !!}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('meta_title', 'Meta Title', ['class' => 'control-label col-sm-2']) !!}
                                                    <div class="col-sm-5">
                                                        {!! Form::text('meta_title', settings('meta_title') ? settings('meta_title') : null, array('class' => 'form-control')) !!}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('site_description', 'Site Description', ['class' => 'control-label col-sm-2']) !!}
                                                    <div class="col-sm-5">
                                                        {!! Form::text('site_description', settings('site_description') ? settings('site_description') : null, array('class' => 'form-control')) !!}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('site_keywords', 'Site Keywords', ['class' => 'control-label col-sm-2']) !!}
                                                    <div class="col-sm-5">
                                                        {!! Form::text('site_keywords', settings('site_keywords') ? settings('site_keywords') : null, array('class' => 'form-control')) !!}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('site_author', 'Site Author', ['class' => 'control-label col-sm-2']) !!}
                                                    <div class="col-sm-5">
                                                        {!! Form::text('site_author', settings('site_author') ? settings('site_author') : null, array('class' => 'form-control')) !!}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('site_email', 'Contact Email', ['class' => 'control-label col-sm-2']) !!}
                                                    <div class="col-sm-5">
                                                        {!! Form::text('site_email', settings('site_email') ? settings('site_email') : null, array('class' => 'form-control')) !!}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('site_phone', 'Contact Phone No.', ['class' => 'control-label col-sm-2']) !!}
                                                    <div class="col-sm-5">
                                                        {!! Form::text('site_phone', settings('site_phone') ? settings('site_phone') : null, array('class' => 'form-control')) !!}
                                                    </div>
                                                </div>
                                                <div class="form-group m-b-10">
                                                    <label class="control-label col-sm-2"> @lang('labels.landing_page') </label>
                                                    <div class="col-sm-5">
                                                        {!! Form::select('landing_page',['' => "System Default"] + $a_mods, settings('landing_page'), [ 'class' => 'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-footer clearfix">
                                                <button type="submit"
                                                        class="btn btn-primary pull-right"> @lang('labels.update_settings')</button>
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

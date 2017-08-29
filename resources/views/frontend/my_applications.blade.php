@extends('layouts.frontend')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading p-t-10">
                        <div class="panel-heading">@lang('labels.my_applications')</div>
                    </div>
                    <div class="panel-body padding-0">
                        <div class="panel panel-form m-r-10 m-l-10 m-t-0 m-b-0">
                            <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">
                                @include('frontend.applications_list', ['applications' => $applications])
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
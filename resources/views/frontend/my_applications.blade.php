@extends('layouts.frontend')

@section('body')
    <div id="vue-root" class="container">
        <div class="row">
            <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading p-t-10">
                        <div class="panel-heading">@lang('labels.my_applications')</div>
                    </div>
                    <div class="panel-body padding-0">

                        <div class="panel panel-form m-r-10 m-l-10 m-t-0 m-b-0">
                            <div class="m-b-10 m-t-10">
                                <form accept-charset="UTF-8" action="" method="get" class="col-sm-6">
                                    <input name="_utf8" type="hidden" value="✓">
                                    <div class="input-group" id="adv-search">
                                        <input class="form-control" id="search_q" name="q"
                                               placeholder="@lang("Find an application by Ref No.")" type="text" value="{{ request('q') }}">
                                        <div class="input-group-btn">
                                            <div class="btn-group" role="group">
                                                <div class="dropdown dropdown-lg full_width"></div>
                                                <button type="submit" name="submit" class="btn btn5 btn-primary">
                                                    <span class="search_btn_txt"> <span class="fa fa-search"></span> Search</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="clearfix"></div>
                            </div>
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
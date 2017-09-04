@extends('layouts.frontend')

@section('body')
    <div id="vue-root">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">@lang('Corrections')</h3>
            </div>
            <div class="panel-body">
                @include('frontend.applications_list', ['applications' => $corrections])
            </div>
            <div class="panel-footer text-right">
                <a href="#">
                    @lang('View More >>')
                </a>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">@lang('Recent Applications')</h3>
            </div>
            <div class="panel-body">
                @include('frontend.applications_list', ['applications' => $applications])
            </div>
            <div class="panel-footer text-right">
                <a href="{{ route('frontend.applications.index') }}">
                    @lang('View More >>')
                </a>
            </div>
        </div>
    </div>
@endsection
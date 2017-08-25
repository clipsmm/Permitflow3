@extends('layouts.frontend')
@section('body')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>
                @lang('Application Details')
            </h4>
        </div>
        <div class="panel-body">
            {!! $module->render_application_view($application) !!}
        </div>
    </div>

@endsection
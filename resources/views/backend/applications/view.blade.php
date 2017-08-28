@extends('layouts.module')
@section('body')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ __("Application")." - ".$application->application_number }}</h3>
        </div>
        <div class="panel-body b-b-1">
            {!! $current_module->render_application_view($application) !!}
        </div>
    </div>
@endsection

@push('modals')
@endpush
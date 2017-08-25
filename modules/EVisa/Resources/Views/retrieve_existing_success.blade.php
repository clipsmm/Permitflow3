@extends('layouts.frontend')
@section('body')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-sm-6 col-sm-offset-3">
                <h4>
                    {{$module->name}}: @lang('e-visa::common.retrieve_existing_application')
                </h4>
                <hr>
                <div class="alert alert-info">
                    @lang('e-visa::help_blocks.retrieve_existing_success')
                </div>
                <div class="text-center">
                    <a href="{{route('application.show', ['e-visa', $application])}}">
                        Click Here
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
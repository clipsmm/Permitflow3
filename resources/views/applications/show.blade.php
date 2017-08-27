@extends('layouts.frontend')
@section('body')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="pull-left">
                @lang('Application Details')
            </h4>
            <div class="pull-right">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @lang('labels.downloads') <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        @forelse($application->outputs as $output)
                            <li><a target="_blank" href="{{ route('application.download', [$application->module->slug, $application->id, $output->id]) }}">{{ $output->output->name }}</a> </li>
                        @empty
                            <li><a href="#">@lang('labels.no_downloads')</a> </li>
                        @endforelse
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            {!! $module->render_application_view($application) !!}
        </div>
    </div>

@endsection
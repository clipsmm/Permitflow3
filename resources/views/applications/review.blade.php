@extends('layouts.frontend')
@section('body')
    {!! Form::open(['url' => route('application.review.submit', ['module_slug' => $module->slug, 'application' => $application->id])]) !!}
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('Review Application Details')
            <br>
        Ref: <strong>{{$application->application_number}}</strong>
        </div>
        <div class="panel-body padding-0">
            {!! $module->render_application_view($application) !!}
        </div>
        <div class="panel-footer">
            <div class="form-group text-right">
                @if($application->isEditable())
                    <a href="{{$module->get_edit_url($application)}}" class="btn btn-primary btn-sm">
                        <span class="fa fa-edit"></span>
                        @lang('Edit')
                    </a>
                @endif
                <button type="submit" class="btn btn-success btn-sm">
                    <span class="fa fa-check-circle"></span>
                    @lang('Submit Application')
                </button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

@endsection
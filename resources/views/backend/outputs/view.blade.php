@extends('layouts.module')
@section('body')
    <div class="panel  panel-default">
                    {!! Form::model($output, [ 'method' => 'POST', 'url' => route('backend.outputs.update', [$current_module->slug, $output->id])]) !!}
                    {!! csrf_field() !!}
                    <div class="panel-body">
                        @include('backend.outputs._output_form')
                    </div>
         <div class="panel-footer">
            <div class="pull-right">
                <a href="{{ route("backend.outputs.index", $current_module->slug) }}" class="btn btn-default ">@lang('labels.cancel')</a>
                <a href="{{ route("backend.outputs.preview_output", [$current_module->slug, $output->id]) }}" class="btn btn-success ">@lang('labels.preview')</a>
                <button type="submit" class="btn btn-primary">@lang('labels.save')</button>
            </div>
            <div class="clearfix"></div>
        </div>

        {!! Form::close() !!}
    </div>
@endsection
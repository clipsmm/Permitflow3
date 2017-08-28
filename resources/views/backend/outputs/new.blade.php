@extends('layouts.module')
@section('body')
    <div class="panel panel-default">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Create Output</h3>
                    </div>
                    <form method="post">
                        {!! csrf_field() !!}
                    <div class="panel-body ">

                            @include('backend.outputs._output_form')
                    </div>
                    <div class="panel-footer clearfix">
                        <div class="pull-right">
                            <a href="{{ route("backend.outputs.index", $current_module->slug) }}" class="btn btn-default">@lang('labels.cancel')</a>
                            <button type="submit" class="btn btn-primary">@lang('labels.save')</button>
                        </div>

                    </div>
                    </form>
                </div>
    </div>
@endsection
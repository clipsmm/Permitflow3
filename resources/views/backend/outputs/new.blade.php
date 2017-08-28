@extends('layouts.module')
@section('body')
    <div class="panel with-nav-tabs panel-default">
        <div class="panel-body padding-0">
            <div class="tab-content">
                <div class="panel panel-form m-r-10 m-l-10 m-t-0 m-b-0">
                    <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">
                        <form method="post">
                            {!! csrf_field() !!}
                            @include('backend.outputs._output_form')
                            <div class="modal-footer">
                                <a href="{{ route("backend.outputs.index", $current_module->slug) }}" class="btn btn-default">@lang('labels.cancel')</a>
                                <button type="submit" class="btn btn-primary">@lang('labels.save')</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
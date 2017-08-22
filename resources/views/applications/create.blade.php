@extends('layouts.frontend')
@section('content')
    {!! Form::open(['url' => route('application.save', ['module_slug' => $module->slug])]) !!}
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('New Application')
        </div>
        <div class="panel-body">
             @yield('form-body')
        </div>
        <div class="panel-footer text-right">
            <button type="submit" class="btn btn-sm btn-primary">
                @lang('Submit')
            </button>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

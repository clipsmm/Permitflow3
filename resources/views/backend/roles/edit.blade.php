@extends('backend.index')

@section('title', 'Roles')

@section('content')
<div class="col-md-12">
    <form method="POST" action="{{ route('roles.update', $role->id) }}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="panel panel-default">
            <div class="panel-heading">@lang("Edit Role")</div>
            <div class="panel-body">
                <div class="form-group{{ error_class($errors, 'name') }}">
                    <label for="name" class="control-label">@lang("Name")</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ $role->name }}" autofocus>
                    {!! error_tag($errors, 'name') !!}
                </div>

                <input id="guard_name" type="hidden" class="form-control" name="guard_name" value="{{ $role->guard_name }}" />

                <div class="panel-footer text-right">
                    <button type="submit" class="btn btn-primary">
                        @lang("Submit")
                    </button>
                    <span class="pull-left">
                        <a href="/backend/roles" class="btn btn-md btn-default">Back</a>
                    </span>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

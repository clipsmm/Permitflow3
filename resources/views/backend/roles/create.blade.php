@extends('layouts.backend')

@section('title', 'Roles')

@section('body')
    <div class="col-md-12">
        <form method="POST" action="{{ route('roles.store') }}">
            {{ csrf_field() }}
            <div class="panel panel-default">
                <div class="panel-heading">@lang("Add Role")</div>
                <div class="panel-body">
                    <div class="form-group{{ error_class($errors, 'name') }}">
                        <label for="name" class="control-label">@lang("Name")</label>
                        <input id="name" type="text" class="form-control" name="name" value="" autofocus>
                        {!! error_tag($errors, 'name') !!}
                    </div>

                    <input id="name" type="hidden" class="form-control" name="guard_name" value="test" />

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

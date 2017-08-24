@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row">

        <div class="col-md-3 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                @foreach($active_modules as $module)
                <div class="panel-body">
                    <h5>{{$module->name}}</h5>
                    <a href="{{$module->newUrl()}}">
                        @lang('common.make_application')
                    </a>
                </div>
                @endforeach
            </div>
        </div>

        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

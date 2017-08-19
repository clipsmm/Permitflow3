@extends('layouts.app')
@section('sidebar')
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('Some Heading')
        </div>
        <div class="panel-body">
            some content<br>
            some content<br>
            some content<br>
            some content<br>
            some content<br>
            some content<br>
            some content<br>
            some content<br>
            some content<br>
            some content<br>
            some content<br>
            some content<br>
            some content<br>
            some content<br>
            some content<br>
        </div>
    </div>
@endsection
@section('content')
    @yield('content')
@stop
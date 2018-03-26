@extends('layouts.app')

@section('content')
    @include('layouts.partials.topnav1')
    @include('layouts.partials.topnave2')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @yield('body')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
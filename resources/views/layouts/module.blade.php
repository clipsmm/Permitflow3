@extends('layouts.app')

@section('content')
    @include('layouts.partials.topnav1')
    @include('layouts.partials.topnave2')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="task-icon2">
                            <span class="task-img2"><img src="{{ asset('images/task4.svg') }}"/></span>
                            <span class="task-img2">{{ $page_title or __('Tasks') }}</span>
                        </h3>
                        <div class="pull-right" role="">
                            @foreach($current_module->get_menus() as $menu)
                                <a class="btn btn-sm btn-{{ array_get($menu, 'type') }}" href="{{ array_get($menu, 'action') }}">
                                    <span class="task-img"><img src="{{ array_get($menu, 'icon') }}" /></span>
                                    <span class="task-img">{{ array_get($menu,'name') }}</span> </a>
                            @endforeach
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                @include('partials.notifier')
                @yield('body')
                </div>
                </div>
            </div>
        </div>
        @stack('modals')
    </div>
@endsection


@extends('layouts.backend')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading p-t-10">
                        @include('backend.settings._backend_settings_menu')
                    </div>
                    <div class="panel-body padding-0">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab1default">
                                <div class="panel panel-form m-r-10 m-l-10 m-t-0 m-b-0">
                                    <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">
                                        <table class="table table-hover table-special table-striped">
                                            <thead>
                                            <tr>
                                                <th>Module</th>
                                                <th class="hidden-xs hidden-sm">Status</th>

                                                <th class="hidden-xs">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($modules as $module)
                                                <tr class=' '>
                                                    <td class="big-data width-40">
                                                        <h1>{{ $module->name }}</h1>
                                                        <p>{{ $module->description }}</p>

                                                    </td>
                                                    <td class="hidden-xs hidden-sm">{!! $module->enabled ? '<span class="label label-success">Enabled</span>' : '<span class="label label-danger">Disabled</span>'  !!} </td>
                                                    <td>
                                                        <a href="#" class="" title="Access Management"><i class="fa fa-users"></i> </a>
                                                        <a href="{{ route('backend.modules.manage', $module->slug) }}" class="" title="Settings"><i class="fa fa-cog"></i> </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3">No tasks available</td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@extends('layouts.backend')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading">
                        @include('backend.settings._backend_settings_menu')
                    </div>
                    <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab1default">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                           Manage Modules
                                        </h3>
                                    </div>
                                    <div class="panel-body">
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
    </div>
@endsection

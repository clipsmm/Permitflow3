@extends('layouts.frontend')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading p-t-10">
                        <div class="panel-heading">@lang('labels.application_history')</div>
                    </div>
                    <div class="panel-body padding-0">
                        <div class="panel panel-form m-r-10 m-l-10 m-t-0 m-b-0">
                            <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">
                                <table class="table table-responsive table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>
                                            @lang('common.service')</th>
                                        <th>
                                            @lang('common.ref_no')
                                        </th>
                                        <th>
                                            @lang('common.payment_status')
                                        </th>
                                        <th>
                                            @lang('common.application_status')
                                        </th>
                                        <th>
                                            @lang('common.actions')
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @forelse($applications as $application)
                                        <tr>
                                            <td>{{ $application->module->name }}</td>
                                            <td>{{ $application->application_number }}</td>
                                            <td></td>
                                            <td>
                                                <span class="text-uppercase bold">{{ $application->status }}</span>
                                                @if($application->in_corrections)
                                                    <span data-placement="right" data-toggle="tooltip" style="cursor: pointer" title="@lang('common.in_corrections')" class="text-danger fa fa-exclamation-circle fa-2x"></span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-default btn-sm dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                        @lang('common.actions')
                                                        <span class="fa fa-ellipsis-v"></span>
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                        <li>
                                                            <a href="{{route('application.show', [$application->module->slug, $application])}}">
                                                                <span class="fa fa-eye"></span>
                                                                @lang('common.view')
                                                            </a>
                                                        </li>
                                                        @if($application->isEditable())
                                                        <li>
                                                            <a href="{{$application->module->get_edit_url($application)}}">
                                                                <span class="fa fa-edit text-success"></span>
                                                                @lang('common.edit')
                                                            </a>
                                                        </li>
                                                        @endif
                                                        @if($application->canBeDeleted())
                                                        <li>
                                                            <a href="#">
                                                                <span class="fa fa-times-circle text-danger"></span>
                                                                @lang('common.delete')
                                                            </a>
                                                        </li>
                                                        @endif
                                                        @foreach($application->getActions() as $action)
                                                            <li>
                                                                {!! render_action($action) !!}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
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

@endsection
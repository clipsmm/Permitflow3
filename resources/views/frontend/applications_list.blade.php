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
                <td>
                    <h5 class="text-uppercase">
                        {{ $application->module->getServiceName() }}
                    </h5>
                    <span class="text-uppercase h4">
                {{$application->user->full_name}} <br>
                </span>
                    {{$application->created_at->toDayDateTimeString()}}
                </td>
                <td style="vertical-align: middle">
                    {{ $application->application_number }}
                </td>
                <td style="vertical-align: middle">
                    {!! $application->current_invoice ? $application->current_invoice->get_status_label() : '' !!}
                </td>
                <td style="vertical-align: middle">
                    <span class="text-uppercase">{{ $application->status }}</span>
                    {{--@if($application->in_corrections)--}}
                    {{--<span data-placement="right" data-toggle="tooltip" style="cursor: pointer" title="@lang('common.in_corrections')" class="text-danger fa fa-exclamation-circle fa-2x"></span>--}}
                    {{--@endif--}}
                </td>
                <td style="vertical-align: middle">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm">
                            @lang("Actions")
                        </button>
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
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
                                    {!! render_action(['label' => __('Delete'),
                                        'confirm' => __('common.confirm_action'),
                                        'icon' => 'fa fa-trash',
                                        'url' => route('application.delete', [$application->module_slug, $application->id]),
                                        'color' => 'danger',
                                         'method' => 'delete'])
                                    !!}
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
            <tr>
                <td colspan="5">@lang('common.no_recent_applications')</td>
            </tr>
        @endforelse
        </tbody>
    </table>
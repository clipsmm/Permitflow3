<table class="table table-responsive table-hover table-striped">
    <thead>
    <tr>
        <th>
            @lang('common.service')</th>
        <th>
            @lang('common.ref_no')
        </th>
        <th>
            @lang('common.actions')
        </th>
    </tr>
    </thead>
    <tbody>

    @forelse($downloads as $download)
        <tr>
            <td>
                <h5 class="text-uppercase">
                    {{ $download->application->module->getServiceName() }}
                </h5>
                {{$download->created_at->toDayDateTimeString()}}
            </td>
            <td style="vertical-align: middle">
                {{ $download->application->application_number }}
            </td>
            <td style="vertical-align: middle">
                <a target="_blank" class="btn btn-primary btn-sm" href="{{ route('application.download', [$download->application->module_slug, $download->application->id, $download->id]) }}">
                    <i class="fa fa-download"></i> Download </a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="3">@lang('No available downloads')</td>
        </tr>
    @endforelse
    </tbody>
</table>
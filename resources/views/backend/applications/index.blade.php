@extends('layouts.module')
@section('body')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">@lang('Application Search ')</h3>
            <small> @lang("Enter the application's ref. number to search.")</small>
        </div>
        <div class="panel-body b-b-1">
            <div class="m-b-10">
                <form accept-charset="UTF-8" action="" method="get" class="col-sm-6">
                    <input name="_utf8" type="hidden" value="✓">
                    <div class="input-group" id="adv-search">
                        <input class="form-control" id="search_q" name="q"
                               placeholder="@lang("Find an application by Ref No. or Passsport No.")" type="text">
                        <div class="input-group-btn">
                            <div class="btn-group" role="group">
                                <div class="dropdown dropdown-lg full_width"></div>
                                <button type="submit" name="submit" class="btn btn5 btn-primary">
                                    <span class="search_btn_txt"> <span class="fa fa-search"></span> Search</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="clearfix"></div>
            </div>
            @if(request('q',null))
                <table class="table table-hover table-special table-striped m-t-10">
                    <thead>
                    <tr>
                        <th>Service</th>
                        <th class="hidden-xs hidden-sm">Ref no.</th>
                        <th>Submitted By</th>
                        <th class="hidden-xs">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($applications as $application)
                        <tr>
                            <td>
                                <h1>{{ $application->module->name }}</h1>
                            </td>
                            <td>{{ $application->application_number }}</td>
                            <td>{{ $application->user }}</td>
                            <td>
                                <a href="{{ route('backend.applications.show',[$current_module->slug, $application->id]) }}"
                                   class="btn btn-xs btn-primary">
                                    <span class="fa fa-eye"></span> View
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">@lang('No applications found')</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            @endif
        </div>

    </div>
@endsection

@push('modals')
@endpush
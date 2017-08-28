@extends('layouts.backend')

@section('body')
    <div class="panel panel-default">
        <div class="panel-heading p-t-10">
            @lang('Module Users')
        </div>
        <div class="panel-body padding-0">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab1default">
                    <div class="panel-body">
                        <div class="panel panel-default m-b-0">
                            <div class="panel-body padding-0">
                                <table class="table table-hover table-special table-striped">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th class="hidden-xs">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($users as $user)
                                        <tr class=''>
                                            <td class="big-data width-40">
                                                <h1>{{ $user->full_name }}</h1>
                                            </td>
                                            <td >{{ $user->email }}</td>
                                            <td >{{ $user->phone }}</td>
                                            <td>
                                                <a href="{{ route('backend.modules.edit_user',[$module->slug, $user->id]) }}"
                                                   class="btn btn-xs btn-primary">
                                                    <span class="fa fa-lock"></span>
                                                </a>
                                                <a href="{{ route('backend.modules.remove_user',[$module->slug, $user->id]) }}"
                                                   class="btn btn-xs btn-danger">
                                                    <span class="fa fa-times"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3">@lang('No users found')</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        {!! $users->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('modals')
@endpush
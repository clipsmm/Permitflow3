@extends('layouts.backend')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading p-t-10">
                        @lang('labels.outputs')
                        <a href="{{ route('backend.outputs.new', $current_module->slug) }}" class="btn btn-primary"> New</a>
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
                                                    <th>Output</th>
                                                    <th>Date Created</th>
                                                    <th class="hidden-xs">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($outputs as $output)
                                                    <tr class=' '>
                                                        <td class="big-data width-40">
                                                            <h1>{{ $output->name }}</h1>
                                                        </td>
                                                        <td >{{ $output->created_at }}</td>
                                                        <td>
                                                            <a href="{{ route('backend.outputs.show',[$current_module->slug, $output->id]) }}"
                                                               class="btn btn-xs btn-primary">
                                                                <span class="fa fa-eye"></span> View
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="3">@lang('labels.no_records')</td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    {!! $outputs->render() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('modals')
@endpush
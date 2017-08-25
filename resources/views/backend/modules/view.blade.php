@extends('layouts.backend')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default panel-form m-r-10 m-l-10">
                <div class="panel-heading clearfix">
                    <div class="pull-right" role="">
                        <form method="post">
                            {!! csrf_field() !!}
                            <a href="{{ route('backend.modules.index') }}" class="btn btn-sm btn-default">
                                <span class="fa fa-arrow-left"></span> @lang('labels.back')
                            </a>
                        </form>
                    </div>
                    <h3 class="panel-title"></h3>
                </div>
                <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">
                </div>
            </div>
        </div>
    </div>

@endsection

@push('modals')

@endpush
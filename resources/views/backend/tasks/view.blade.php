@extends('layouts.backend')

@section('body')

    <div class="row">

        <div class="col-md-12">

            <!-- panel -->

            <div class="panel panel-default panel-form m-r-10 m-l-10">
                <div class="panel-heading clearfix">
                    <div class="pull-right" role="">

                        <a href="#" class="btn btn-sm btn-success">
                            <span class="fa fa-check"></span> Approve
                        </a>
                        <a href="#" class="btn btn-sm btn-warning">
                            <span class="fa fa-exclamation-triangle"></span> Send for correction
                        </a>
                        <a href="#" class="btn btn-sm btn-info">
                            <span class="fa fa-tasks"></span> Asign Task
                        </a>

                    </div>
                    <h3 class="panel-title"></h3>
                    <!--   <small> Application tasks</small> -->
                </div>

                <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">

                    {!! $module->render_application_view($task->application) !!}
                </div>

            </div>

            <!-- panel -->

        </div>

    </div>

@endsection

@push('modals')

@endpush
@extends('layouts.backend')

@section('body')

    <div class="row">

        <div class="col-md-12">

            <!-- panel -->

            <div class="panel panel-default panel-form m-r-10 m-l-10">
                <div class="panel-heading clearfix">
                    <div class="pull-right" role="">
                        <form method="post">
                            {!! csrf_field() !!}
                            <a href="{{ route('backend.tasks.queue', [$module->slug]) }}" class="btn btn-sm btn-default">
                                <span class="fa fa-arrow-left"></span> @lang('labels.back_to_tasks')
                            </a>

                            @if(!$task->application->complete)
                                @foreach($actions as $action => $props)
                                    @if(array_get($props,'feedback',false))
                                        <button type="button" class="btn btn-sm btn-{{array_get($props,'color')}}" data-toggle="modal" data-target="#md_tskv_{{ $action.'_'.$task->id}}">
                                            <span class="fa fa-{{ array_get($props,'icon') }}"></span> {{array_get($props,'name')}}
                                        </button>

                                        @push('modals')
                                            <div class="modal fade modal-wide" id="md_tskv_{{ $action.'_'.$task->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form class="modal-content" method="post">
                                                        {!! csrf_field() !!}
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="exampleModalLongTitle"> @lang('labels.reason_for', [ 'action' => array_get($props,'name') ])  </h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <textarea name="comment" class="form-control"></textarea>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-default" data-dismiss="modal" aria-label="Close">@lang('labels.cancel')</button>
                                                            <button type="submit" class="btn btn-primary" value="{{ $action }}" name="action">
                                                                <span class="fa fa-{{ array_get($props,'icon') }}"></span> {{array_get($props,'name')}}
                                                            </button>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        @endpush
                                    @else
                                        <button type="submit" class="btn btn-sm btn-success" value="{{ $action }}" name="action">
                                            <span class="fa fa-{{ array_get($props,'icon') }}"></span> {{array_get($props,'name')}}
                                        </button>
                                    @endif

                                @endforeach
                            @endif
                        </form>


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
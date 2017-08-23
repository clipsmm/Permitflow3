@extends('layouts.backend')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel with-nav-tabs panel-default">
                                    <div class="panel-heading p-t-10">
                                        <ul class="nav nav-tabs">
                                            <li class="{{ menu_current_route('backend.tasks.queue') }}"><a
                                                        href="{{ route('backend.tasks.queue', [$module->slug]) }}">Queued
                                                    <span class="label label-default"> 3000</span></a></li>
                                            <li class="{{ menu_current_route('backend.tasks.inbox') }}"><a
                                                        href="{{ route('backend.tasks.inbox', [$module->slug]) }}">My
                                                    Task <span class="label label-default"> 3000</span></a></li>
                                            <li class="{{ menu_current_route('backend.tasks.corrections') }}"><a
                                                        href="{{ route('backend.tasks.corrections', [$module->slug]) }}">Awaiting
                                                    Corrections <span class="label label-default"> 200</span></a></li>
                                            <li class="{{ menu_current_route('backend.tasks.outbox') }}"><a
                                                        href="{{ route('backend.tasks.outbox', [$module->slug]) }}">completed
                                                    <span class="label label-default"> 3000</span></a></li>
                                        </ul>
                                    </div>
                                    <div class="panel-body padding-0">
                                        <div class="tab-content">
                                            <div class="tab-pane fade in active" id="tab1default">
                                                <div class="panel-body">
                                                    <div class="panel panel-default m-b-0">
                                                        <div class="panel-body b-b-1">
                                                            <form class="col-sm-6" accept-charset="UTF-8" action=""
                                                                  method="get">
                                                                <input name="_utf8" type="hidden" value="✓">
                                                                <div class="input-group " id="adv-search">
                                                                    <input type="hidden" name="application_id" value=''>
                                                                    <input id="search_type" name="search[type]"
                                                                           type="hidden"> <input class="form-control"
                                                                                                 id="search_q"
                                                                                                 name="search[q]"
                                                                                                 placeholder="Enter Ref No."
                                                                                                 type="text" value="">
                                                                    <div class="input-group-btn">
                                                                        <div class="btn-group" role="group">
                                                                            <div class="dropdown dropdown-lg full_width"></div>
                                                                            <button type="submit" name="submit"
                                                                                    class="btn btn5 btn-primary"><span
                                                                                        class="search_btn_txt"> <span
                                                                                            class="fa fa-search"></span> Search</span>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <a href="#" class="btn btn-sm btn-success pull-right"><span
                                                                        class="fa fa-tasks"></span> Pick Task</a>
                                                        </div>
                                                        <div class="panel-body padding-0">
                                                            <table class="table table-hover table-special table-striped">
                                                                <thead>
                                                                <tr>
                                                                    <th>Service</th>
                                                                    <th class="hidden-xs hidden-sm">Ref no.</th>
                                                                    <th class="hidden-xs">Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @forelse($tasks as $task)
                                                                    <tr class=' '>
                                                                        <td class="big-data width-40">
                                                                            <h1>{{ $task->name }}</h1>
                                                                            <p>{{ $task->submitted_at }}</p>
                                                                            <small class="hidden-md hidden-lg">{{ $task->application->application_number }}</small>
                                                                        </td>
                                                                        <td class="hidden-xs hidden-sm">{{ $task->application->application_number }}</td>
                                                                        <td>
                                                                            <a href="{{ route('backend.tasks.show',[$module->slug, $task->id]) }}"
                                                                               class="btn btn-xs btn-primary">
                                                                                <span class="fa fa-eye"></span> View
                                                                            </a>
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
                                                <div class="panel-footer">
                                                    {!! $tasks->render() !!}
                                                </div>
                                            </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
        </div>
    </div>
@endsection

@push('modals')

@endpush


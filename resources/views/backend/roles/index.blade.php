
@extends('layouts.backend')

@section('body')
    <div class="container">
        <div class="row">
                <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading p-t-10">
                        @include('backend.settings._backend_settings_menu')
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <h3 class="panel-title"><a href="{{ route('backend.roles.create') }}" class="btn btn-primary"> New</a></h3>
                        </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab1default">
                                <div class="panel panel-form m-r-10 m-l-10 m-t-0 m-b-0">
                                    <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">
                                        <table class="table table-hover table-special table-striped">
                                            <thead class="thead-default">
                                            <tr>
                                                <th>Role Name</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($roles as $role)
                                                <tr>
                                                    <td>{{ $role->name }}</td>
                                                    <td>
                                                        <a href="/backend/roles/{{ $role->id }}/edit" class="btn btn-sm btn-default">  <span class="fa fa-pencil"></span> Edit</a>
                                                        {{--<a href="/backend/roles/{{ $role->id }}/delete" class="btn btn-sm btn-primary">Delete</a>--}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
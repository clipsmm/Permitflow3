@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-3 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="thumbnail thumbnail-reveal">
                            <img class="img-responsive hidden-xs" src="https://eresident.co.ke/uploads/20170201175906.png">
                            <div class="reveal-holder"><a class="btn btn-default" href="#avatar-modal" data-toggle="modal" role="button"><i class="fa fa-camera"></i> Change Photo</a></div>
                        </div>
                    </div>

                    <div class="panel-body">
                        E-Visa
                    </div>

                    <div class="panel-body">
                        E-Passport
                    </div>

                </div>
            </div>


            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-heading clearfix">
                            <div class="btn-group pull-right" role="group">
                                <a href="#" class="btn btn-sm btn-default">
                                    <span class="fa fa-th-list"></span>
                                    Show All            </a>
                                <a href="#" class="btn btn-sm btn-primary pull-right">
                                    <span class="fa fa-plus-circle"></span>
                                    Add Role            </a>
                            </div>
                            <h3 class="panel-title">User Roles</h3>
                        </div>
                    </div>

                    <div class="panel-body">
                        <table class="table table-hover table-special table-striped">
                            <tbody>
                            <tr>
                                <th>
                                    Role Name
                                </th>

                                <th>
                                    Action
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    Super Admin
                                </td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-xs">View   </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                     Normal Admin
                                </td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-xs">View   </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('title', 'Backend')

@section('body')
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
                        <a href="/users">Users Management</a>
                    </div>

                    <div class="panel-body">
                        <a href="#">Applications Management</a>
                    </div>

                </div>
            </div>

            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @section('content')
                        @show
                    </div>
                </div>
            </div>
    </div>
@endsection
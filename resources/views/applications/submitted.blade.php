@extends('layouts.frontend')
@section('body')
    <div class="panel panel-default">
        <div class="panel-heading">
            Application Submitted
        </div>
        <div class="panel-body">
            <div class="alert alert-success">
                <h4>
                    APPLICATION SUBMITTED SUCCESSFULLY!
                </h4>
            </div>
            <br>
            <br>
            APPLICATION TYPE: {{$module->name}} <br>
            APPLICATION REF: {{$application->application_number}} <br>
        </div>
        <div class="panel-footer"></div>
    </div>
    
@endsection
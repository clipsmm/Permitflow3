@extends('layouts.frontend')
@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            You have successfully completed step 1 on the application process. Use the link sent to your email to complete the application process.
            <br>
            APPLICATION NUMBER: <strong>{{$application->application_number}}</strong>
        </div>
    </div>
@endsection
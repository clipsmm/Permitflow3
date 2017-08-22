@extends('layouts.frontend')
@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            You have successfully completed step 1 on the application process. We have sent you an email with a link you can use to complete the application blah blah
            <br>
            APPLICATION NUMBER: <strong>{{$application->application_number}}</strong>
        </div>
    </div>
@endsection
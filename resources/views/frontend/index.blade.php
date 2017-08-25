@extends('layouts.frontend')

@section('body')
   <div class="container">
       <div class="row">
           @foreach($active_modules as $module)
               <div class="col-md-4 col-xs-12 col-sm-12">
                   <div class="thumbnail">
                       <div class="caption">
                           <h3>{{ $module->slug }}</h3>
                           <p>{{ $module->description  }}</p>
                           <p><a href="{{ $module->newUrl() }}" class="btn btn-primary" role="button">Apply for Service</a> </p>
                       </div>
                   </div>
               </div>
           @endforeach
       </div>
   </div>

@endsection
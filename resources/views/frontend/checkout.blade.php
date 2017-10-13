@extends('layouts.frontend')

@section('body')
            <iframe style="border: none;" scrolling="no" src="{{$data->iframe_url}}" width="100%" height="900px"
                    name="my_frame"></iframe>
@endsection
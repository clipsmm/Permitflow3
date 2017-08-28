@extends('layouts.backend')

@section('body')
    <div class="panel panel-default">
        <div class="panel-heading p-t-10">
            @lang('Edit User Permissions ')
        </div>
        <div class="panel-body padding-0">
           <div class="panel-body">
               <div class="media">
                   <div class="media-left">
                       <a href="#">
                           <img class="media-object" src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50" alt="...">
                       </a>
                   </div>
                   <div class="media-body">
                       <h4 class="media-heading">{{ $user->full_name }}</h4>
                       <strong>Email: </strong> {{ $user->email }} <br>
                       <strong>Phone: </strong> {{ $user->phone }} <br>
                   </div>
               </div>
           </div>
            <form method="post" action="">
                {!! csrf_field() !!}
                <div class="panel-body">
                    @foreach($permissions as $perm)
                        <div class="col-sm-4">
                            <div class="checkbox">
                                <label class="text-capitalize">
                                    {!! Form::checkbox('permissions[]', $perm->id,
                                        in_array($perm->id, old('permissions', [])) || in_array($perm->id, $user->permissions->pluck('id')->toArray()))
                                    !!}
                                    {{$perm->label}}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <a class="btn btn-default" href="{{ route('backend.modules.users', $module->slug) }}">@lang('Back')</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
@endsection
@push('modals')
@endpush
@extends('layouts.backend')

@section('body')
    <div class="panel panel-default">
        <div class="panel-heading p-t-10">
            @lang('Add User ')
        </div>
        <div class="panel-body padding-0">
            <div class="m-t-10">
                <form accept-charset="UTF-8" action="" method="get" class="col-sm-6">
                    <input name="_utf8" type="hidden" value="✓">
                    <div class="input-group" id="adv-search">
                        <input class="form-control" id="search_q" name="id_number"
                               placeholder="@lang("Find by ID Number")" type="text" value="{{ request('id_number') }}">
                        <div class="input-group-btn">
                            <div class="btn-group" role="group">
                                <div class="dropdown dropdown-lg full_width"></div>
                                <button type="submit" name="submit" class="btn btn5 btn-primary">
                                    <span class="search_btn_txt"> <span class="fa fa-search"></span> Search</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <br>
                <br>
                <br>
                <div class="clearfix"></div>
            </div>

            @if(request('id_number',null))
                @if($user)
                    <form method="post" action="">
                        {!! csrf_field() !!}
                        <div class="panel-body">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img style="border-radius: 50%" class="media-object"
                                             src="http://api.adorable.io/avatar/100/{{$user->first_name}}"
                                             alt="...">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">{{ $user->full_name }}</h4>
                                    <div class="form-group"></div>
                                    <strong>Email: </strong> {{ property_exists($user,'email') ? $user->email : '' }}
                                    <br>
                                    <strong>Phone: </strong> {{ property_exists($user,'phone_number') ? $user->phone_number : '' }}
                                    <br>
                                    @if($user->registered)
                                        <strong>
                                         @lang('Registered')
                                            <span class="fa fa-check-circle text-success"></span>
                                        </strong><br>
                                    @else
                                        <strong>
                                            @lang('Not Registered')
                                            <span class="fa fa-times-circle text-danger"></span>
                                        </strong><br>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {!! csrf_field() !!}
                        <div class="panel-body">
                            @if(!$user->registered)
                                <div class="col-sm-6">
                                    <div class="form-group {{error_class($errors, 'email')}}">
                                        <label>
                                            @lang('forms.email_address')
                                        </label>
                                        {!! Form::email('email', old('email', (property_exists($user,'email') ? $user->email : '')), ['class' => 'form-control input-sm']) !!}
                                        {!! error_tag($errors, 'email') !!}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{error_class($errors, 'phone_number')}}">
                                        <label>
                                            @lang('forms.phone_number')
                                        </label>
                                        {!! Form::text('phone_number', old('phone_number', (property_exists($user,'phone_number') ? $user->phone_number : '')), ['class' => 'form-control input-sm']) !!}
                                        {!! error_tag($errors, 'phone_number') !!}
                                    </div>
                                </div>
                            @endif
                            <div class="clearfix"></div>
                            @foreach($permissions as $perm)
                                <div class="col-sm-4">
                                    <div class="checkbox">
                                        <label class="text-capitalize">
                                            {!! Form::checkbox('permissions[]', $perm->id,
                                                in_array($perm->id, old('permissions', $user_permissions)))
                                            !!}
                                            {{$perm->label}}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-default"
                               href="{{ route('backend.modules.users', $module->slug) }}">@lang('Back')</a>
                            <button type="submit" class="btn btn-primary">@lang('Add')</button>
                        </div>
                    </form>
                @else
                    <div class="note note-danger">
                        @lang("User matching ID Number not found")
                    </div>
                @endif
            @endif

        </div>
    </div>
@endsection
@push('modals')
@endpush
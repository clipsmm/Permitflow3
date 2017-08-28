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
                                        <img class="media-object" src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50" alt="...">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">{{ $user->full_name }}</h4>
                                    <strong>Email: </strong> {{ property_exists($user,'email') ? $user->email : '' }} <br>
                                    <strong>Phone: </strong> {{ property_exists($user,'phone_number') ? $user->phone_number : '' }} <br>
                                </div>
                            </div>
                        </div>
                        {!! csrf_field() !!}
                        <div class="panel-body">
                            @foreach($permissions as $perm)
                                <div class="col-sm-4">
                                    <div class="checkbox">
                                        <label class="text-capitalize">
                                            {!! Form::checkbox('permissions[]', $perm->id,
                                                in_array($perm->id, old('permissions', [])))
                                            !!}
                                            {{$perm->label}}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-default" href="{{ route('backend.modules.users', $module->slug) }}">@lang('Back')</a>
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
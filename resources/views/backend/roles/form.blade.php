<div class="col-sm-12 {{ error_class($errors, 'name') }}">
    <label>@lang('Role Name')</label>
    {!! Form::text('name', null, ['class' => 'form-control input-sm']) !!}
    {!! error_tag($errors, 'name') !!}
</div>
<div class="clearfix"></div>
<br>
<div class="panel panel-default">
<div class="panel-heading"> <h3 class="panel-title">@lang('System Permissions')</h3></div>
<div class="panel-body">
<div class="col-sm-12">
    @foreach($permissions->get('system', []) as $perm)
        <div class="col-sm-4">
            <div class="checkbox">
                <label class="text-capitalize">
                    {!! Form::checkbox('permissions[]', $perm->id,
                        in_array($perm->id, old('permissions', [])) || in_array($perm->id, $role->permissions->pluck('id')->toArray()))
                    !!}
                    {{$perm->label}}
                </label>
            </div>
        </div>
    @endforeach
</div>
</div>
</div>
<div class="clearfix"></div>
<br>

{{--@foreach($module_permissions as $slug => $perms)--}}
    {{--<div class="panel panel-default">--}}
    {{--<div class="panel-heading">--}}
        {{--<h3 class="panel-title">--}}
            {{--{{\App\Modules\BaseModule::instance_from_slug($slug)->name}}--}}
        {{--</h3>--}}
    {{--</div>--}}
        {{--<div class="panel-body">--}}
            {{--<div class="col-sm-12">--}}
    {{--@foreach($perms as $perm)--}}
        {{--<div class="col-sm-3">--}}
            {{--<div class="checkbox">--}}
                {{--<label class="text-capitalize">--}}
                    {{--{!! Form::checkbox('permissions[]', $perm->id,--}}
                        {{--in_array($perm->id, old('permissions', [])) || in_array($perm->id, $role->permissions->pluck('id')->toArray()))--}}
                    {{--!!}--}}
                    {{--{{$perm->label}}--}}
                {{--</label>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--@endforeach--}}
    {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endforeach--}}

<div class="clearfix"></div>
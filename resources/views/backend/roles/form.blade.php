<h4 class="form-section">
    @lang('Role Name')
</h4>
<div class="col-sm-12 {{ error_class($errors, 'name') }}">
    {!! Form::text('name', null, ['class' => 'form-control input-sm']) !!}
    {!! error_tag($errors, 'name') !!}
</div>
<div class="clearfix"></div>
<br>
<h4 class="form-section">
    @lang('System Permissions')
</h4>
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
<div class="clearfix"></div>
<br>
<h4 class="form-section">
    @lang('Module Based Permissions')
</h4>
@foreach($module_permissions as $slug => $perms)
    <div class="col-sm-12">
        <h5 clas="form-section">
            {{\App\Modules\BaseModule::instance_from_slug($slug)->name}}
        </h5>
    </div>
    @foreach($perms as $perm)
        <div class="col-sm-3">
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
@endforeach

<div class="clearfix"></div>
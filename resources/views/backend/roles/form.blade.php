<div class="panel panel-default">
    <div class="panel-heading">@lang("Add Role")</div>
    <div class="panel-body">
        <div class="form-group{{ error_class($errors, 'name') }}">
            <label for="name" class="control-label">@lang("Name")</label>
            {!! Form::text('name', null, ['class' => 'form-control input-sm']) !!}
            {!! error_tag($errors, 'name') !!}
        </div>
        <br>

        <h4>
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
                            {{$perm->name}}
                        </label>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="clearfix">
            <br>
            <br>
        </div>

        <h4>
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
                            {{$perm->name}}
                        </label>
                    </div>
                </div>
            @endforeach
        @endforeach

        <div class="clearfix"></div>

        <input id="name" type="hidden" class="form-control" name="guard_name" value="test"/>

        <div class="panel-footer text-right">
            <button type="submit" class="btn btn-primary">
                @lang("Submit")
            </button>
            <span class="pull-left">
                            <a href="/backend/roles" class="btn btn-md btn-default">Back</a>
                        </span>
        </div>
    </div>
</div>
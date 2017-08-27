<div class="form-group">
    <label>@lang('labels.output_name_field')</label>
    {!! Form::text('name', null, [ 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    <label>@lang('labels.output_code_field')</label>
    {!! Form::text('code', null, [ 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    <label>@lang('labels.output_template_field')</label>
    {!! Form::textarea('template', null, [ 'class' => 'form-control']) !!}
</div>
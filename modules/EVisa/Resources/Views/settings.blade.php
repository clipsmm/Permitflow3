@extends('layouts.backend')

@section('body')
    <div class="panel with-nav-tabs panel-default m-b-0">
        <div class="panel-heading p-t-10">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab11default" data-toggle="tab">
                        @lang('e-visa::labels.general_settings')</a>
                </li>

            </ul>
        </div>
        <div class="panel-body padding-0">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab11default">
                    <div class="panel panel-form m-r-10 m-l-10 m-t-0 m-b-0">
                        <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">
                            <form class="form-horizontal" method="post" action="{{ route('e-visa.settings.save') }}">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <label class="control-label col-sm-2"> @lang('e-visa::labels.cost') </label>
                                    <div class="col-sm-5">
                                        {!! Form::number('e-visa[cost]', settings('e-visa.cost'), [ 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary"> @lang('e-visa::labels.update_settings') </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
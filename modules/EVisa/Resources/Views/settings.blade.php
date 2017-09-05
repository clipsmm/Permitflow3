@extends('layouts.module')

@section('body')
    <div class="panel with-nav-tabs panel-default m-b-0">
        <div class="panel-heading p-t-10">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab11default" data-toggle="tab">
                        @lang('General Settings')</a>
                </li>
            </ul>
        </div>
        <div class="panel-body padding-0">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab11default">
                    <div id="vue-root" class="panel panel-form m-r-10 m-l-10 m-t-0 m-b-0">
                        <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">
                            <form class="form-horizontal" method="post" action="{{ route('e-visa.settings.save') }}">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <label class="control-label col-sm-2"> @lang('Single Entry Visa Cost') </label>
                                    <div class="col-sm-5">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                            USD
                                        </span>
                                        {!! Form::number('e-visa[costs][single_entry]', settings('e-visa.costs.single_entry'), [ 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2"> @lang('Transit Visa Cost') </label>
                                    <div class="col-sm-5">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            USD
                                        </span>
                                        {!! Form::number('e-visa[costs][transit_visa]', settings('e-visa.costs.transit_visa'), [ 'class' => 'form-control']) !!}
                                    </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2"> @lang('Visa Validity (Days)') </label>
                                    <div class="col-sm-5">
                                        {!! Form::number('e-visa[visa_validity]', settings('e-visa.visa_validity'), [ 'class' => 'form-control', 'min' => 1]) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2"> @lang('Maximum Stay Period For Transport Visa (Days)') </label>
                                    <div class="col-sm-5">
                                        {!! Form::number('e-visa[transit_visa_stay_period]', settings('e-visa.transit_visa_stay_period'), [ 'class' => 'form-control', 'min' => 1]) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2"> @lang('Blacklisted Countries') </label>
                                    <div class="col-sm-5">
                                        <select-input placeholder="{{__('--Select Countries--')}}" :selected="{{json_encode(settings('e-visa.blacklisted_countries'))}}" name="e-visa[blacklisted_countries]" :multiple="true" :options="{{json_encode($country_codes)}}"></select-input>
                                        <span class="help-block">
                                            @lang('e-visa::help_blocks.blacklist')
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2"> @lang('Whitelisted Countries') </label>
                                    <div class="col-sm-5">
                                        <select-input placeholder="{{__('--Select Countries--')}}" :selected="{{json_encode(settings('e-visa.whitelisted_countries'))}}" :multiple="true" :options="{{json_encode($country_codes)}}" name="e-visa[whitelisted_countries]"></select-input>
                                        <span class="help-block">
                                            @lang('e-visa::help_blocks.whitelist')
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2"> @lang('Currency') </label>
                                    <div class="col-sm-5">
                                        <select-input :selected="{{json_encode(settings('e-visa.currency'))}}" name="e-visa[currency]" :multiple="false" :options="{{json_encode(['KES' => "Kenya Shilling", "USD" => "US Dollar"])}}"></select-input>
                                        <span class="help-block">
                                            @lang('e-visa::help_blocks.currency')
                                        </span>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary"> @lang('Update Settings') </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
<e-visa-application-form inline-template
                         :returning_to_country="{{json_encode(old('returning_to_country', $model->returning_to_country))}}"
                         :denied_entry_before="{{json_encode(old('denied_entry_before', $model->denied_entry_before))}}"
                         :denied_entry_others="{{json_encode(old('denied_entry_others', $model->denied_entry_others))}}"
                         :convicted_before="{{json_encode(old('convicted', $model->convicted_before))}}"
                         :other_recent_visits="{{json_encode(old('other_recent_visits', $model->other_recent_visits))}}"
                         :recent_visits="{{json_encode(old('recent_visits', $model->recent_visits))}}"
                         :places_to_visit="{{json_encode(old('places_to_visit', $model->places_to_visit))}}"
                         :form_errors="{{json_encode($errors->messages())}}"
>
    <div>
        <?php switch($step){
        case 1: ?>
        <div class="col-sm-6">
            <div class="form-group {{error_class($errors, 'country_of_application')}}">
                <label for="">
                    @lang('Country Of Application')
                </label>
                {!! Form::select('country_of_application', $country_codes, NULL, ['class' => 'form-control input-sm', 'placeholder' => __('--Select--')]) !!}
                {!! error_tag($errors, 'country_of_application') !!}
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group {{error_class($errors, 'applicant')}}">
                <label for="">
                    @lang('Applicant')
                </label>
                {!! Form::select('applicant', ['agent' => __('Agent'), 'spouse' => __('Spouse'), 'child' => __('Child'), 'self' => __('Self')], NULL, ['class' => 'form-control input-sm']) !!}
                {!! error_tag($errors, 'country') !!}
            </div>
        </div>
        <?php break; ?>
        <?php  case 3: ?>

        <h4 class="col-sm-12">@lang('TRAVELLER INFORMATION')</h4>
        <div class="col-sm-6">
            <div class="form-group {{error_class($errors, 'surname')}}">
                <label for="">
                    @lang('Surname/Family Name')
                </label>
                {!! Form::text('surname', null, ['class' => 'form-control input-sm']) !!}
                {!! error_tag($errors, 'surname') !!}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group {{error_class($errors, 'other_names')}}">
                <label for="">
                    @lang('Other Names in full')
                </label>
                {!! Form::text('other_names', null, ['class' => 'form-control input-sm']) !!}
                {!! error_tag($errors, 'other_names') !!}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group {{error_class($errors, 'gender')}}">
                <label for="">
                    @lang('Gender')
                </label>
                {!! Form::select('gender', ['M' => __('Male'), 'F' => __('Female'), 'other' => __('Other')], null, ['placeholder' => __('--Select--'), 'class' => 'form-control input-sm']) !!}
                {!! error_tag($errors, 'gender') !!}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group {{error_class($errors, 'date_of_birth')}}">
                <label for="">
                    @lang('Date Of Birth')
                </label>
                {!! Form::date('date_of_birth', null, ['class' => 'form-control input-sm']) !!}
                {!! error_tag($errors, 'date_of_birth') !!}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group {{error_class($errors, 'country_of_birth')}}">
                <label for="">
                    @lang('Country Of Birth')
                </label>
                {!! Form::select('country_of_birth', $country_codes, NULL, ['class' => 'form-control input-sm', 'placeholder' => __('--Select--')]) !!}
                {!! error_tag($errors, 'country_of_birth') !!}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group {{error_class($errors, 'place_of_birth')}}">
                <label for="">
                    @lang('Place Of Birth')
                </label>
                {!! Form::text('place_of_birth', null, ['class' => 'form-control input-sm']) !!}
                {!! error_tag($errors, 'place_of_birth') !!}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group {{error_class($errors, 'occupation')}}">
                <label for="">
                    @lang('Current Occupation')
                </label>
                {!! Form::text('occupation', null, ['class' => 'form-control input-sm']) !!}
                {!! error_tag($errors, 'occupation') !!}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group {{error_class($errors, 'fathers_name')}}">
                <label for="">
                    @lang("Father's Name")
                </label>
                {!! Form::text('fathers_name', null, ['class' => 'form-control input-sm']) !!}
                {!! error_tag($errors, 'fathers_name') !!}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group {{error_class($errors, 'mothers_name')}}">
                <label for="">
                    @lang("Mother's Name")
                </label>
                {!! Form::text('mothers_name', null, ['class' => 'form-control input-sm']) !!}
                {!! error_tag($errors, 'mothers_name') !!}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group {{error_class($errors, 'spouse_name')}}">
                <label for="">
                    @lang("Spouse's Name")
                </label>
                {!! Form::text('spouse_name', null, ['class' => 'form-control input-sm']) !!}
                {!! error_tag($errors, 'spouse_name') !!}
            </div>
        </div>
        <?php break; ?>
        <?php  case 2: ?>

        <h4 class="col-sm-12">@lang('NATIONALITY AND RESIDENCE')</h4>
        <div class="col-sm-6">
            <div class="form-group {{error_class($errors, 'nationality')}}">
                <label for="">
                    @lang('Current Nationality')
                </label>
                {!! Form::select('nationality', $country_codes, NULL, ['class' => 'form-control input-sm']) !!}
                {!! error_tag($errors, 'nationality') !!}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group {{error_class($errors, 'country_of_residence')}}">
                <label for="">
                    @lang('Country Of Residence')
                </label>
                {!! Form::select('country_of_residence', $country_codes, NULL, ['class' => 'form-control input-sm']) !!}
                {!! error_tag($errors, 'country_of_residence') !!}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group {{error_class($errors, 'city')}}">
                <label for="">
                    @lang('City')
                </label>
                {!! Form::text('city', NULL, ['class' => 'form-control input-sm']) !!}
                {!! error_tag($errors, 'city') !!}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group {{error_class($errors, 'physical_address')}}">
                <label for="">
                    @lang('Physical Address')
                </label>
                {!! Form::text('physical_address', NULL, ['class' => 'form-control input-sm']) !!}
                {!! error_tag($errors, 'physical_address') !!}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group {{error_class($errors, 'phone_number')}}">
                <label for="">
                    @lang('Phone Number')
                </label>
                {!! Form::text('phone_number', NULL, ['class' => 'form-control input-sm']) !!}
                {!! error_tag($errors, 'phone_number') !!}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group {{error_class($errors, 'email')}}">
                <label for="">
                    @lang('Email')
                </label>
                {!! Form::email('email', NULL, ['class' => 'form-control input-sm']) !!}
                {!! error_tag($errors, 'email') !!}
            </div>
        </div>
        <?php break; ?>
        <?php  case 4: ?>

        <h4 class="col-sm-12">@lang('PASSPORT/TRAVEL DOCUMENT')</h4>
        <div class="col-sm-6">
            <div class="form-group {{error_class($errors, 'passport_number')}}">
                <label for="">
                    @lang('Passport Number')
                </label>
                {!! Form::text('passport_number', NULL, ['class' => 'form-control input-sm']) !!}
                {!! error_tag($errors, 'passport_number') !!}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group {{error_class($errors, 'passport_place_of_issue')}}">
                <label for="">
                    @lang('Place Of Issue')
                </label>
                {!! Form::text('passport_place_of_issue', NULL, ['class' => 'form-control input-sm']) !!}
                {!! error_tag($errors, 'passport_place_of_issue') !!}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group {{error_class($errors, 'passport_date_of_issue')}}">
                <label for="">
                    @lang('Date Of Issue')
                </label>
                {!! Form::date('passport_date_of_issue', NULL, ['class' => 'form-control input-sm']) !!}
                {!! error_tag($errors, 'passport_date_of_issue') !!}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group {{error_class($errors, 'passport_date_of_expiry')}}">
                <label for="">
                    @lang('Expiry Date')
                </label>
                {!! Form::date('passport_date_of_expiry', NULL, ['class' => 'form-control input-sm']) !!}
                {!! error_tag($errors, 'passport_date_of_expiry') !!}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group {{error_class($errors, 'passport_issued_by')}}">
                <label for="">
                    @lang('Issued By')
                </label>
                {!! Form::text('passport_issued_by', NULL, ['class' => 'form-control input-sm']) !!}
                {!! error_tag($errors, 'passport_issued_by') !!}
            </div>
        </div>
        <?php break; ?>
        <?php  case 5: ?>

        <h4 class="col-sm-12">@lang('TRAVEL INFORMATION')</h4>
        <div class="col-sm-12">
            <div class="form-group {{error_class($errors, 'travel_reason')}}">
                <label for="">
                    @lang('Travel Reason')
                </label>
                {!! Form::textarea('travel_reason', null, ['class' => 'form-control input-sm', 'rows' => '3']) !!}
                {!! error_tag($errors, 'travel_reason') !!}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group {{error_class($errors, 'date_of_entry')}}">
                <label for="">
                    @lang('Proposed Date Of Entry')
                </label>
                {!! Form::date('date_of_entry', null, ['class' => 'form-control input-sm']) !!}
                {!! error_tag($errors, 'date_of_entry') !!}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group {{error_class($errors, 'date_of_departure')}}">
                <label for="">
                    @lang('Proposed Date Of Departure from Kenya')
                </label>

                {!! Form::date('date_of_departure', null, ['class' => 'form-control input-sm']) !!}
                {!! error_tag($errors, 'date_of_departure') !!}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group {{error_class($errors, 'travel_email')}}">
                <label for="">
                    @lang('Email Address while in Kenya')
                </label>
                {!! Form::text('travel_email', null, ['class' => 'form-control input-sm']) !!}
                {!! error_tag($errors, 'travel_email') !!}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group {{error_class($errors, 'travel_phone_number')}}">
                <label for="">
                    @lang('Phone Number while in Kenya')
                </label>
                {!! Form::text('travel_phone_number', null, ['class' => 'form-control input-sm']) !!}
                {!! error_tag($errors, 'travel_phone_number') !!}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group {{error_class($errors, 'arrival_by')}}">
                <label for="">
                    @lang('Arrival By')
                </label>
                {!! Form::select('arrival_by', ['air' => __('Air'), 'sea' => __('Sea'), 'road' => __('Road')],  null, ['class' => 'form-control input-sm']) !!}
                {!! error_tag($errors, 'arrival_by') !!}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group {{error_class($errors, 'entry_point')}}">
                <label for="">
                    @lang('Entry Point into Kenya')
                </label>
                {!! Form::text('entry_point', null, ['class' => 'form-control input-sm']) !!}
                {!! error_tag($errors, 'entry_point') !!}
            </div>
        </div>
        <?php break; ?>
        <?php  case 6: ?>

        <h4 class="col-sm-12">
            @lang('DETAILS OF PLACES TO VISIT IN KENYA')
        </h4>
        <div class="col-sm-12">
            <div class="col-sm-12" v-for="(place, i) in placesToVisit">
                <div class="col-sm-12 text-right">
                    <span @click.close="placesToVisit.splice(i, 1)" class="close">
                        <span class="fa fa-times-circle"></span>
                    </span>
                </div>
                <div class="col-sm-3">
                    <div class="form-group" :class="{'has-error' : form_errors['places_to_visit.'+i+'.type']}">
                        <label for="">
                            @lang('Type')
                        </label>
                        {!! Form::select(null, ['hotel' => __('Hotel'), 'firm' => __('Firm'), 'relative' => __('Relative/Friend'), 'other' => 'Other'],  '', ['class' => 'form-control input-sm',
                        ':name' => "'places_to_visit[' + i + '][type]'", 'v-model' => 'place.type']) !!}
                        <span class="help-block">
                            @{{(form_errors['places_to_visit.'+i+'.type'] || [])[0]}}
                        </span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group" :class="{'has-error' : form_errors['places_to_visit.'+i+'.name']}">
                        <label for="">
                            @lang('Name Of Place/Person')
                        </label>
                        {!! Form::text(null, '', ['v-model' => 'place.name', 'class' => 'form-control input-sm', ':name' => "'places_to_visit[' + i + '][name]'",]) !!}
                        <span class="help-block">
                            @{{(form_errors['places_to_visit.'+i+'.name'] || [])[0]}}
                        </span>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group" :class="{'has-error' : form_errors['places_to_visit.'+i+'.address']}">
                        <label for="">
                            @lang('Physical Address')
                        </label>
                        {!! Form::text(null, '', ['v-model' => 'place.address', 'class' => 'form-control input-sm', ':name' => "'places_to_visit[' + i + '][address]'",]) !!}
                        <span class="help-block">
                            @{{(form_errors['places_to_visit.'+i+'.address'] || [])[0]}}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group {{error_class($errors, 'places_to_visit')}}">
                <button @click.prevent="placesToVisit.push({type: '', name: '', address: ''})"
                        class="btn-sm btn btn-primary">
                    <span class="fa fa-plus"></span>
                    @lang('Add')
                </button>
                <br>
                {!! error_tag($errors, 'places_to_visit') !!}
            </div>
        </div>
        <div class="col-sm-12">
            <br>
        </div>
        <?php break; ?>
        <?php  case 7: ?>

        <h4 class="col-sm-12">
            @lang('TRAVEL HISTORY')
        </h4>
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @lang('Details of countries visited in last 3 months ')
                </div>
                <div class="panel-body">
                    <div class="col-sm-12" v-for="(visit, i)  in otherRecentVisits" key="visit.date">
                        <div class="col-sm-12 text-right">
                <span @click.close="otherRecentVisits.splice(i, 1)" class="close">
                    <span class="fa fa-times-circle"></span>
                </span>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group" :class="{'has-error' : form_errors['other_recent_visits.'+i+'.country']}">
                                <label for="">
                                    @lang('Country Visited')
                                </label>
                                {!! Form::select(null, $country_codes, '', ['class' => 'form-control input-sm', 'value' => '',
                                 'v-model' => 'visit.country', 'v-bind:name' => "'other_recent_visits[' + i + '][country]'"]) !!}
                                <span class="help-block">
                        @{{(form_errors['other_recent_visits.'+i+'.country'] || [])[0]}}
                    </span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group" :class="{'has-error' : form_errors['other_recent_visits.'+i+'.date']}">
                                <label for="">
                                    @lang('Date Of Visit')
                                </label>
                                {!! Form::date(null, '', ['class' => 'form-control input-sm', 'v-model' => 'visit.date', 'v-bind:name' => "'other_recent_visits[' + i + '][date]'"]) !!}
                                <span class="help-block">
                        @{{(form_errors['other_recent_visits.'+i+'.date'] || [])[0]}}
                    </span>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group" :class="{'has-error' : form_errors['other_recent_visits.'+i+'.duration']}">
                                <label for="">
                                    @lang('Duration Of Visit(Days)')
                                </label>
                                {!! Form::number(null, '', ['class' => 'form-control input-sm', 'min' => 1, 'v-model' => 'visit.duration', 'v-bind:name' => "'other_recent_visits[' + i + '][duration]'"]) !!}
                                <span class="help-block">
                        @{{(form_errors['other_recent_visits.'+i+'.duration'] || [])[0]}}
                    </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button @click.prevent="otherRecentVisits.push({country: '', date: '', duration: ''})"
                            class="btn-sm btn btn-primary">
                        <span class="fa fa-plus"></span>
                        @lang('Add')
                    </button>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @lang('Dates and Duration of previous visits to Kenya')
                </div>
                <div class="panel-body">
                    <div class="col-sm-12" v-for="(visit, i) in recentVisits" key="visit.date">
                        <div class="col-sm-12 text-right">
                    <span @click.close="recentVisits.splice(i, 1)" class="close">
                        <span class="fa fa-times-circle"></span>
                    </span>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group" :class="{'has-error' : form_errors['recent_visits.'+i+'.date']}">
                                <label for="">
                                    @lang('Date Of Visit')
                                </label>
                                {!! Form::date(null, '', ['class' => 'form-control input-sm', 'v-model' => 'visit.date', 'v-bind:name' => "'recent_visits[' + i + '][date]'"]) !!}
                                <span class="help-block">
                            @{{(form_errors['recent_visits.'+i+'.date'] || [])[0]}}
                        </span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="">
                                    @lang('Duration Of Visit')
                                </label>
                                <div class="row col-sm-12">
                                    <div class="col-sm-7" :class="{'has-error' : form_errors['recent_visits.'+i+'.duration']}">
                                        {!! Form::number(null, '', ['class' => 'form-control input-sm', 'min' => 1, 'v-model' => 'visit.duration', 'v-bind:name' => "'recent_visits[' + i + '][duration]'"]) !!}
                                        <span class="help-block">
                                    @{{(form_errors['recent_visits.'+i+'.duration'] || [])[0]}}
                                </span>
                                    </div>
                                    <div class="col-sm-5" :class="{'has-error' : form_errors['recent_visits.'+i+'.duration_type']}">
                                        {!! Form::select(null, ['days' => __('Days'), 'months' => __('Months'), 'years' => __('Years')], '',
                                        ['class' => 'form-control input-sm', 'placeholder' => __('--Select--'), 'v-model' => 'visit.duration_type', 'v-bind:name' => "'recent_visits[' + i + '][duration_type]'"]) !!}
                                        <span class="help-block">
                                    @{{(form_errors['recent_visits.'+i+'.duration_type'] || [])[0]}}
                                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button @click.prevent="recentVisits.push({duration_type: '', date: '', duration: ''})"
                            class="btn-sm btn btn-primary">
                        <span class="fa fa-plus"></span>
                        @lang('Add')
                    </button>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group {{error_class($errors, 'returning_to_country')}}">
                <label for="">
                    @lang('Will you be returning to your country of residence')
                </label>
                <div class="radio">
                    <label>
                        <input name="returning_to_country" type="radio" v-model="returningToCountry" :value="1">
                        @lang('Yes')
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input name="returning_to_country" type="radio" v-model="returningToCountry" :value="0">
                        @lang('No')
                    </label>
                </div>
                {!! error_tag($errors, 'returning_to_country') !!}
            </div>
        </div>
        <div class="col-sm-6" v-if="returningToCountry == false">
            <div class="form-group {{error_class($errors, 'no_return_reason')}}">
                <label for="">
                    @lang('Reason For Not Returning')
                </label>
                {!! Form::textarea('no_return_reason', null, ['class' => 'form-control input-sm', 'rows' => '3']) !!}
                {!! error_tag($errors, 'no_return_reason') !!}
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-6">
            <div class="form-group {{error_class($errors, 'denied_entry_before')}}">
                <label for="">
                    @lang('Have you been denied entry into Kenya before')
                </label>
                <div class="radio">
                    <label>
                        <input name="denied_entry_before" type="radio" v-model="deniedEntryBefore" :value="1">
                        @lang('Yes')
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input name="denied_entry_before" type="radio" v-model="deniedEntryBefore" :value="0">
                        @lang('No')
                    </label>
                </div>
                {!! error_tag($errors, 'denied_entry_before') !!}
            </div>
        </div>
        <div class="col-sm-6" v-if="deniedEntryBefore">
            <div class="form-group {{error_class($errors, 'denied_entry_reason')}}">
                <label for="">
                    @lang('Denial Reason')
                </label>
                {!! Form::textarea('denied_entry_reason', null, ['class' => 'form-control input-sm', 'rows' => '3']) !!}
                {!! error_tag($errors, 'denied_entry_reason') !!}
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-6">
            <div class="form-group {{error_class($errors, 'denied_entry_others')}}">
                <label for="">
                    @lang('Have you been denied entry into other countries before')
                </label>
                <div class="radio">
                    <label>
                        <input name="denied_entry_others" type="radio" v-model="deniedEntryOthers" :value="1">
                        @lang('Yes')
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input name="denied_entry_others" type="radio" v-model="deniedEntryOthers" :value="0">
                        @lang('No')
                    </label>
                </div>
                {!! error_tag($errors, 'denied_entry_others') !!}
            </div>
        </div>
        <div class="col-sm-6" v-if="deniedEntryOthers">
            <div class="form-group {{error_class($errors, 'denied_entry_others_reason')}}">
                <label for="">
                    @lang('Denial Reason')
                </label>
                {!! Form::textarea('denied_entry_others_reason', null, ['class' => 'form-control input-sm', 'rows' => '3']) !!}
                {!! error_tag($errors, 'denied_entry_others_reason') !!}
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-6">
            <div class="form-group {{error_class($errors, 'convicted_before')}}">
                <label for="">
                    @lang('Have you ever been convicted of any offence under any system of law')
                </label>
                <div class="radio">
                    <label>
                        <input name="convicted_before" type="radio" v-model="convictedBefore" :value="1">
                        @lang('Yes')
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input name="convicted_before" type="radio" v-model="convictedBefore" :value="0">
                        @lang('No')
                    </label>
                </div>
                {!! error_tag($errors, 'convicted_before') !!}
            </div>
        </div>
        <div class="col-sm-6" v-if="convictedBefore">
            <div class="form-group {{error_class($errors, 'convicted_reason')}}">
                <label for="">
                    @lang('Conviction Reason')
                </label>
                {!! Form::textarea('convicted_reason', null, ['class' => 'form-control input-sm', 'rows' => '3']) !!}
                {!! error_tag($errors, 'convicted_reason') !!}
            </div>
        </div>
        <div class="clearfix"></div>

        <?php break; ?>
        <?php case 8: ?>
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @lang('Supporting Documents')
                    </div>
                    <div class="panel-body">
                        <div class="form-group {{error_class($errors, 'passport_bio')}}">
                            <label>
                                @lang('e-visa::forms.passport_bio')
                            </label>
                            <div class="alert alert-info">
                                @lang('e-visa::help_blocks.passport_bio')
                            </div>
                            {!! Form::file('passport_bio', ['class' => 'form-control input-sm']) !!}
                            {!! error_tag($errors, 'passport_bio') !!}
                        </div>
                        <br>
                        <br>
                        <div class="form-group {{error_class($errors, 'passport_photo')}}">
                            <label>
                                @lang('e-visa::forms.passport_photo')
                            </label>
                            <div class="alert alert-info">
                                @lang('e-visa::help_blocks.passport_photo')
                            </div>
                            {!! Form::file('passport_photo', ['class' => 'form-control input-sm']) !!}
                            {!! error_tag($errors, 'passport_photo') !!}
                        </div>

                        <br>
                        <br>
                        <div class="form-group {{error_class($errors, 'additional_documents')}}">
                            <label>
                                @lang('e-visa::forms.additional_documents')
                            </label>
                            <div class="alert alert-info">
                                @lang('e-visa::help_blocks.additional_documents')
                            </div>
                            {!! Form::file('additional_documents', ['class' => 'form-control input-sm']) !!}
                            {!! error_tag($errors, 'additional_documents') !!}
                        </div>
                    </div>
                </div>

            </div>

        <?php break; ?>

        <?php } ?>

    </div>
</e-visa-application-form>

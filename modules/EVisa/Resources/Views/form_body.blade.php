<e-visa-application-form inline-template
                         :returning_to_country="{{json_encode(old('returning_to_country', $model->returning_to_country))}}"
                         :denied_entry_before="{{json_encode(old('denied_entry_before', $model->denied_entry_before))}}"
                         :denied_entry_others="{{json_encode(old('denied_entry_others', $model->denied_entry_others))}}"
                         :convicted_before="{{json_encode(old('convicted', $model->convicted_before))}}"
                         :other_recent_visits="{{json_encode(old('other_recent_visits', $model->other_recent_visits))}}"
                         :recent_visits="{{json_encode(old('recent_visits', $model->recent_visits))}}"
                         :places_to_visit="{{json_encode(old('places_to_visit', $model->places_to_visit))}}"
                         :other_recent_visits_errors="{{form_errors_to_json($errors, 'other_recent_visits', [])}}"
                         :recent_visits_errors="{{form_errors_to_json($errors, 'recent_visits', [])}}"
                         :places_to_visit_errors="{{form_errors_to_json($errors, 'places_to_visit', [])}}"
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
            <div class="row">
                <div class="col-sm-12" v-for="(place, i) in placesToVisit">
                    <div class="col-sm-12 text-right">
                        <span @click.close="placesToVisit.splice(i, 1)" class="close">
                            <span class="fa fa-times-circle"></span>
                        </span>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group {{error_class($errors, 'place_type')}}">
                            <label for="">
                                @lang('Type')
                            </label>
                            {!! Form::select(null, ['hotel' => __('Hotel'), 'firm' => __('Firm'), 'relative' => __('Relative/Friend'), 'other' => 'Other'],  '', ['class' => 'form-control input-sm',
                            ':name' => "'places_to_visit[' + i + '][type]'", 'v-model' => 'place.type']) !!}
                            {!! error_tag($errors, 'place_type') !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group {{error_class($errors, 'place_name')}}">
                            <label for="">
                                @lang('Name Of Place/Person')
                            </label>
                            {!! Form::text(null, '', ['v-model' => 'place.name', 'class' => 'form-control input-sm', ':name' => "'places_to_visit[' + i + '][name]'",]) !!}
                            {!! error_tag($errors, 'place_name') !!}
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group {{error_class($errors, 'address_of_place')}}">
                            <label for="">
                                @lang('Physical Address')
                            </label>
                            {!! Form::text(null, '', ['v-model' => 'place.address', 'class' => 'form-control input-sm', ':name' => "'places_to_visit[' + i + '][address]'",]) !!}
                            {!! error_tag($errors, 'address_of_place') !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <button @click.prevent="placesToVisit.push({type: '', name: '', address: ''})"
                                    class="btn-sm btn btn-primary">
                                <span class="fa fa-plus"></span>
                                @lang('Add')
                            </button>
                        </div>
                    </div>
                </div>
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
        <label class="col-sm-12">
            @lang('Details of countries visited in last 3 months ')
        </label>
        <div class="col-sm-12">
            <div class="row">
                <div class="place-to-visit" v-for="(visit, i)  in otherRecentVisits" key="visit.date">
                    <span @click.close="otherRecentVisits.splice(i, 1)" class="close col-sm-12 text-right">x</span>
                    <div class="col-sm-4">
                        <div class="form-group {{error_class($errors, 'other_recent_visits.1.country')}}">
                            <label for="">
                                @lang('Country Visited')
                            </label>
                            {!! Form::select('', $country_codes, '', ['class' => 'form-control input-sm', 'value' => '',
                             'v-model' => 'visit.country', 'v-bind:name' => "'other_recent_visits[' + i + '][country]'"]) !!}
                            {!! error_tag($errors, 'other_recent_visits.1.country') !!}
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group {{error_class($errors, 'other_recent_visits.1.date')}}">
                            <label for="">
                                @lang('Date Of Visit')
                            </label>
                            {!! Form::date('', '', ['class' => 'form-control input-sm', 'v-model' => 'visit.date', 'v-bind:name' => "'other_recent_visits[' + i + '][date]'"]) !!}
                            {!! error_tag($errors, 'other_recent_visits.1.date') !!}
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group {{error_class($errors, 'other_recent_visits.1.duration')}}">
                            <label for="">
                                @lang('Duration Of Visit(Days)')
                            </label>
                            {!! Form::number('', '', ['class' => 'form-control input-sm', 'min' => 1, 'v-model' => 'visit.duration', 'v-bind:name' => "'other_recent_visits[' + i + '][duration]'"]) !!}
                            {!! error_tag($errors, 'other_recent_visits.1.duration') !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <button @click.prevent="otherRecentVisits.push({country: '', date: '', duration: ''})"
                            class="btn-sm btn btn-primary">
                        <span class="fa fa-plus"></span>
                        @lang('Add')
                    </button>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <br>
        </div>
        <label for="" class="col-sm-12">
            @lang('Dates and Duration of previous visits to Kenya')
        </label>
        <div class="col-sm-12">
            <div class="row">
                <div class="place-to-visit" v-for="(visit, i) in recentVisits" key="visit.date">
                    <span @click.close="recentVisits.splice(i, 1)" class="close col-sm-12 text-right">x</span>
                    <div class="col-sm-4">
                        <div class="form-group {{error_class($errors, 'recent_visits.1.date')}}">
                            <label for="">
                                @lang('Date Of Visit')
                            </label>
                            {!! Form::date('', '', ['class' => 'form-control input-sm', 'v-model' => 'visit.date', 'v-bind:name' => "'recent_visits[' + i + '][date]'"]) !!}
                            {!! error_tag($errors, 'recent_visits.1.date') !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group {{error_class($errors, 'recent_visits.1.duration')}}">
                            <label for="">
                                @lang('Duration Of Visit')
                            </label>
                            <div class="row">
                                <div class="col-sm-7">
                                    {!! Form::number('', '', ['class' => 'form-control input-sm', 'min' => 1, 'v-model' => 'visit.duration', 'v-bind:name' => "'recent_visits[' + i + ']duration'"]) !!}
                                </div>
                                <div class="col-sm-5">
                                    {!! Form::select('', ['days' => __('Days'), 'months' => __('Months'), 'years' => __('Years')], '',
                                    ['class' => 'form-control input-sm', 'v-model' => 'visit.duration_type', 'v-bind:name' => "'visits[' + i + '][duration_type]'"]) !!}
                                </div>
                            </div>
                            {!! error_tag($errors, 'recent_visits.1.duration') !!}
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-sm-12">
                    <button @click.prevent="recentVisits.push({duration_type: '', date: '', duration: ''})"
                            class="btn-sm btn btn-primary">
                        <span class="fa fa-plus"></span>
                        @lang('Add')
                    </button>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <br>
        </div>
        <div class="col-sm-6">
            <div class="form-group {{error_class($errors, 'returning_to_country')}}">
                <label for="">
                    @lang('Will you be returning to your country of residence')
                </label>
                <div class="radio">
                    <label>
                        <input name="returning_to_country" type="radio" v-model="returningToCountry" value="Y">
                        @lang('Yes')
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input name="returning_to_country" type="radio" v-model="returningToCountry" value="N">
                        @lang('No')
                    </label>
                </div>
                {!! error_tag($errors, 'returning_to_country') !!}
            </div>
        </div>
        <div class="col-sm-6" v-if="returningToCountry == 'N'">
            <div class="form-group {{error_class($errors, 'no_return_reason')}}">
                <label for="">
                    @lang('Reason For Not Returning')
                </label>
                {!! Form::textarea('no_return_reason', '', ['class' => 'form-control input-sm', 'rows' => '3']) !!}
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
                        <input name="denied_entry_before" type="radio" v-model="deniedEntryBefore" value="Y">
                        @lang('Yes')
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input name="denied_entry_before" type="radio" v-model="deniedEntryBefore" value="N">
                        @lang('No')
                    </label>
                </div>
                {!! error_tag($errors, 'denied_entry_before') !!}
            </div>
        </div>
        <div class="col-sm-6" v-if="deniedEntryBefore == 'Y'">
            <div class="form-group {{error_class($errors, 'denied_entry_reason')}}">
                <label for="">
                    @lang('Denial Reason')
                </label>
                {!! Form::textarea('denied_entry_reason', '', ['class' => 'form-control input-sm', 'rows' => '3']) !!}
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
                        <input name="denied_entry_others" type="radio" v-model="deniedEntryOthers" value="Y">
                        @lang('Yes')
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input name="denied_entry_others" type="radio" v-model="deniedEntryOthers" value="N">
                        @lang('No')
                    </label>
                </div>
                {!! error_tag($errors, 'denied_entry_others') !!}
            </div>
        </div>
        <div class="col-sm-6" v-if="deniedEntryOthers == 'Y'">
            <div class="form-group {{error_class($errors, 'denied_entry_others_reason')}}">
                <label for="">
                    @lang('Denial Reason')
                </label>
                {!! Form::textarea('denied_entry_others_reason', '', ['class' => 'form-control input-sm', 'rows' => '3']) !!}
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
                        <input name="convicted_before" type="radio" v-model="convictedBefore" value="Y">
                        @lang('Yes')
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input name="convicted_before" type="radio" v-model="convictedBefore" value="N">
                        @lang('No')
                    </label>
                </div>
                {!! error_tag($errors, 'convicted_before') !!}
            </div>
        </div>
        <div class="col-sm-6" v-if="convictedBefore == 'Y'">
            <div class="form-group {{error_class($errors, 'convicted_reason')}}">
                <label for="">
                    @lang('Conviction Reason')
                </label>
                {!! Form::textarea('convicted_reason', '', ['class' => 'form-control input-sm', 'rows' => '3']) !!}
                {!! error_tag($errors, 'denied_entry_others_reason') !!}
            </div>
        </div>
        <div class="clearfix"></div>

        <?php break; ?>
        <?php } ?>

    </div>
</e-visa-application-form>

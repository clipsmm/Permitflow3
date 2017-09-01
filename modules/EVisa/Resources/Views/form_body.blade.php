<div id="vue-root">
    <e-visa-application-form inline-template
                             :returning_to_country="{{old('returning_to_country', $model->returning_to_country) ?: 0}}"
                             :denied_entry_before="{{old('denied_entry_before', $model->denied_entry_before) ?: 0}}"
                             :denied_entry_others="{{old('denied_entry_others', $model->denied_entry_others) ?: 0}}"
                             :convicted_before="{{old('convicted_before', $model->convicted_before) ?: 0}}"
                             :other_recent_visits="{{json_encode(old('other_recent_visits', $model->other_recent_visits))}}"
                             :recent_visits="{{json_encode(old('recent_visits', $model->recent_visits))}}"
                             :places_to_visit="{{json_encode(old('places_to_visit', $model->places_to_visit))}}"
                             :additional_documents="{{json_encode(old('additional_documents', $model->additional_documents))}}"
                             travel_reason="{{old('travel_reason', $model->travel_reason)}}"
                             arrival_by="{{old('arrival_by', $model->arrival_by)}}"
                             :form_errors="{{json_encode($errors->messages())}}"
    >
        <div>
            <?php switch($step){
            case 1: ?>
            <div id="step1" class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">@lang('NATIONALITY AND RESIDENCE')</h3>
                </div>
                <div class="panel-body">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group {{error_class($errors, 'visa_type')}}">
                            <label>
                                @lang('e-visa::forms.visa_type')
                            </label>
                            {!! Form::select('visa_type', Modules\Evisa::getVisaTypes(), NULL, ['class' => 'form-control text-black input-sm', 'placeholder' => __('--Select--')]) !!}
                            {!! error_tag($errors, 'visa_type') !!}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group {{error_class($errors, 'country_of_application')}}">
                            <label>
                                @lang('Country of Application')
                            </label>
                            {!! Form::select('country_of_application', $country_codes, NULL, ['class' => 'form-control text-black input-sm', 'placeholder' => __('--Select--')]) !!}
                            {!! error_tag($errors, 'country_of_application') !!}
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group {{error_class($errors, 'nationality')}}">
                            <label for="name_search_type">
                                @lang('Current Nationality')
                            </label>
                            {!! Form::select('nationality', $country_codes, NULL, ['class' => 'form-control text-black', 'placeholder' => __('--Select--')]) !!}
                            {!! error_tag($errors, 'nationality') !!}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group {{error_class($errors, 'country_of_residence')}}">
                            <label for="name_search_type">
                                @lang('Country of Residence')
                            </label>
                            {!! Form::select('country_of_residence', $country_codes, NULL, ['class' => 'form-control text-black', 'placeholder' => __('--Select--')]) !!}
                            {!! error_tag($errors, 'country_of_residence') !!}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group {{error_class($errors, 'city')}}">
                            <label for="name_search_type">
                                @lang('City')
                            </label>
                            {!! Form::text('city', NULL, ['class' => 'form-control text-black', 'maxlength'=>'160']) !!}
                            {!! error_tag($errors, 'city') !!}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group {{error_class($errors, 'physical_address')}}">
                            <label for="name_search_type">
                                @lang('Residence Address')
                            </label>
                            {!! Form::text('physical_address', NULL, ['class' => 'form-control text-black', 'maxlength'=>'160']) !!}
                            {!! error_tag($errors, 'physical_address') !!}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group {{error_class($errors, 'phone_number')}}">
                            <label for="name_search_type">
                                @lang('Phone Number')
                            </label>
                            <intl-telephone-input value="{{old('phone_number', $model->phone_number)}}"
                                                  name="phone_number"></intl-telephone-input>
                            {!! error_tag($errors, 'phone_number') !!}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group {{error_class($errors, 'email')}}">
                            <label for="name_search_type">
                                @lang('Email')
                            </label>
                            {!! Form::email('email', NULL, ['class' => 'form-control text-black', 'maxlength'=>'160']) !!}
                            {!! error_tag($errors, 'email') !!}
                        </div>
                    </div>
                </div>
            </div>
            <?php break; ?>

            <?php  case 2: ?>
            <div class="step-2 panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">@lang('PASSPORT/TRAVELER INFO')</h3>
                </div>
                <div class="panel-body">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group {{error_class($errors, 'surname')}}">
                            <label for="name_search_type">
                                @lang('Surname/Family Name')
                            </label>
                            {!! Form::text('surname', null, ['class' => 'form-control text-black', 'maxlength'=>'160']) !!}
                            <span class="help-block">
                                @lang('e-visa::help_blocks.match_passport')
                            </span>
                            {!! error_tag($errors, 'surname') !!}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group {{error_class($errors, 'other_names')}}">
                            <label for="name_search_type">
                                @lang('Other Names in full')
                            </label>
                            {!! Form::text('other_names', null, ['class' => 'form-control text-black',  'maxlength'=>'160']) !!}
                            <span class="help-block">
                                @lang('e-visa::help_blocks.match_passport')
                            </span>
                            {!! error_tag($errors, 'other_names') !!}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group {{error_class($errors, 'gender')}}">
                            <label for="name_search_type">
                                @lang('Gender')
                            </label>
                            {!! Form::select('gender', ['M' => __('Male'), 'F' => __('Female'), 'other' => __('Other')], null, ['placeholder' => __('--Select--'), 'class' => 'form-control text-black', 'maxlength'=>'160']) !!}
                            <span class="help-block">
                                @lang('e-visa::help_blocks.match_passport')
                            </span>
                            {!! error_tag($errors, 'gender') !!}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group {{error_class($errors, 'date_of_birth')}}">
                            <label for="name_search_type">
                                @lang('Date Of Birth')
                            </label>
                            <date-picker value="{{old('date_of_birth', $model->date_of_birth)}}"
                                         name="date_of_birth"></date-picker>
                            <span class="help-block">
                                @lang('e-visa::help_blocks.match_passport')
                            </span>
                            {!! error_tag($errors, 'date_of_birth') !!}
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group {{error_class($errors, 'country_of_birth')}}">
                            <label for="name_search_type">
                                @lang('Country Of Birth')
                            </label>
                            {!! Form::select('country_of_birth', $country_codes, NULL, ['class' => 'form-control text-black', 'placeholder' => __('--Select--'), 'maxlength'=>'160']) !!}
                            <span class="help-block">
                                @lang('e-visa::help_blocks.match_passport')
                            </span>
                            {!! error_tag($errors, 'country_of_birth') !!}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group {{error_class($errors, 'place_of_birth')}}">
                            <label for="name_search_type">
                                @lang('Place Of Birth')
                            </label>
                            {!! Form::text('place_of_birth', null, ['class' => 'form-control text-black', 'maxlength'=>'160']) !!}
                            <span class="help-block">
                                @lang('e-visa::help_blocks.match_passport')
                            </span>
                            {!! error_tag($errors, 'place_of_birth') !!}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group {{error_class($errors, 'occupation')}}">
                            <label for="name_search_type">
                                @lang('Current Occupation')
                            </label>
                            {!! Form::text('occupation', null, ['class' => 'form-control text-black', 'maxlength'=>'160']) !!}
                            <span class="help-block">
                                @lang('e-visa::help_blocks.match_passport')
                            </span>
                            {!! error_tag($errors, 'occupation') !!}
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group {{error_class($errors, 'passport_number')}}">
                            <label for="name_search_type">
                                @lang('Passport Number')
                            </label>
                            {!! Form::text('passport_number', NULL, ['class' => 'form-control text-black', 'maxlength'=>'160']) !!}
                            <span class="help-block">
                                @lang('e-visa::help_blocks.match_passport')
                            </span>
                            {!! error_tag($errors, 'passport_number') !!}
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group {{error_class($errors, 'passport_place_of_issue')}}">
                            <label for="name_search_type">
                                @lang('Place Of Issue')
                            </label>
                            {!! Form::text('passport_place_of_issue', NULL, ['class' => 'form-control text-black', 'maxlength'=>'160']) !!}
                            <span class="help-block">
                                @lang('e-visa::help_blocks.match_passport')
                            </span>
                            {!! error_tag($errors, 'passport_place_of_issue') !!}
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group {{error_class($errors, 'passport_date_of_issue')}}">
                            <label>
                                @lang('Date Of Issue')
                            </label>
                            <date-picker value="{{old('passport_date_of_issue', $model->passport_date_of_issue)}}"
                                         name="passport_date_of_issue"></date-picker>
                            <span class="help-block">
                                @lang('e-visa::help_blocks.match_passport')
                            </span>
                            {!! error_tag($errors, 'passport_date_of_issue') !!}
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group {{error_class($errors, 'passport_date_of_expiry')}}">
                            <label>
                                @lang('Expiry Date')
                            </label>
                            <date-picker value="{{old('passport_date_of_expiry', $model->passport_date_of_expiry)}}"
                                         name="passport_date_of_expiry"></date-picker>
                            <span class="help-block">
                                @lang('e-visa::help_blocks.match_passport')
                            </span>
                            {!! error_tag($errors, 'passport_date_of_expiry') !!}
                        </div>
                    </div>


                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group {{error_class($errors, 'passport_issued_by')}}">
                            <label>
                                @lang('Issued By')
                            </label>
                            {!! Form::text('passport_issued_by', NULL, ['class' => 'form-control text-black']) !!}
                            <span class="help-block">
                                @lang('e-visa::help_blocks.match_passport')
                            </span>
                            {!! error_tag($errors, 'passport_issued_by') !!}
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        @lang('Additional Information')
                    </h3>
                </div>
                <div class="panel-body">

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group {{error_class($errors, 'mothers_name')}}">
                            <label for="name_search_type">
                                @lang("Mother's Name")
                            </label>
                            {!! Form::text('mothers_name', null, ['class' => 'form-control text-black', 'maxlength'=>'160']) !!}
                            {!! error_tag($errors, 'mothers_name') !!}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group {{error_class($errors, 'spouse_name')}}">
                            <label for="name_search_type">
                                @lang("Spouse's Name")
                            </label>
                            {!! Form::text('spouse_name', null, ['class' => 'form-control text-black', 'maxlength'=>'160']) !!}
                            {!! error_tag($errors, 'spouse_name') !!}
                        </div>
                    </div>


                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group {{error_class($errors, 'fathers_name')}}">
                            <label for="name_search_type">
                                @lang("Father's Name")
                            </label>
                            {!! Form::text('fathers_name', null, ['class' => 'form-control text-black', 'maxlength'=>'160']) !!}
                            {!! error_tag($errors, 'fathers_name') !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">@lang('Attachments')</h3>
                </div>
                <div class="panel-body">
                    <div class="col-sm-12 col-xs-12">

                        <div class="form-group {{error_class($errors, 'passport_bio')}}">
                            <label>
                                @lang('e-visa::forms.passport_bio')
                            </label>
                            <div class="alert alert-info">
                                @lang('e-visa::help_blocks.passport_bio')
                            </div>
                            <file-upload field="passport_bio"
                                         :val="{{json_encode(old('passport_bio', $model->passport_bio))}}"></file-upload>
                            {!! error_tag($errors, 'passport_bio') !!}
                        </div>
                    </div>
                    <div class="col-sm-12 col-xs-12">
                        <div class="form-group {{error_class($errors, 'passport_photo')}}">
                            <label>
                                @lang('e-visa::forms.passport_photo')
                            </label>
                            <div class="alert alert-info">
                                @lang('e-visa::help_blocks.passport_photo')
                            </div>
                            <file-upload field="passport_photo"
                                         :val="{{json_encode(old('passport_photo', $model->passport_photo))}}"></file-upload>
                            {!! error_tag($errors, 'passport_photo') !!}
                        </div>

                    </div>
                </div>

            </div>

            <?php break; ?>
            <?php  case 3: ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">@lang('TRAVEL INFORMATION')</h3>
                </div>
                <div class="col-sm-12">
                    <div class="form-group {{error_class($errors, 'travel_reason')}}">
                        <label>
                            @lang('Travel Reason')
                        </label>
                        {!! Form::select('travel_reason', Modules\Evisa::getTravelReasons(), null, ['placeholder' => __('--Select--'), 'class' => 'form-control text-black', 'rows' => '3', 'v-model'=>'travelReason']) !!}
                        {!! error_tag($errors, 'travel_reason') !!}
                    </div>
                </div>
                <div v-if="travelReason == 'others'" class="col-sm-12">
                    <div class="form-group {{error_class($errors, 'other_travel_reason')}}">
                        <label>
                            @lang('Give Travel Reason if Other')
                        </label>
                        {!! Form::textarea('other_travel_reason', null, ['class' => 'form-control text-black', 'rows' => '3']) !!}
                        {!! error_tag($errors, 'other_travel_reason') !!}
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="form-group {{error_class($errors, 'date_of_entry')}}">
                        <label>
                            @lang('Proposed Date Of Entry')
                        </label>
                        <date-picker value="{{old('date_of_entry', $model->date_of_entry)}}"
                                     name="date_of_entry"></date-picker>
                        {!! error_tag($errors, 'date_of_entry') !!}
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="form-group {{error_class($errors, 'date_of_departure')}}">
                        <label>
                            @lang('Proposed Date Of Departure from Kenya')
                        </label>
                        <date-picker value="{{old('date_of_departure', $model->date_of_departure)}}"
                                     name="date_of_departure"></date-picker>
                        {!! error_tag($errors, 'date_of_departure') !!}
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="form-group {{error_class($errors, 'arrival_by')}}">
                        <label>
                            @lang('Arrival By')
                        </label>
                        {!! Form::select('arrival_by', ['air' => __('Air'), 'ship' => __('Ship'), 'road' => __('Road')],  null, ['placeholder' => __('--Select--'), 'class' => 'form-control text-black', 'v-model'=>'arrivalBy']) !!}
                        {!! error_tag($errors, 'arrival_by') !!}
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="form-group {{error_class($errors, 'entry_point')}}">
                        <label for="name_search_type">
                            @lang('Entry Point into Kenya')
                        </label>
                        <template v-if="arrivalBy == 'air'">
                            {!! Form::select('entry_point', $entry_points->where('type', 'air')->pluck('name', 'id'), null, ['class' => 'form-control text-black', 'placeholder' => __('--Select--')]) !!}
                        </template>
                        <template v-if="arrivalBy == 'road'">
                            {!! Form::select('entry_point', $entry_points->where('type', 'road')->pluck('name', 'id'), null, ['class' => 'form-control text-black', 'placeholder' => __('--Select--')]) !!}
                        </template>
                        <template v-if="arrivalBy == 'ship'">
                            {!! Form::select('entry_point', $entry_points->where('type', 'ship')->pluck('name', 'id'), null, ['class' => 'form-control text-black', 'placeholder' => __('--Select--')]) !!}
                        </template>
                        {!! error_tag($errors, 'entry_point') !!}
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        @lang('DETAILS OF PLACES TO VISIT IN KENYA')
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="form-group {{error_class($errors, 'places_to_visit')}}">
                        {!! error_tag($errors, 'places_to_visit') !!}
                    </div>
                    <div class="form-group" v-for="(place, i) in placesToVisit">
                        <div class="col-sm-12 text-right">
                            <span @click.prevent="placesToVisit.splice(i, 1)" class="close">
                                <span class="fa fa-times-circle"></span>
                            </span>
                        </div>
                        <div class="col-sm-4" :class="{'has-error' : form_errors['places_to_visit.'+i+'.type']}">
                            <label>
                                @lang('Type')
                            </label>
                            {!! Form::select(null, ['hotel' => __('Hotel'), 'firm' => __('Firm'), 'relative' => __('Relative/Friend'), 'other' => 'Other'],  '', ['placeholder' => __('--Select--'), 'class' => 'form-control text-black',
                            ':name' => "'places_to_visit[' + i + '][type]'", 'v-model' => 'place.type']) !!}
                            <span class="help-block">
                                @{{(form_errors['places_to_visit.'+i+'.type'] || [])[0]}}
                            </span>
                        </div>
                        <div class="col-sm-4" :class="{'has-error' : form_errors['places_to_visit.'+i+'.name']}">
                            <label>
                                @lang('Name Of Place/Person')
                            </label>
                            {!! Form::text(null, '', ['v-model' => 'place.name', 'class' => 'form-control text-black', ':name' => "'places_to_visit[' + i + '][name]'",]) !!}
                            <span class="help-block">
                                @{{(form_errors['places_to_visit.'+i+'.name'] || [])[0]}}
                            </span>
                        </div>
                        <div class="col-sm-4" :class="{'has-error' : form_errors['places_to_visit.'+i+'.address']}">
                            <label for="name_search_type">
                                @lang('Contact Details')
                            </label>
                            {!! Form::text(null, '', ['v-model' => 'place.address', 'class' => 'form-control text-black', ':name' => "'places_to_visit[' + i + '][address]'",]) !!}
                            <span class="help-block">
                                @{{(form_errors['places_to_visit.'+i+'.address'] || [])[0]}}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button @click.prevent="placesToVisit.push({type: '', name: '', address: ''})"
                            class="btn-sm btn btn-primary">
                        <span class="fa fa-plus"></span>
                        @lang('Add')
                    </button>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        @lang('e-visa::forms.additional_documents')
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="col-sm-12 col-xs-12">
                        <div class="form-group {{error_class($errors, 'additional_documents')}}">
                            <div class="alert alert-info">
                                @lang('e-visa::help_blocks.additional_documents')
                            </div>
                            <div v-for="(doc, i) in additionalDocuments"
                                 class="m-t-20" :key="doc ? doc.file.file_name : ''">
                                <div class="col-sm-12">
                                    <span v-if="additionalDocuments.length > 1" class="close">
                                        <span @click.prevent="additionalDocuments.splice(i, 1)"
                                              class="fa fa-times-circle"></span>
                                    </span>
                                </div>
                                <div class="col-sm-6" :class="{'has-error' : form_errors['additional_documents.'+i+'.name']}">
                                    <input class="form-control input-sm" placeholder="{{__('Attachment Name')}}" type="text" :name="'additional_documents['+ i +'][name]'" v-model="doc.name">
                                    <span class="help-block">
                                        @{{(form_errors['additional_documents.'+i+'.name'] || [])[0]}}
                                    </span>
                                </div>
                                <div class="col-sm-6" :class="{'has-error' : form_errors['additional_documents.'+i+'.file']}">
                                    <file-upload :field="'additional_documents['+ i +'][file]'" :val="doc.file"></file-upload>
                                    <span class="help-block">
                                        @{{(form_errors['additional_documents.'+i+'.file'] || [])[0]}}
                                    </span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            {!! error_tag($errors, 'additional_documents') !!}
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button @click.prevent="addDocument()"
                            class="btn-sm btn btn-primary">
                        <span class="fa fa-plus"></span>
                        @lang('Add')
                    </button>
                </div>
            </div>
            <?php break; ?>
            <?php  case 4: ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    @lang('Details of countries visited in last 3 months ')
                </div>
                <div class="panel-body">
                    <div class="form-group" v-for="(visit, i)  in otherRecentVisits" key="visit.date">
                        <div class="col-sm-12 text-right">
                        <span @click.prevent="otherRecentVisits.splice(i, 1)" class="close">
                            <span class="fa fa-times-circle"></span>
                        </span>
                        </div>
                        <div class="col-sm-4" :class="{'has-error' : form_errors['other_recent_visits.'+i+'.country']}">
                            <label>
                                @lang('Country Visited')
                            </label>
                            {!! Form::select(null, $country_codes, '', ['class' => 'form-control input-sm', 'value' => '',
                            'v-model' => 'visit.country', 'v-bind:name' => "'other_recent_visits[' + i + '][country]'", 'placeholder' => __('--Select--')]) !!}
                            <span class="help-block">
                            @{{(form_errors['other_recent_visits.'+i+'.country'] || [])[0]}}
                        </span>
                        </div>

                        <div class="col-sm-3" :class="{'has-error' : form_errors['other_recent_visits.'+i+'.date']}">
                            <label>
                                @lang('Date Of Visit')
                            </label>
                            <date-picker v-model="visit.date"
                                         :name="'other_recent_visits[' + i + '][date]'"></date-picker>
                            <span class="help-block">
                            @{{(form_errors['other_recent_visits.'+i+'.date'] || [])[0]}}
                        </span>
                        </div>

                        <div class="col-sm-5"
                             :class="{'has-error' : form_errors['other_recent_visits.'+i+'.duration']}">
                            <label for="name_search_type">
                                @lang('Duration Of Visit(Days)')
                            </label>
                            {!! Form::number(null, '', ['class' => 'form-control input-sm', 'maxlength'=>'160', 'min' => 1, 'v-model' => 'visit.duration', 'v-bind:name' => "'other_recent_visits[' + i + '][duration]'"]) !!}
                            <span class="help-block">
                            @{{(form_errors['other_recent_visits.'+i+'.duration'] || [])[0]}}
                        </span>
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

            <div class="panel panel-default">
                <div class="panel-heading">
                    @lang('Dates and Duration of previous visits to Kenya')
                </div>
                <div class="panel-body">
                    <div class="form-group" v-for="(visit, i) in recentVisits" key="visit.date">
                        <div class="col-sm-12 text-right">
                            <span @click.prevent="recentVisits.splice(i, 1)" class="close">
                                <span class="fa fa-times-circle"></span>
                            </span>
                        </div>
                        <div class="col-sm-4" :class="{'has-error' : form_errors['recent_visits.'+i+'.date']}">
                            <label>
                                @lang('Date Of Visit')
                            </label>
                            <date-picker v-model="visit.date"
                                         :name="'recent_visits[' + i + '][date]'"></date-picker>
                            <span class="help-block">
                                @{{(form_errors['recent_visits.'+i+'.date'] || [])[0]}}
                            </span>
                        </div>

                        <div class="col-sm-4" :class="{'has-error' : form_errors['recent_visits.'+i+'.duration']}">
                            <label>
                                @lang('Duration Of Visit')
                            </label>
                            {!! Form::number(null, '', ['class' => 'form-control input-sm', 'min' => 1, 'v-model' => 'visit.duration', 'v-bind:name' => "'recent_visits[' + i + '][duration]'"]) !!}
                            <span class="help-block">
                                @{{(form_errors['recent_visits.'+i+'.duration'] || [])[0]}}
                            </span>
                        </div>

                        <div class="col-sm-4" :class="{'has-error' : form_errors['recent_visits.'+i+'.duration_type']}">
                            <label>
                                @lang('Duration Type')
                            </label>
                            {!! Form::select(null, ['days' => __('Days'), 'months' => __('Months'), 'years' => __('Years')], '',
                            ['class' => 'form-control input-sm', 'placeholder' => __('--Select--'), 'v-model' => 'visit.duration_type', 'v-bind:name' => "'recent_visits[' + i + '][duration_type]'"]) !!}
                            <span class="help-block">
                                @{{(form_errors['recent_visits.'+i+'.duration_type'] || [])[0]}}
                            </span>
                        </div>
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

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group {{error_class($errors, 'returning_to_country')}}">
                    <label for="name_search_type">
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
                    <label for="name_search_type">
                        @lang('Reason For Not Returning')
                    </label>
                    {!! Form::textarea('no_return_reason', null, ['class' => 'form-control text-black', 'maxlength'=>'160','rows' => '3']) !!}
                    {!! error_tag($errors, 'no_return_reason') !!}
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group {{error_class($errors, 'denied_entry_before')}}">
                    <label for="name_search_type">
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
                    <label for="name_search_type">
                        @lang('Denial Reason')
                    </label>
                    {!! Form::textarea('denied_entry_reason', null, ['class' => 'form-control text-black','maxlength'=>'160',  'rows' => '3']) !!}
                    {!! error_tag($errors, 'denied_entry_reason') !!}
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group {{error_class($errors, 'denied_entry_others')}}">
                    <label for="name_search_type">
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
                    <label for="name_search_type">
                        @lang('Denial Reason')
                    </label>
                    {!! Form::textarea('denied_entry_others_reason', null, ['class' => 'form-control text-black', 'maxlength'=>'160','rows' => '3']) !!}
                    {!! error_tag($errors, 'denied_entry_others_reason') !!}
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group {{error_class($errors, 'convicted_before')}}">
                    <label for="name_search_type">
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
                    <label for="name_search_type">
                        @lang('Conviction Reason')
                    </label>
                    {!! Form::textarea('convicted_reason', null, ['class' => 'form-control text-black', 'maxlength'=>'160', 'rows' => '3']) !!}
                    {!! error_tag($errors, 'convicted_reason') !!}
                </div>
            </div>
            <div class="clearfix"></div>

            <?php break; ?>
            <?php } ?>
        </div>
    </e-visa-application-form>
</div>
<div class="col-sm-12">
    @if(!isset($application))
        <div class="form-group pull-right {{error_class($errors, 'g-recaptcha-response')}}">
            {!! app('captcha')->display(); !!}
            <br>
            {!! error_tag($errors, 'g-recaptcha-response') !!}
        </div>
        <div class="clearfix"></div>
    @endif
</div>
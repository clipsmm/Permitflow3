<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            @lang('VISA INFORMATION:')
        </h3>
    </div>
    <div class="panel-body no-padding ">
        <table class="table table-hover table-special table-striped m-b-0">
            <thead>
            <tr>
                <th>@lang('VISA TYPE')</th>
                <th>@lang('REF NO')</th>
                <th>@lang('DATE OF ISSUE')</th>
                <th>@lang('EXPIRY DATE')</th>
            </tr>
            </thead>
            <tbody>
            <tr class=' '>
                <td>{{array_get(Modules\Evisa::getVisaTypes(), $model->visa_type)}}</td>
                <td>{{ $application->application_number }}</td>
                <td>{{ $application->get_data('date_of_issue','') }}</td>
                <td>{{ $application->get_data('passport_date_of_expiry','') }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            @lang('VISITOR INFORMATION:')
        </h3>
    </div>
    <div class="panel-body no-padding">
        <table class="table table-bordered m-b-0" style="border-top: 0 !important;">

            <tbody>

            <tr class=' '>
                <td width="25%" style="vertical-align: middle !important;">
                    <div class="thumbnail no-border m-t-0 m-b-5 m-l-5 m-r-0">
                        <img class="img-responsive hidden-xs"
                             src="{{ $application->get_data('passport_photo', null) && gettype($application->get_data('passport_photo')) == 'string' ? asset($application->get_data('passport_photo', '')) : asset('images/person.png') }}">
                    </div>
                </td>
                <td width="75%" class="no-padding" style="border-top: 0 !important;">
                    <table class="table m-b-0" >
                        <tbody>

                        <tr class=' '>
                            <td class="text-uppercase " align="left"><b>@lang("Full Name")
                                    : </b> {{ $application->get_data('other_names') }} {{ $application->get_data('surname') }}
                            </td>
                        </tr>
                        <tr class=' '>
                            <td class="text-uppercase " align="left"><b>@lang("Date of Birth")
                                    : </b> {{ $application->get_data('date_of_birth') }} </td>
                        </tr>
                        <tr class=' '>
                            <td class="text-uppercase" align="left"><b>@lang("Passport No.")
                                    : </b> {{ $application->get_data('passport_number') }}</td>
                        </tr>
                        <tr class=' '>
                            <td class="text-uppercase" align="left"><b>@lang("Nationality")
                                    : </b> {{ array_get($lookup_data['country_codes'], $model->nationality)  }}</td>
                        </tr>
                        <tr class=' '>
                            <td class="text-uppercase" align="left"><b>@lang("Gender")
                                    : </b> {{ $application->get_data('gender')  }}</td>
                        </tr>
                        <tr class=' '>
                            <td class="text-uppercase" align="left"><b>@lang("Passport Date of Issue")
                                    : </b> {{ $application->get_data('passport_date_of_issue') }}</td>
                        </tr>
                        <tr class=' '>
                            <td class="text-uppercase" align="left"><b>@lang("Passport Place of Issue")
                                    : </b> {{ $application->get_data('passport_place_of_issue')  }}</td>
                        </tr>
                        <tr class=' '>
                            <td class="text-uppercase" align="left"><b>@lang("Passport Expiry Date")
                                    : </b> {{ $application->get_data('passport_date_of_expiry') }}</td>
                        </tr>
                        <tr class=' '>
                            <td class="text-uppercase" align="left"><b>@lang("Passport Issued By")
                                    : </b> {{ $application->get_data('passport_issued_by') }}</td>
                        </tr>

                        </tbody>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">@lang('e-visa::common.traveler_info')</h3>
    </div>
    <div class="panel-body">
        <table class="table table-bordered">
            <tbody>
            <tr class=' '>
                <td class="no-padding" width="50%">
                    <table class="table m-b-0">
                        <thead>
                        <tr>
                            <th class="text-uppercase">@lang("Traveler Information")</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class=' '>
                            <td class="text-uppercase">
                                <b>@lang('Place of Birth'):</b> {{ $application->get_data('place_of_birth') }}
                            </td>
                        </tr>
                        <tr class=' '>
                            <td class="text-uppercase">
                                <b>@lang("Country of Birth")
                                    :</b> {{ array_get($lookup_data['country_codes'], $model->country_of_birth)  }}
                            </td>
                        </tr>
                        <tr class=' '>
                            <td class="text-uppercase">
                                <b>@lang("Current Occupation")</b> {{ $application->get_data('occupation') }}
                            </td>
                        </tr>
                        <tr class=' '>
                            <td class="text-uppercase">
                                <b>@lang("Father's Name"): </b>{{ $application->get_data('fathers_name') }}
                            </td>
                        </tr>
                        <tr class=' '>
                            <td class="text-uppercase">
                                <b>@lang("Mothers Name"):</b> {{ $application->get_data('mothers_name') }}
                            </td>
                        </tr>
                        <tr class=' '>
                            <td class="text-uppercase">
                                <b>@lang("Spouse Name"):</b> {{ $application->get_data('spouse_name') }}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
                <td class="no-padding" width="50%">
                    <table class="table m-b-0">
                        <thead>
                        <tr>
                            <th class="text-uppercase">@lang("Nationality and Residence")</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class=' '>
                            <td class="text-uppercase">
                                <b>@lang("Current Nationality")
                                    :</b> {{ array_get($lookup_data['country_codes'], $model->nationality)  }}
                            </td>
                        </tr>
                        <tr class=' '>
                            <td class="text-uppercase">
                                <b>@lang("Country of Residence")
                                    :</b> {{ array_get($lookup_data['country_codes'], $model->country_of_residence)  }}
                            </td>
                        </tr>
                        <tr class=' '>
                            <td class="text-uppercase">
                                <b>@lang("Residential Address")
                                    :</b> {{ $application->get_data('physical_address') }}
                            </td>
                        </tr>
                        <tr class=' '>
                            <td class="text-uppercase">
                                <b>@lang("Phone Number"): </b> {{ $application->get_data('phone_number') }}
                            </td>
                        </tr>
                        <tr class=' '>
                            <td class="text-uppercase">
                                <b>@lang("City / Town"):</b> {{ $application->get_data('city') }}
                            </td>
                        </tr>
                        <tr class=' '>
                            <td class="text-uppercase">
                                <b>@lang("Email"): </b> {{$application->get_data('email') }}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
</div>


<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">@lang('Travel Information')</h3>
    </div>
    <div class="panel-body">
        <table class="table table-hover table-special table-striped">
            <tbody>
            @if($application->get_data('visa_type')  != 'transit_visa')
                <tr class=' '>
                    <td class="big-data width-40">
                        <h1>Reason For Travel </h1>
                    </td>
                    <td class="hidden-xs hidden-sm">
                        {{ $application->get_data('travel_reason') ? array_get($lookup_data['travel_reasons'], $application->get_data('travel_reason')) : ''  }}
                    </td>
                </tr>
            @endif
            @if($model->travel_reason == 'other')
                <tr class=' '>
                    <td class="big-data width-40">
                        <h1>Reason For Travel(If Other)</h1>
                    </td>
                    <td class="hidden-xs hidden-sm">
                        {{ $model->other_travel_reason  }}
                    </td>
                </tr>
            @endif
            <tr class=' '>
                <td class="big-data width-40">
                    <h1>Proposed Date of Entry</h1>
                </td>
                <td class="hidden-xs hidden-sm">{{ $application->get_data('date_of_entry') }}</td>
            </tr>
            <tr class=' '>
                <td class="big-data width-40">
                    <h1>Proposed Date of Departure from Kenya</h1>
                </td>
                <td class="hidden-xs hidden-sm">{{ $application->get_data('date_of_departure') }}</td>
            </tr>
            <tr class=' '>
                <td class="big-data width-40">
                    <h1>Telephone/Cell no</h1>
                </td>
                <td>
                    {{ $application->get_data('travel_phone_number') }}
                </td>
            </tr>
            <tr class=' '>
                <td class="big-data width-40">
                    <h1>Email</h1>
                </td>
                <td>
                    {{ $application->get_data('travel_email') }}
                </td>
            </tr>
            <tr class=' '>
                <td class="big-data width-40">
                    <h1>Arriving by</h1>
                </td>
                <td>
                    {{ $application->get_data('arrival_by') }}
                </td>
            </tr>
            </tbody>
        </table>
        <h5>Full names and Physical address of Hotels / Places / Firms / Friends or Relatives to be visited in
            Kenya</h5>
        @foreach($application->get_data('places_to_visit', []) as $place)
            <div class="col-sm-4">
                <strong>
                    Type:
                </strong> {{$place['type']}}
            </div>
            <div class="col-sm-4">
                <strong>
                    Name:
                </strong>
                {{$place['name']}}
            </div>
            <div class="col-sm-4">
                <strong>
                    Address:
                </strong>
                {{$place['address']}}
            </div>
            <div class="clearfix"></div>
        @endforeach
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">@lang('Travel History')</h3>
    </div>
    <div class="panel-body">
        <h5>Dates and Duration of recent visits to other countries in the last 3 months</h5>
        @foreach($application->get_data('other_recent_visits', []) as $visit)
            <div class="col-sm-4">
                <strong>
                    Date:
                </strong> {{$visit['date']}}
            </div>
            <div class="col-sm-4">
                <strong>
                    Country:
                </strong> {{ array_get($lookup_data['country_codes'], $visit['country']) }}
            </div>
            <div class="col-sm-4">
                <strong>
                    Duration:
                </strong> {{ $visit['duration'] }} Day(s)
            </div>
            <div class="clearfix"></div>
        @endforeach
        <br>
        <h5>Dates and Duration of previous visits to Kenya</h5>
        @foreach($application->get_data('recent_visits', []) as $visit)
            <div class="col-sm-4">
                <strong>
                    Date:
                </strong> {{$visit['date']}}
            </div>
            <div class="col-sm-4">
                <strong>
                    Duration:
                </strong> {{ $visit['duration'] }} {{ $visit['duration_type'] }}
            </div>
            <div class="clearfix"></div>
        @endforeach

        <table class="table table-hovertable-special table-striped ">
            <tbody>
            <tr class=' '>
                <td class="big-data width-40">
                    <h5>Will you be returning to your Country of Residence/Domicile?</h5>
                </td>
                <td class="hidden-xs hidden-sm"><a href="#"
                                                   class="btn btn-xs btn-default">{{ $application->get_data('returning_to_country') ? 'YES' : 'NO' }}</a>
                </td>
            </tr>
            <tr class=' '>
                <td class="big-data width-40">
                    <h5>Have you been previously denied entry into Kenya? If yes state when and give reasons for
                        denial</h5>
                </td>
                <td>
                    <a href="#" class="btn btn-xs btn-default">
                        {{ $application->get_data('denied_entry_before') ? 'YES' : 'NO' }}
                    </a>
                </td>
            </tr>
            <tr class=' '>
                <td class="big-data width-40">
                    <h5>Have you been previously denied entry into another Country? If yes state when and give reasons
                        for denial</h5>
                </td>
                <td>
                    <a href="#" class="btn btn-xs btn-default">
                        {{ $application->get_data('denied_entry_others') ? 'YES' : 'NO' }}
                    </a>
                </td>
            </tr>
            <tr class=' '>
                <td class="big-data width-40">
                    <h5>Have you ever been convicted of any offence under any system of law? If yes give offense and
                        penalty?</h5>
                </td>
                <td>
                    <a href="#" class="btn btn-xs btn-default">
                        {{ $application->get_data('convicted_before') ? 'YES' : 'NO'     }}
                    </a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">@lang('Supporting Documents')</h3>
    </div>
    <div class="panel-body">
        <table class="table table-hover table-special table-striped">
            <tbody>
            <tr class=' '>
                <td class="big-data width-40">
                    <h1>
                        @lang('Scanned Passport')
                    </h1>
                </td>
                <td class="hidden-xs hidden-sm">
                    <a target="_blank"
                       href="{{route('frontend.applications.download_attachment', ['attachment' => $application->get_data('passport_photo.path')])}}">
                        {{ $application->get_data('passport_photo.file_name') }}
                    </a>
                </td>
            </tr>
            <tr class=' '>
                <td class="big-data width-40">
                    <h1>
                        @lang('Scaned Invitation Letters/Additional Documents')
                    </h1>
                </td>
                <td class="hidden-xs hidden-sm">
                    @foreach($application->get_data('additional_documents', []) as $doc)
                        {{array_get($doc, 'name')}}:
                        <a target="_blank"
                           href="{{route('frontend.applications.download_attachment', ['attachment' => array_get($doc, 'file.path')])}}">
                            {{ array_get($doc, 'file.file_name') }}
                        </a>
                        <br>
                    @endforeach
                </td>
            </tr>
            <tr class=' '>
                <td class="big-data width-40">
                    <h1>
                        @lang('Scanned Host ID card')
                    </h1>
                </td>
                <td class="hidden-xs hidden-sm">
                    <a target="_blank"
                       href="{{route('frontend.applications.download_attachment', ['attachment' => $application->get_data('passport_bio.path')])}}">
                        {{ $application->get_data('passport_bio.file_name')}}
                    </a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>


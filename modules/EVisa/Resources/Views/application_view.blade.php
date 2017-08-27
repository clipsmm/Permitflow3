{{--<li class="active"><a href="#tab11default" data-toggle="tab">@lang('e-visa::common.single_entry_visa')</a></li>--}}
{{--<li><a href="#tab22default" data-toggle="tab">@lang('e-visa::common.traveler_info')</a></li>--}}
{{--<li><a href="#tab33default" data-toggle="tab">@lang('Nationality and Residence')</a></li>--}}
{{--<li><a href="#tab44default" data-toggle="tab">@lang('Passport / Travel Documents')</a></li>--}}
{{--<li><a href="#tab55default" data-toggle="tab">@lang('Travel Information')</a></li>--}}
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Single Entry Visa</h3>
    </div>
    <table class="table table-special m-b-0 b-b-0">
        <tbody>
        <tr class=' '>
            <td class="big-data width-40">
                <h1>Where are you making this application from?</h1>
            </td>
            <td class="hidden-xs hidden-sm">{{ $application->get_data('country_of_application') }}</td>
        </tr>
        <tr class=' '>
            <td class="big-data width-40">
                <h1>applying for yourself or for your Child:</h1>
            </td>
            <td class="hidden-xs hidden-sm">{{ $application->get_data('applicant') }}</td>
        </tr>
        </tbody>
    </table>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Traveler Information</h3>
    </div>
    <table class="table table-special m-b-0 b-b-0">
        <tbody>
        <tr class=' '>
            <td class="big-data width-40">
                <h1>Surname / Family Name:</h1>
            </td>
            <td class="hidden-xs hidden-sm">{{ $application->get_data('surname') }}</td>
        </tr>
        <tr class=' '>
            <td class="big-data width-40">
                <h1>Other Names in Full:</h1>
            </td>
            <td class="hidden-xs hidden-sm">{{ $application->get_data('other_names') }}</td>
        </tr>
        <tr class=' '>
            <td class="big-data width-40">
                <h1>Gender</h1>
            </td>
            <td class="hidden-xs hidden-sm">{{ $application->get_data('gender') }}</td>
        </tr>
        <tr class=' '>
            <td class="big-data width-40">
                <h1>Date of Birth</h1>
            </td>
            <td>
                <a href="#" class="btn btn-xs btn-default">
                {{ $application->get_data('date_of_birth') }}
            </td>
        </tr>
        <tr class=' '>
            <td class="big-data width-40">
                <h1>Place of Birth</h1>
            </td>
            <td>
                {{ $application->get_data('place_of_birth') }}
            </td>
        </tr>
        <tr class=' '>
            <td class="big-data width-40">
                <h1>Country of Birth</h1>
            </td>
            <td>
                {{ $application->get_data('country_of_birth') }}
            </td>
        </tr>
        <tr class=' '>
            <td class="big-data width-40">
                <h1>Current occupation</h1>
            </td>
            <td>
                {{ $application->get_data('occupation') }}
            </td>
        </tr>
        <tr class=' '>
            <td class="big-data width-40">
                <h1>Fathers Name</h1>
            </td>
            <td>
                {{ $application->get_data('fathers_name') }}
            </td>
        </tr>
        <tr class=' '>
            <td class="big-data width-40">
                <h1>Mothers Name</h1>
            </td>
            <td>
                {{ $application->get_data('mothers_name') }}
            </td>
        </tr>
        <tr class=' '>
            <td class="big-data width-40">
                <h1>Spouse Name</h1>
            </td>
            <td>
                {{ $application->get_data('spouse_name') }}
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Nationality and  Residence</h3>
    </div>
    <table class="table table-special m-b-0 b-b-0">
        <tbody>
        <tr class=' '>
            <td class="big-data width-40">
                <h1>Current Nationality</h1>
            </td>
            <td class="hidden-xs hidden-sm">{{ $application->get_data('nationality') }}</td>
        </tr>
        <tr class=' '>
            <td class="big-data width-40">
                <h1>Country of Residence</h1>
            </td>
            <td class="hidden-xs hidden-sm">{{ $application->get_data('country_of_residence') }}</td>
        </tr>
        <tr class=' '>
            <td class="big-data width-40">
                <h1>Physical address in the Country of Residence</h1>
            </td>
            <td class="hidden-xs hidden-sm">{{ $application->get_data('physical_address') }}</td>
        </tr>
        <tr class=' '>
            <td class="big-data width-40">
                <h1>Phone Number</h1>
            </td>
            <td>
                <a href="#" class="btn btn-xs btn-default">
                {{ $application->get_data('phone_number') }}
            </td>
        </tr>
        <tr class=' '>
            <td class="big-data width-40">
                <h1>City / Town</h1>
            </td>
            <td>
                {{ $application->get_data('city') }}
            </td>
        </tr>
        <tr class=' '>
            <td class="big-data width-40">
                <h1>Email</h1>
            </td>
            <td>
                {{$application->get_data('email') }}
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Passport /Travel Documents</h3>
    </div>
    <table class="table table-special m-b-0 b-b-0">
        <tbody>
        <tr class=' '>
            <td class="big-data width-40">
                <h1>Passport Number </h1>
            </td>
            <td class="hidden-xs hidden-sm">{{ $application->get_data('passport_number') }}</td>
        </tr>
        <tr class=' '>
            <td class="big-data width-40">
                <h1>Place of issue</h1>
            </td>
            <td class="hidden-xs hidden-sm">{{ $application->get_data('passport_place_of_issue') }}</td>
        </tr>
        <tr class=' '>
            <td class="big-data width-40">
                <h1>Date of Issue</h1>
            </td>
            <td class="hidden-xs hidden-sm">{{ $application->get_data('passport_date_of_issue') }}</td>
        </tr>
        <tr class=' '>
            <td class="big-data width-40">
                <h1>Expiry date</h1>
            </td>
            <td>
                <a href="#" class="btn btn-xs btn-default">
                {{ $application->get_data('passport_date_of_expiry') }}
            </td>
        </tr>
        <tr class=' '>
            <td class="big-data width-40">
                <h1>Issued by</h1>
            </td>
            <td>
                {{  $application->get_data('passport_issued_by')  }}
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Travel Information</h3>
    </div>
    <table class="table table-special m-b-0 b-b-0">
        <tbody>
        <tr class=' '>
            <td class="big-data width-40">
                <h1>Reason For Travel </h1>
            </td>
            <td class="hidden-xs hidden-sm">{{ $application->get_data('travel_reason') }}</td>
        </tr>
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
                <h1>Full names and Physical address of Hotels / Places / Firms / Friends or Relatives to be visited in Kenya</h1>
            </td>
            <td>
                <a href="#" class="btn btn-xs btn-default">
                {{ $application->get_data('date_of_departure') }}
            </td>
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
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Travel History</h3>
    </div>
    <table class="table table-special m-b-0 b-b-0">
        <tbody>
        <tr class=' '>
            <td class="big-data width-40">
                <h1>Dates and Duration of recent visits to other countries in the last 3 months</h1>
            </td>
            <td class="hidden-xs hidden-sm">{{ $application->get_data('recent_visits["date"]["duration"]["duration_type"]]') }}</td>
        </tr>
        <tr class=' '>
            <td class="big-data width-40">
                <h1>Dates and Duration of previous visits to Kenya</h1>
            </td>
            <td class="hidden-xs hidden-sm">{{ $application->get_data('other_recent_visits["date", "country", "duration"]') }}</td>
        </tr>
        <tr class=' '>
            <td class="big-data width-40">
                <h1>Will you be returning to your Country of Residence/Domicile?</h1>
            </td>
            <td class="hidden-xs hidden-sm">{{ $application->get_data('returning_to_country') }}</td>
        </tr>
        <tr class=' '>
            <td class="big-data width-40">
                <h1>Have you been previously denied entry into Kenya? If yes state when and give reasons for denial</h1>
            </td>
            <td>
                <a href="#" class="btn btn-xs btn-default">
                {{ $application->get_data('denied_entry_before') }}
            </td>
        </tr>
        <tr class=' '>
            <td class="big-data width-40">
                <h1>Have you been previously denied entry into another Country? If yes state when and give reasons for denial</h1>
            </td>
            <td>
                {{ $application->get_data('denied_entry_others') }}
            </td>
        </tr>
        <tr class=' '>
            <td class="big-data width-40">
                <h1>Have you ever been convicted of any offence under any system of law? If yes give offense and penalty?</h1>
            </td>
            <td>
                {{ $application->get_data('convicted_before') }}
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Supporting Documents</h3>
    </div>
    <table class="table table-special m-b-0 b-b-0">
        <tbody>
        <tr class=' '>
            <td class="big-data width-40">
                <h1>Scaned Passport</h1>
            </td>
            <td class="hidden-xs hidden-sm">{{ $application->get_data('passport_photo[]') }}</td>
        </tr>
        <tr class=' '>
            <td class="big-data width-40">
                <h1> Scaned Invitation Letter</h1>
            </td>
            <td class="hidden-xs hidden-sm">{{ $application->get_data('additional_documents[]') }}</td>
        </tr>
        <tr class=' '>
            <td class="big-data width-40">
                <h1>Scaned Host ID card</h1>
            </td>
            <td class="hidden-xs hidden-sm">{{ $application->get_data('passport_bio[]') }}</td>
        </tr>
        </tbody>
    </table>
</div>
@extends('layouts.preview')
@section('body')

<div class="panel panel-default">
    <div class="panel-body">
<link href="http://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css" />
        <div class="panel panel-default">
            <table border-spacing="0" cellpadding="0" cellspacing="0" style="margin-bottom: 15px; border-bottom:1px solid #000; width:100%; font-family: 'Roboto', sans-serif; font-size:13px; text-align:left; text-transform:uppercase;">
                <tbody>
                <tr style="text-align:center;">
                    <td style="vertical-align:center; text-align:left;width:30%;"><img alt="" src="https://immigration.ecitizen.go.ke/asset_uplds/c3cecc9eea393d078906edbb50ecb481949a8257.png" style="margin-top:10px; margin-bottom:10px;" /></td>
                    <td style="vertical-align:center; text-align:center;width:30%;">
                        <h1 style="font-size:40px;background:#f2f2f2;padding:10px;line-height:1.0em;"><span style="background:#f2f2f2;">eVisa</span></h1>
                    </td>
                    <td style="vertical-align:center; text-align:right;width:30%;">
                        <p style="margin-bottom:0; padding-bottom:10px; font-family: 'Roboto', sans-serif;font-size:12px; padding-right:20px;"><strong>dis@immigration.go.ke,<br />
                                www.immigration.go.ke,<br />
                                +254-20-2222022,<br />
                                +254-20-2217544,<br />
                                +254-20-2218833.</strong></p>
                    </td>
                </tr>
                <tr style="text-align:right;">
                    <td colspan="3" style="text-align:right;border-top:1px solid;padding-top:10px;padding-bottom:10px;padding-right:10px;">
                        <p style="font-family: 'Roboto', sans-serif; font-size:15px; padding:0px; margin:0;margin-right:10px;line-height:0;line-height:1.0em;"><strong>SELF</strong> Application</p>

                        <p style="font-family: 'Roboto', sans-serif; font-size:15px; padding:0px; margin:0;margin-right:10px;margin-top:4px;line-height:0;line-height:1.0em;padding-bottom:10px;">
                            <strong style="line-height: 1em;">
                                <img src="{{$application->getBarcode()}}" alt="barcode"   />
                            </strong>
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>
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
                        {{--<td>{{array_get(Modules\Evisa::getVisaTypes(), $model->visa_type)}}</td>--}}
                        <td>kkdjfkskgjskjkgsj</td>
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
                                     src="{{ asset('images/profile.jpg') }}">
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
                                            : </b> </td>
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


<table border-spacing="0" cellpadding="0" cellspacing="0" style="margin-bottom: 0px; width:100%; font-family: 'Roboto', sans-serif;text-transform:uppercase;">
    <tbody>
    <tr>
        <td style="text-align:center;">
            <h4 style="font-family: 'Roboto', sans-serif; font-weight:bold; font-size:15px; padding:0px; margin:0;line-height:1.0em;">VISA INFORMATION</h4>
        </td>
    </tr>
    </tbody>
</table>

<table border-spacing="0" cellpadding="0" cellspacing="0" style="margin:10px; width:100%; font-family: 'Roboto', sans-serif; font-size:13px; text-transform:uppercase;border:1px solid;">
    <tbody>
    <tr>
        <td style="text-align:left; border-bottom:1px solid;  border-right:1px solid; padding:5px;background:#f2f2f2;">
            <p style="text-align:left;font-family: 'Roboto', sans-serif; font-size:13px; text-align:left; padding:0px; margin:0;line-height:1.0em;"><strong>Number</strong></p>
        </td>
        <td style="text-align:left;border-bottom:1px solid;border-right:1px solid; padding:5px;background:#f2f2f2;">
            <p style="text-align:left;font-family: 'Roboto', sans-serif; font-size:13px; text-align:left; padding:0px; margin:0;line-height:1.0em;"><strong>Visa Type</strong></p>
        </td>
        <td style="text-align:left;border-bottom:1px solid;border-right:1px solid; padding:5px;background:#f2f2f2;">
            <p style="text-align:left;font-family: 'Roboto', sans-serif; font-size:13px; text-align:left; padding:0px; margin:0;line-height:1.0em;"><strong>Date of Issue</strong></p>
        </td>
        <td style="text-align:left;border-bottom:1px solid; padding:5px;background:#f2f2f2;">
            <p style="text-align:left;font-family: 'Roboto', sans-serif; font-size:13px; text-align:left; padding:0px; margin:0;line-height:1.0em;"><b>DATE OF PLANNED ARRIVAL IN KENYA</b></p>
        </td>
    </tr>
    <tr>
        <td style="text-align:left; border-bottom:1px solid;  border-right:1px solid; padding:5px;">
            <p style="text-align:left;font-family: 'Roboto', sans-serif; font-size:13px; text-align:left; padding:0px; margin:0;line-height:1.0em;">{{$application->application_number}}</p>
        </td>
        <td style="text-align:left;border-bottom:1px solid; border-right:1px solid; padding:5px;">
            <p style="text-align:left;font-family: 'Roboto', sans-serif; font-size:13px; text-align:left; padding:0px; margin:0;line-height:1.0em;">Single Entry</p>
        </td>
        <td style="text-align:left;border-bottom:1px solid;border-right:1px solid; padding:5px;">
            {{--<p style="text-align:left;font-family: 'Roboto', sans-serif; font-size:13px; text-align:left; padding:0px; margin:0;line-height:1.0em;">{{$task->completed_at}}</p>--}}
        </td>
        <td style="text-align:left;border-bottom:1px solid; padding:5px;">
            <p style="text-align:left;font-family: 'Roboto', sans-serif; font-size:13px; text-align:left; padding:0px; margin:0;line-height:1.0em;">{{$application->get_data('date_of_entry')}}</p>
        </td>
    </tr>
    <tr>
        <td colspan="4" style="padding:5px;background:#f9f9f9">
            <p style="font-family: 'Roboto', sans-serif; font-size:11px; text-align:center; padding:0px; margin:0;line-height:1.0em;"><strong>NOTE:</strong> Your stay period in <strong>Kenya</strong> will be determined at the <strong>
{{--                    {{$entry_points->find($application->get_data('entry_point'))->name}}--}}
                </strong> entry point
            </p>
        </td>
    </tr>
    </tbody>
</table>


<table border-spacing="0" cellpadding="0" cellspacing="0" style="margin-bottom: 0px; width:100%; font-family: 'Roboto', sans-serif;text-transform:uppercase;">
    <tbody>
    <tr>
        <td style="text-align:center;">
            <h4 style="font-family: 'Roboto', sans-serif; font-weight:bold; font-size:15px; padding:0px; margin:0;line-height:1.0em;">Contact Details</h4>
        </td>
    </tr>
    </tbody>
</table>

<table border-spacing="0" cellpadding="0" cellspacing="0" style="margin:10px;margin-bottom:0; width:100%; font-family: 'Roboto', sans-serif; font-size:13px; text-transform:uppercase;border:1px solid;">
    <tbody>
    <tr>
        <td style="text-align:left; border-bottom:1px solid;  border-right:1px solid; padding:5px;">
            <p style="text-align:left;font-family: 'Roboto', sans-serif; font-size:13px; text-align:left; padding:0px; margin:0;line-height:1.0em;"><strong>Home phone number:</strong>{{$application->get_data('phone_number')}}</p>
        </td>
        <td style="text-align:left;border-bottom:1px solid; padding:5px;">
            <p style="text-align:left;font-family: 'Roboto', sans-serif; font-size:13px; text-align:left; padding:0px; margin:0;line-height:1.0em;"><strong>Kenyan phone number:</strong></p>
        </td>
    </tr>
    <tr>
        <td style="text-align:left;border-right:1px solid; padding:5px;">
            <p style="text-align:left;font-family: 'Roboto', sans-serif; font-size:13px; text-align:left; padding:0px; margin:0;line-height:1.0em;"><strong>EMAIL ADDRESS:</strong> {{$application->get_data('email')}}</p>
        </td>
        <td style="text-align:left; padding:5px;">
            <p style="text-align:left;font-family: 'Roboto', sans-serif; font-size:13px; text-align:left; padding:0px; margin:0;line-height:1.0em;">&nbsp;</p>
        </td>
    </tr>
    </tbody>
</table>

<table border-spacing="0" cellpadding="0" cellspacing="0" style="margin:10px;margin-bottom:0;width:100%; font-family: 'Roboto', sans-serif; font-size:13px; text-align:left;">
    <tbody>
    <tr>
        <td>
            <h4 style="margin-bottom:0;margin-left:20px; font-family: 'Roboto', sans-serif;">NOTES</h4>

            <ol style="font-size:12px;margin-left:20px;">
                <li>The possession of a visa is not the final authority to enter the Republic of Kenya.</li>
                <li>Engaging in any form of business or employment without a requisite permit or pass is an offense.</li>
                <li>A visa to Kenya once approved and issued is valid for travel within 3 months.</li>
                <li>The validity of a Kenyan visa is upto 3 Months, extendable to a maximum of 6 months</li>
            </ol>
        </td>
    </tr>
    </tbody>
</table>

<table border-spacing="0" cellpadding="0" cellspacing="0" style="margin:opx; width:100%; font-family: 'Roboto', sans-serif; font-size:13px; text-transform:uppercase;">
    <tbody>
    <tr>
        <td style="text-align:center; padding:0px;">
            <div style="font-size:12px;text-align:center;font-weight:bold; border-bottom: 1px solid; border-radius: 2px; padding: 5px; margin-bottom:5px; width:100%; font-family: 'Roboto', sans-serif;width:100%;">This document is issued under the authority of The DEPARTMENT OF IMMIGRATION SERVICES.</div>
            <img alt="" src="http://immigration.ecitizen.go.ke/asset_unified/images/Coat_of_Arms.png" style="width: 150px;" /></td>
    </tr>
    </tbody>
</table>
</div>
</div>
@endsection
<h4>
    You have successfully completed the initial stage of the visa application. Click the link below to complete the application process. Please note that if you do not resume the application within the next 1 hour, it will be deleted automatically. Also, if you do not complete the application in the next 48 hours, your application will be deleted.
</h4>
<h4>
    APPLICATION REFERENCE NUMBER:
    <strong>
        {{$application->application_number}}
    </strong>
</h4>
    <a href="{{route('e-visa.guest.retrieve', [$hash])}}">
        @lang('e-visa::common.complete_application')
    </a>

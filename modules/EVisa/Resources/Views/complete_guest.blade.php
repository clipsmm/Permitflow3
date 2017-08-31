@extends('layouts.frontend')
@section('body')
    <div id="vue-root">
        <div class="alert alert_sucess green-border" role="alert">
            <div>
                <span class="fa fa-check-circle  fa-2x pull-left" style="color: #5cb85c"></span>
                <span>
                <strong>Success!</strong>
                    You have successfully completed step 1 on the
                    application process. Use the link sent to your email to complete the process.
                    Please note that your application will automatically be deleted if you don't complete it in 1 hour.
            </span>
            </div>
            <div class="clearfix"></div>
            <hr>
            <div class="text-right">
                @lang("Didn't receive the email?")
                <guest-resend-email inline-template
                                    method="post"
                                    url="{{route('e-visa.guest.resend_email')}}"
                >
                    <a @click.prevent="resend" @mouseover.prevent="hasResent" href="#" class="btn btn-xs btn-primary">
                        <span v-if="sent">
                            <span class="fa fa-check"></span>
                            @lang('Sent')
                        </span>
                        <span v-else>
                            <span  v-if="sending">
                                <span class="fa fa-refresh fa-spin"></span>
                                @lang('Sending')
                            </span>
                            <span v-else >
                                <span class="fa fa-refresh"></span>
                                @lang('Resend')
                            </span>
                        </span>
                    </a>
                </guest-resend-email>
            </div>
        </div>
    </div>
@endsection
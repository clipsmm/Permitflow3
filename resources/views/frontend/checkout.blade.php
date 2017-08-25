@extends('layouts.frontend')

@section('body')
    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">
                <div class="col-md-12">
                    <form id="moodleform" name="moodleform" method="post" action="{{ $data['url'] }}" target="my_frame">

                        <input type="hidden" name="apiClientID" value="{{ $data['apiClientID'] }}" >
                        <input type="hidden" name="secureHash" value="{{ $data['secureHash'] }}" >
                        <input type="hidden" name="billDesc" value="{{ $data['billDesc'] }}" >
                        <input type="hidden" name="billRefNumber" value="{{ $data['billRefNumber'] }}" >
                        <input type="hidden" name="currency" value="{{ $data['currency'] }}" >
                        <input type="hidden" name="serviceID" value="{{ $data['serviceID'] }}" >
                        <input type="hidden" name="clientMSISDN" value="{{ $data['clientMSISDN'] }}" >
                        <input type="hidden" name="clientName" value="{{ $data['clientName']  }}" >
                        <input type="hidden" name="clientIDNumber" value="{{ $data['clientIDNumber']  }}" >
                        <input type="hidden" name="clientEmail" value="{{ $data['clientEmail']  }}" >
                        <input type="hidden" name="pictureURL" value="{{ $data['pictureURL']  }}" >
                        <input type="hidden" name="callBackURLOnSuccess" value="{{ $data['callBackURLOnSuccess']  }}" >
                        <input type="hidden" name="callBackURLOnFail" value="{{ $data['callBackURLOnFail']  }}" >
                        <input type="hidden" name="notificationURL" value="{{  $data['notificationURL']  }}" >
                        <input type="hidden" name="amountExpected" value="{{ $data['amountExpected']  }}" >
                    </form>
                    <iframe style="border: none;" scrolling="no" id="my_frame" width="100%" height="900px" name="my_frame" ></iframe>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('javascripts')
    <script>
        $(function(){
            $('#moodleform').submit();
        });
    </script>
@endpush
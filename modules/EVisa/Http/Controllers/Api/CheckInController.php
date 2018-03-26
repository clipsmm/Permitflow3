<?php

namespace Modules\EVisa\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\EVisa\Models\CheckIn;
use Modules\EVisa\Models\CheckOut;
use Modules\EVisa\Models\Visa;

class CheckInController extends Controller
{
    public function getVisaDetails(Request $request)
    {
        $this->validate($request, [
            'visa_number' => ['required']
        ]);

        $visa = Visa::whereVisaNumber($request->visa_number)->with(['application'])->first();
        return response()->json($visa, 200);
    }

    public function checkin(Request $request)
    {
        $this->validate($request, [
            'visa_number' => ['required', 'exists:visas']
        ]);

        $visa = Visa::whereVisaNumber($request->visa_number)->first();

        $check_in  = CheckIn::attempt($visa);

        if($check_in->check_in_successful){
            return response()->json(['checked_in' => true]);
        }

        return response()->json(['checked_in' => false, 'reason' => $check_in->failure_reason], Response::HTTP_UNAUTHORIZED);
    }

    public function checkout(Request $request)
    {
        $this->validate($request, [
            'visa_number' => ['required']
        ]);

        $visa = Visa::whereVisaNumber($request->visa_number)->with(['application'])->first();
        $check_out = CheckOut::attempt($visa);

        if($check_out->check_out_successful){
            return response()->json(['checked_out' => true]);
        }

        return response()->json(['checked_out' => false, 'reason' => $check_out->failure_reason], Response::HTTP_UNAUTHORIZED);

    }
}

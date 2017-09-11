<?php

namespace Modules\EVisa\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\EVisa\Models\CheckIn;
use Modules\EVisa\Models\Visa;

class CheckInController extends Controller
{
    public function getVisaDetails(Request $request)
    {
        $this->validate($request, [
            'visa_number' => ['required', 'exists:visas']
        ]);

        $visa = Visa::whereVisaNumber($request->visa_number)->with(['application'])->firstOrFail();
        return response()->json(['visa' => $visa]);
    }

    public function checkin(Request $request)
    {
        $this->validate($request, [
            'visa_number' => ['required', 'exists:visas']
        ]);

        $visa = Visa::whereVisaNumber($request->visa_number)->first();

        $checked_in  = CheckIn::attempt($visa);

        if($checked_in === true){
            return response()->json(['checked_in' => true]);
        }

        return response()->json(['checked_in' => false, 'reason' => $checked_in[1]], Response::HTTP_UNAUTHORIZED);
    }
}

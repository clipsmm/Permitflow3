<?php

namespace App\Http\Controllers;

use Image;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function updatePhotoCrop(Request $request) {
        $cropped_value = $request->input("cropped_value"); //// Width,height,x,y,rotate for cropping
        $cp_v = explode("," ,$cropped_value); /// Explode width,height,x etc
        $file = $request->file('file');
        $file_name = md5(time()).".{$file->getClientOriginalExtension()}";
        if ($request->hasFile('file')) {
            $path = $file->storeAs("uploads/" , $file_name); // Original Image Path
            $img = Image::make($file->getRealPath());
            $path2 = public_path("uploads/$file_name"); ///  Cropped Image Path
            $img->rotate($cp_v[4] * -1);  /// Rotate Image
            $img->crop($cp_v[0],$cp_v[1],$cp_v[2],$cp_v[3])->save($path2); // Crop and Save


            $type = pathinfo($path2, PATHINFO_EXTENSION);
            $data = file_get_contents($path2);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

            return response()->json([
                'url' => asset("uploads/$file_name"),
                'path' => "uploads/$file_name",
                'image' => $base64
            ], 200);
        }

        return response()->json([
            'status' => 'fail',
            'message' => __("Image upload failed")
        ], 430);
    }
}

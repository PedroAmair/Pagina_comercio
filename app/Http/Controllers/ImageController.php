<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function store(Request $request)
    {   
        $image = $request->file('file');

        $imageName = Str::uuid()."."."webp";
        
        $serverImage = Image::make($image);
        $serverImage->resize(null, 600, function($constraint){
            $constraint->aspectRatio();
        });
        $serverImage->encode('webp', 90);

        $imagePath = public_path('uploads').'/'.$imageName;
        $serverImage->save($imagePath);
         
        return response()->json(['image' => $imageName]);
    }
}

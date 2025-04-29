<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cloudinary\Cloudinary; 

class MediaController extends Controller
{
    public function uploadImgs(Request $request)
    {
        $uploadedFile = $request->file('image'); // adjust 'file' name if needed
        
        if (!$uploadedFile) {
            return response()->json(['error' => 'No file uploaded'], 400);
        }

        // Get Cloudinary instance from Laravel container
        $cloudinary = app(Cloudinary::class);

        // Upload using uploadApi
        $result = $cloudinary->uploadApi()->upload($uploadedFile->getRealPath());

        return response()->json([
            'url' => $result['secure_url'],
            'public_id' => $result['public_id'],
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //
    public function createService(Request $request)
    {
       
        $examples = json_encode($request->input('examples'));
        $service = Service::create([
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'examples' => $examples, 
            'type' => $request->input('type'),
            'duration' => $request->input('duration'),
            'image' => $request->input('image'),
            'user_id' => $request->input('user_id'),
        ]);
    
    
        return response()->json([
            'message' => 'Service created',
            'service' => $service,
        ], 201);
    }
    public function getServices(){
     $services = Service::all();
     return response()->json([
        'services'=>$services,
     ]);
    }


       public function getService($id){
        $service = Service::find($id);
        if (!$service) {
            return response()->json([
                'error' => 'Service not found'
            ], 404);
        }

        $user= $service->user ;


        return response()->json([
            'service' => $service,
        ]);

       }

    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reclaims;

class ReclaimsController extends Controller
{
    public function validateReward(Request $request){
        $reclaim = Reclaims::where('token',$request->token)->first();
        if($reclaim){

        
        if(count($reclaim->get()) != 0){
            // dd($reclaim);
            $reclaim->status = 2;
            $reclaim->update();
            return response()->json(["message"=>"Se ha canjeado satisfactoriamente.","status"=>200 ]);
        }
        
    }
    return response()->json(["message"=>"Ese Código no es valido.","status"=>404 ]);
}
}

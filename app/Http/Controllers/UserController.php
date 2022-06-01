<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //

    public function searchCellphone(Request $req){
        $user = User::where('cellphone','=',$req->cellphone)->get();
        return $user;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transactions;

class MovementsController extends Controller
{
    //

    public function index(){
        $movements = Transactions::all();
        return view('movements.index',compact('movements'));
    }

    public function create(){
        return view('movements.create');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rewards;
use Illuminate\Support\Str;
use Auth;

class RewardsController extends Controller
{
    
    public function index()
    {
      $rewards = Rewards::where('estatus',1)->get();
      return view('rewards.index',compact('rewards'));
    }

    public function create()
    {
       return view('rewards.create');
    }

    public function store(Request $request)
    {

        $result = '';

        if($request->file('photos')){
            $file= $request->file('photos');
            $filename= date('YmdHi').'.png';
            $file->move(public_path('public/photos'), $filename);
            $result = $filename;
        }

    $request->validate([
        'name'       => 'required',
        'conditions' => 'required',
        "points"     => 'required'
    ]);
    
    
    $rewards = new Rewards([
        'name'        => $request->get('name'),
        'conditions'  => $request->get('conditions'),
        'description' => $request->get('description'),
        'photos'      => $result?$result:'default.png',
        'points'      => $request->get('points'),
        'user_id'     => Auth::user()->id
    ]);

    $rewards->save();
    return redirect('/rewards')->with('success', 'Se ha agregado correctamente.');

    }

    public function show($id)
    {
        $reward = Rewards::find($id);
        return view('rewards.show',compact('reward'));

    }

    public function edit($id)
    {
        $reward = Rewards::find($id);
        return view('rewards.edit',compact('reward'));

    }

    public function update(Request $request)
    {
       
        $reward = Rewards::find($request->id);
        $result;
        if($request->file('photos')){
            $file= $request->file('photos');
            $filename = Str::random(14).'.png';
            $file->move(public_path('public/photos'), $filename);
            $result = $filename;
            $reward->photos                = $result;
        }
        $reward->name                  = $request->get('name');
        $reward->description           = $request->get('description');
        $reward->conditions            = $request->get('conditions');
        $reward->points                = $request->get('points');
        $reward->user_id                = $request->get('user_id');
        $reward->update();
        return redirect('/rewards')->with('success', 'Se ha actualizado correctamente.');

    }


    public function destroy(Request $request)
    {
        $reward = Rewards::find($request->id);
        $reward->estatus = 0;
        $reward->update();
        return redirect('/rewards')->with('success', 'Se ha eliminado correctamente.');
    }
}

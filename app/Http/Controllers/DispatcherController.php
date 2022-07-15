<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Hashids;
use Auth;

class DispatcherController extends Controller
{
    
    public function index()
    {
        $dispatchers = User::where('type',3)->where('id_supplier',Auth::user()->id)->get();
        return view('dispatcher.index',compact('dispatchers'));
    }

    public function create()
    {
       return view('dispatcher.create');
    }


    protected function store(Request $data){

        $data->validate([
            'name'       => ['required', 'string', 'max:255'],
            'cellphone' => ['required','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8']
        ]);
        $id =  Hashids::decode($data['id']);

        
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'cellphone' => $data['cellphone'],
            'password' => Hash::make($data['password']),
            'type' => 3,
            'id_supplier' => $id[0]
            
        ]);

        return redirect('/dispatcher');
    }

    public function show($id)
    {
        //
    }

    public function edit($hash)
    {
        $id =  Hashids::decode($hash);
        $dispatcher = User::find($id[0]);
        return view('dispatcher.edit',compact('dispatcher'));
    }


    public function update(Request $request)
    {
        $id =  Hashids::decode($request->id);
        $dispatcher = User::find($id[0]);
        $dispatcher_cellphone = User::where('cellphone',$request->cellphone)->get()->first();
        $dispatcher_email = User::where('email',$request->email)->get()->first();
      
        $dispatcher->name = $request->name;
       
        if($dispatcher->cellphone != $request->cellphone){
            if(!$dispatcher_cellphone){
                $dispatcher->cellphone = $request->cellphone;
            }else{
                return redirect('dispatcher/edit/'.$request->id)->with('error', 'Ese número ya lo tiene otro usuario.');
            }
        }

        if($dispatcher->email != $request->email){
            if(!$dispatcher_email){
                $dispatcher->email = $request->email;
            }else{
                return redirect('dispatcher/edit/'.$request->id)->with('error', 'Ese correo ya lo tiene otro usuario.');
            }
        }



        $dispatcher->save();
        return redirect('dispatcher/')->with('success', 'Se ha actualizado correctamente.');

    }

    public function destroy(Request $request)
    {
        $hash = Hashids::decode($request->id);
        $despatch = User::find($hash[0]);
        $despatch->estatus = 0;
        $despatch->update();
        return redirect('/dispatcher');
    }
}

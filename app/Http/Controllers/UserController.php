<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function searchCellphone(Request $req){
        $user = User::where('cellphone','=',$req->cellphone)->get();
        return $user;
    }

    public function index(){
        $users = User::where('type',1)->get();
        return view('users.index',compact('users'));
    }

    public function create(){
        return view('users.create');
    }

    public function edit($id){
        $user = User::find($id);
        return view('users.edit',compact('user'));
    }

    public function store(Request $request){

        $request->validate([
            'cellphone'=> 'required|unique:users',
            'email'=> 'required|unique:users',
            'password' => 'required'
        ]);

        $user = new User([
            'name'        => $request->get('name'),
            'email'       => $request->get('email'),
            'cellphone'   => $request->get('cellphone'),
            'password'    => $request->get('password')
        ]);

        $user->save();
        return redirect('/users')->with('success', 'Se ha agregado correctamente.');
    }

    public function update(Request $request){
        $user = user::find($request->id);
        $validator = Validator::make($request->all(), [
            'cellphone' => 'required|unique:users,cellphone,'. $user->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user->name                  = $request->get('name');
        $user->email                 = $request->get('email');
        $user->cellphone             = $request->get('cellphone');        $user->update();
 
        return redirect('/users')->with('success', 'Se ha actualizado correctamente');
    }



    public function destroy(){
        
    }


}

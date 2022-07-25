<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Rewards;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index',compact('suppliers') );
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function register(Request $request)
    {
// dd($request->all());
        $request->validate([
            'business_name'=> 'required',
            'cashback' => 'required'
        ]);
        $result;
        if($request->file('photo')){
            $file = $request->file('photo');
            $filename= date('YmdHi').'.png';
            $file->move(public_path('public/photos'), $filename);
            $result = $filename;
        }

        $supplier = new Supplier([
            'user_id' => Auth::user()->id,
            'name' => $request->get('name'),
            'photo'      => $result?$result:'default.png',
            'business_name'=> $request->get('business_name'),
            // 'representative_name'=> $request->get('representative_name'),
            // 'email'=> $request->get('email'),
            'cashback'=> $request->get('cashback'),
            // 'phone'=> $request->get('phone'),
            // 'password'=> $request->get('password'),
            'description'=> $request->get('description'),
        ]);
 
        $supplier->save();
        return redirect()->back()->with('success', 'Se ha agregado un proovedor');
    }

    public function store(Request $request)
    {

        $request->validate([
            'business_name'=> 'required',
            'cashback' => 'required'
        ]);
 
        $supplier = new Supplier([
            'name' => $request->get('name'),
            'business_name'=> $request->get('business_name'),
            'representative_name'=> $request->get('representative_name'),
            'email'=> $request->get('email'),
            'cashback'=> $request->get('cashback'),
            'phone'=> $request->get('phone'),
            'password'=> $request->get('password'),
            'description'=> $request->get('description'),
        ]);
 
        $supplier->save();
        return redirect('/suppliers')->with('success', 'Se ha agregado un proovedor');
    }

    public function show(Request $req)
    {
        $supplier = Supplier::find($req->id);
        $rewards = Rewards::where('user_id',$supplier->id)->get();
        return view('suppliers.show',compact('supplier','rewards'));
    }

    public function edit(Request $req)
    {
        $supplier = Supplier::find($req->id);
        return view('suppliers.edit',compact('supplier'));
    }
    
    public function update(Request $request)
    {

        $request->validate([
            'business_name'=> 'required',
            'cashback' => 'required'
        ]);
 
        $supplier = Supplier::find($request->id);
        $supplier->name                  = $request->get('name');
        $supplier->business_name         = $request->get('business_name');
        $supplier->cashback              = $request->get('cashback');
        $supplier->description           = $request->get('description');
        $supplier->update();
 
        return redirect('/suppliers')->with('success', 'Se ha actualizado correctamente');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect('/suppliers')->with('success', 'Se ha eliminado correctamente');
    }

    public function available(Request $request)
    {
        $supplier = Supplier::find($request->id);
        $user = User::find($supplier->user_id);
        $user->type = 2;
        $user->save();
        $supplier->estatus = 1;
        $supplier->save();
        return redirect('/suppliers')->with('success', 'Se ha actualizado correctamente');
    }
}

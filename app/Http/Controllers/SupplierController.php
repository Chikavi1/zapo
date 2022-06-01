<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
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

    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'business_name'=> 'required',
            'email' => 'required'
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
        return view('suppliers.show',compact('supplier'));
    }

    public function edit(Request $req)
    {
        $supplier = Supplier::find($req->id);
        return view('suppliers.edit',compact('supplier'));
    }
    
    public function update(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'business_name'=> 'required',
            'email' => 'required'
        ]);
 
 
        $supplier = Supplier::find($request->id);
        $supplier->name                  = $request->get('name');
        $supplier->business_name         = $request->get('business_name');
        $supplier->representative_name   = $request->get('representative_name');
        $supplier->email                 = $request->get('email');
        $supplier->cashback              = $request->get('cashback');
        $supplier->phone                 = $request->get('phone');
        $supplier->password              = $request->get('password');
        $supplier->description           = $request->get('description');
        $supplier->update();
 
        return redirect('/suppliers')->with('success', 'Se ha actualizado correctamente');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect('/suppliers')->with('success', 'Se ha eliminado correctamente');
    }
}

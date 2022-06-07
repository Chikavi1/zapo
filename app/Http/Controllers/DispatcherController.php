<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class DispatcherController extends Controller
{
    
    public function index()
    {
        $dispatchers = User::where('type',3)->get();
        return view('dispatcher.index',compact('dispatchers'));

    }

    public function create()
    {
       return view('dispatcher.create');
    }


    protected function store(Request $data)
    {

        $data->validate([
            'name'       => ['required', 'string', 'max:255'],
            'cellphone' => ['required','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        
        
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'cellphone' => $data['cellphone'],
            'password' => Hash::make($data['password']),
            'type' => 3
        ]);

        return view('dispatcher.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

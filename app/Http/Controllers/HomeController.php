<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Transactions;
use App\Models\Reclaims;
use App\Models\Rewards;
use App\Models\Supplier;
use App\Models\Config;

use bcrypt;
use Hash;
use Date;
use Illuminate\Support\Str;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['reset','welcome']);
    }

    public function welcome(){
        $config = Config::all()->first();
        $latestRewards = Rewards::orderBy('id', 'desc')->take(3)->get();
        $latestSuppliers = Supplier::orderBy('id', 'desc')->take(4)->get();
        return view('welcome',compact('config','latestRewards','latestSuppliers'));

    }

   

    public function index()
    {
        $user = Auth()->user();
        return view('home',compact('user'));
    }

    public function profile(){
        $user = Auth::user();
        return view('profile.index',compact('user'));
    }

    public function editProfile(){
        $user = Auth::user();
        if($user->type == 2){
            $supplier = Supplier::where('user_id',Auth::user()->id);
        }
        return view('profile.edit',compact('user'));
    }

    public function updateProfile(Request $request){
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->cellphone = $request->cellphone;
        $user->update();
        return redirect('/profile')->with('success', 'Se ha actualizado correctamente.');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }

    public function movements(){
        return view('movements.index');
    }

    public function stats(){
        $movements = Transactions::all()->count();
        $reclaims = Reclaims::all()->count();
        $rewards = Rewards::all()->count();
        $suppliers = Supplier::all()->count();
        $users = User::all()->count();
        return view('stats.index',compact('movements','reclaims','rewards','suppliers','users'));
    }

    public function editLanding(){
        $config = Config::all()->first();
        return view('edit-landing.index',compact('config'));
    }

    public function storeLanding(Request $request){
        $config = Config::all()->first();
        $config->title = $request->title;
        $config->subtitle = $request->subtitle;

        if($request->file('image1')){
            $file= $request->file('image1');
            $filename = Str::random(14).'.png';
            $file->move(public_path('public/photos'), $filename);
            $config->image1 = $filename;
        }

        if($request->file('image2')){
            $file= $request->file('image2');
            $filename = Str::random(14).'.png';
            $file->move(public_path('public/photos'), $filename);
            $config->image2 = $filename;
        }

        if($request->file('image3')){
            $file= $request->file('image3');
            $filename = Str::random(14).'.png';
            $file->move(public_path('public/photos'), $filename);
            $config->image3 = $filename;
        }

        $config->save();
        return redirect('/edit-landing')->with('success', 'Se ha actualizado correctamente.');
    }

    public function reset(){
        return view('auth.reset');
    }

    public function convert(){     
        $supplier = Supplier::where('user_id',Auth::user()->id)->get();
        $counter = $supplier->count();
        $formulario = true;

        if($counter == 0){
            $formulario = true;
        }else{
            $formulario = false;
            $supplier = $supplier->first();
        }

        return view('suppliers.register',compact('formulario','supplier'));
    }
    
    public function sendMessage(){
    
        $messageBird = new \MessageBird\Client('JIB7GTFGcx7gOq4wz9qt7qExW');
        $message = new \MessageBird\Objects\Message();
        $message->originator = 'MessageBird';
        $message->recipients = [523327276923];
        $message->body = 'Gracias por registrarte chamo,esta es una prueba xd. conectate al discord.';
        
        try{
            $response =  $messageBird->messages->create($message);
            dd($response);
        } catch (Exception $e){
            echo $e->getMessage();
        }
    
    }

    public function give_rewards(){ 
        return view('rewards.validate');
    }

    public function transaction(Request $request){
        // amount id password
        $points = $request->amount/100;
        $user = User::find($request->id);
        if(Hash::check($request->password, $user->password)){

        $transaction = new Transactions();
        $transaction->client_id = $request->id;
        $transaction->operador_id = $request->operador_id;
        $transaction->amount = $request->amount;
        $transaction->status = 1;
        $transaction->folio = $request->folio;

        $transaction->save();

        $user->points += $points;
        $user->save();
        return response()->json([ 'id' => $request->id,'points'=> $points,'status'=>200 ]);
        }
        return response()->json([ 'error' => 'hubo un error','status'=>502 ]);
    }

    public function redeem(){
        $reclaims = Reclaims::where('id_users',Auth::user()->id)->get();
        return view('redeem.index',compact('reclaims'));
    }

    public function reclaim(Request $request){
        $reward = Rewards::find($request->id_rewards);
        $reclaims = new Reclaims();
        $reclaims->id_users = $request->id_users;
        $reclaims->id_rewards = $request->id_rewards;
        $reclaims->token = Str::random(32);
        $reclaims->id_supplier = $reward->user_id;
        $reclaims->status = 1;
        $user = User::find($request->id_users);
        $user->points -= $reward->points;
        $user->save();
        $reclaims->save();

        return response()->json(["message"=>"se ha creado" ]);

    }

}

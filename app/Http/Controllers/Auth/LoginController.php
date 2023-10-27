<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function redirecTo(){
        if(Auth::user()->role == '1'){
            return view('admin.dashboard');
        }
        elseif(Auth::user()->role == '0'){
            return 'home';
        }
    }
    
    protected function authenticated(){
        if(Auth::user()->role == '1'){
            return redirect('admin.dashboard')->with('status', 'Welcome Admin');
        }
        elseif(Auth::user()->role == '0'){
            return redirect('home')->with('status', 'Welcome User');
        }
    }
}

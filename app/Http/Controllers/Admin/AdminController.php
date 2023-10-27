<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function store(Request $request){
        $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
        ]);
          User::create($request->all());
          return redirect()->route('admin.user')
          ->with('success','User created successfully.');    
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // ==========User Accounts================
    public function UserIndex(){
        $users = User::paginate(10);
        return view('admin.user', ["users"=> $users]);
    }



    //Search users
    public function UserSearch(Request $request){
        $search_text = $request->input('query');
        $users = User::query()
                   ->where('name','LIKE','%'.$search_text.'%')
                  ->orWhere('email','LIKE','%'.$search_text.'%')
                   ->paginate(20);
         return view('admin.user',['users'=>$users]);
    }

    public function store(Request $request){
        $request->validate([
            'name'=> 'required',
            'email'=> 'required',
        ]);
        $request['password'] = bcrypt($request['password']);
          User::create($request->all());
          return redirect()->route('admin.user')
          ->with('success','User created successfully.');    
    }

    public function show(User $user){
        return view('admin.show_user', compact('user'));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        
        $users = User::where('id','!=',1)->get();
        
        return view('users.index',compact('users','user_id'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function findUser(Request $request){
        
        // return $request;
        $name = $request->name;
        
        $users = User::where('name','LIKE',"%{$name}%")->where('id','!=','1')->get();

        return view('users.index',compact('users'));
    }
}

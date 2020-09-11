<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UsersController extends Controller
{
    public function index(){
        return view('user.profile');
    }

//    public function findUser(Request $request,$id)
//    {
//        $theUser = User::whereIn('id', $request->id)->get();
//-
//        return Response::json($theUser);
//    }
//    public function getUserById(Request $request){
//        $id =$request->input('id');
//        $user =  User::find($id);
//        return $user;
//    }
    public function edit($id){
        
            $prof = User::findOrFail($id);

            return view('user.edit', compact('prof'));
        
    }

    public function update(Request $request, $id){
        if (auth()->user()->is_admin){
            $this->validate($request, [
                'name' => 'required|max:100',
                'email' => 'required|max:1000 ',
                'address' => 'required',
                'genre' => 'required',
    
                
                ]);
                $prof = User::findOrFail($id);
        
        
                $prof->name = $request->name;
                $prof->email = $request->email;
                $prof->birthday = $request->birthday;
                $prof->genre = $request->genre;
                $prof->address = $request->address;
        //        $activ->video = '/video/' . $name;
        
        
                $prof->save();
        
        
                return redirect('/admin')->with('success', 'profile info sont modifié avec succèss!');
        }
    }
}
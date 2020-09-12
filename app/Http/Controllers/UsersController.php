<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $id = auth()->user()->id ;
        $user = User::findOrFail($id);
        return view('user.profile', compact('user'));
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
    public function edit($id)
    {

        $prof = User::findOrFail($id);

        return view('user.profile', compact('prof'));

    }

    public function update(Request $request)
    {
//        if (auth()->user()->is_admin == 1) {


//            $prof = User::findOrFail($id);
        $prof = Auth::user();


            $prof->name = $request->name;
            $prof->email = $request->email;
            $prof->birthday = $request->birthday;
            $prof->genre = $request->genre;
            $prof->address = $request->address;
            //        $activ->video = '/video/' . $name;

dd($request);
            $prof->save();

            return redirect('/profile')->with('success', 'User has been updated!');
//            return redirect('/admin')->with('success', 'Admin profile info sont modifié avec succèss!');
//        } else {
//
//            $usr = User::findOrFail($id);
//
//
//            $usr->name = $request->name;
//            $usr->email = $request->email;
//            $usr->birthday = $request->birthday;
//            $usr->genre = $request->genre;
//            $usr->address = $request->address;
//            //        $activ->video = '/video/' . $name;
//
//
//            return redirect('/profile')->with('success', 'Profile info sont modifié');
//        }
    }
}

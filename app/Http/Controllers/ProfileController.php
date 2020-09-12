<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function index()
    {
        $id = auth()->user()->id;
        $user = User::findOrFail($id);
        return view('user.profile', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $prof = User::findOrFail($id);

        return view('user.profile', compact('prof'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
//        if (auth()->user()->is_admin == 1) {


        $prof = User::findOrFail($id);
//        $prof = Auth::user();


        $prof->name = $request->name;
        $prof->email = $request->email;
        $prof->birthday = $request->birthday;
        $prof->genre = $request->genre;
        $prof->address = $request->address;
        //        $activ->video = '/video/' . $name;


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


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
//        $prof = Auth::user();
        $prof = User::findOrfail($id);
        $prof->delete();
        return redirect('/')->with('success' , 'Your account was deleted');
    }
}

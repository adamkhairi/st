<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Article;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        $activ = Activity::latest()->paginate(8);
        return view('content.activities.activity', compact('activ'))->with('i', (request()->input('page', 1) - 1) * 4);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        return view('content.activities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:100',
            'description' => 'required|max:1000 ',
            'video' => 'required',

        ]);


        $file = $request->file('video');
        $name = $file->getClientOriginalName();

        $file->move(public_path() . '/video/', $name);

        $activ = new Activity();
        $activ->title = $request->title;
        $activ->description = $request->description;
        $activ->video = '/video/' . $name;


        $activ->save();


        return redirect('/activity')->with('success', 'Activité ajouté!');
    }

    /**
     * Display the specified resource.
     *
     * @param Activity $activity
     * @return void
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $activ = Article::findOrFail($id);
        return view('content.activities.update', compact('activ'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(Request $request, $id)
    {
        $activ = Article::findOrFail($id);

        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $name = $video->getClientOriginalName();
            $video->move(public_path() . '/video/', $name);
            $name = '/video/' . $name;
            $activ->video = $name;
        }

        $file = $request->file('video');
        $name = $file->getClientOriginalName();

        $file->move(public_path() . '/video/', $name);

        $activ->title = $request->title;
        $activ->description = $request->description;
        $activ->video = '/video/' . $name;


        $activ->save();


        return redirect('/activity/' . $id)->with('success', 'Activité ajouté!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Activity $activity
     * @return Response
     */
    public function destroy(Activity $activity)
    {
        //
    }
}

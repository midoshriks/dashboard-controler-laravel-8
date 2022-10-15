<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class LevelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Employee::orderby('id', 'desc')->paginate(15);
        $title = 'Levels';
        $levels = level::orderby('id')->paginate(5);
        return view('dashboard.levels.index', compact( 'title','levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:3|unique:levels,name',
            'rewards' => 'required|max:1000',
        ]);

        // dd($request->all());

        $level = new level();
        $level->name = $request->name;
        $level->rewards = $request->rewards;

        $level->save();

        if ($request->image) {
            $upload_path = public_path('uploads/levels/' . $request->image->hashName());
            Image::make($request->image)->save($upload_path);
            $level->addMedia($upload_path)->toMediaCollection('photo_level', 'levels');

            // var_dump($level->id);
            // dd($request->all());
            // exit;
        }

        Alert::success('Success Save level'.' '.$level->name);
        return redirect()->route('dashboard.levels.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(level $level)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit(level $level)
    {
        $title = 'Level';
        $level = level::find($level->id);
        return view('dashboard.levels.edit', compact( 'title','level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, level $level)
    {
        $level = level::find($level->id);

        $level->name = $request->name;
        $level->rewards = $request->rewards;

        $level->update();

        if ($request->image) {
            $upload_path = public_path('uploads/levels/' . $request->image->hashName());
            Image::make($request->image)->save($upload_path);
            $level->clearMediaCollection('photo_level');
            $level->addMedia($upload_path)->toMediaCollection('photo_level', 'levels');

            // var_dump($level->id);
            // dd($request->all());
            // exit;
        }

        Alert::success('Success Update level'.' '.$level->name);
        return redirect()->route('dashboard.levels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(level $level)
    {
        $level->delete();

        Alert::toast('deleted successfully level',);
        return redirect()->route('dashboard.levels.index');
    }
}

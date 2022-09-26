<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\languages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class LanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = languages::orderby('id')->paginate(10);
        return view('dashboard.languages.index', compact('languages'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\languages  $languages
     * @return \Illuminate\Http\Response
     */
    public function show(languages $languages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\languages  $languages
     * @return \Illuminate\Http\Response
     */
    public function edit(languages $languages,$id)
    {
        $lang = languages::find($id);
            // dd($lang);
        return view('dashboard.languages.edit', compact('lang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\languages  $languages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, languages $languages, $id)
    {
        $lang = languages::find($id);
        $lang->ar = $request->ar;
        $lang->en = $request->en;

        $lang->update();

        Alert::success('Success Update languages'.' '.$lang->phrase);
        return redirect()->route('dashboard.languages.index');
        // dd($lang);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\languages  $languages
     * @return \Illuminate\Http\Response
     */
    public function destroy(languages $languages , $id)
    {
        $lang = languages::find($id);
        $lang->delete();

        Alert::toast('deleted successfully languages',);
        return redirect()->route('dashboard.languages.index');
    }
}

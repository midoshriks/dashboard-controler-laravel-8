<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\languages;
use Illuminate\Http\Request;

class TranslateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = languages::all();
        // dd($languages);
        return response()->json(["languages" => $languages], 200);
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
    public function edit(languages $languages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\languages  $languages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, languages $languages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\languages  $languages
     * @return \Illuminate\Http\Response
     */
    public function destroy(languages $languages)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();

        return view('dashboard.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page = new Page();
        $page->name = $request->name;
        $page->description = $request->description;

        $page->save();

        Alert::toast('Success Create ' .  $page->name);
        return redirect()->route('dashboard.pages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        // dd($page);
        $page = Page::find($page->id);
        return view('dashboard.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $page = Page::find($page->id);
        $page->name = $request->name;
        $page->description = $request->description;

        $page->update();

        Alert::toast('Success Update ' .  $page->name);
        return redirect()->route('dashboard.pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();

        Alert::toast('deleted successfully page');
        return redirect()->route('dashboard.pages.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function stauts(Request $request, Page $user)
    {
        $page_status = Page::find($request->id);
        if ($page_status->status == 1) {
            # code...
            $page_status->status = $request->status;

            $page_status->save();
            // dd($page_status->status);
            Alert::toast('Success Page Deactivity ' . $page_status->name);
        } else {
            # code...
            $page_status->status = $request->status;

            $page_status->save();
            // dd($page_status->status);
            Alert::toast('Success Page Activity  ' . $page_status->name);
        }

        return redirect()->route('dashboard.pages.index');
    }
}

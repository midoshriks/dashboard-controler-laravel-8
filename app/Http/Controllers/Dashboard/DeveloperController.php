<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\developer_api;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $developer_api = developer_api::orderby('id')->paginate(10);

        return view('dashboard.developers.index', compact('developer_api'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.developers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $developre = new developer_api();

        $developre->type = $request->type;
        $developre->model = $request->model;
        $developre->route_api = $request->route_api;

        $developre->save();
        // dd($developre);

        Alert::success('Success Save route api');
        return redirect()->route('dashboard.developers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\developer_api  $developer_api
     * @return \Illuminate\Http\Response
     */
    public function show(developer_api $developer_api)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\developer_api  $developer_api
     * @return \Illuminate\Http\Response
     */
    public function edit(developer_api $developer_api , $id)
    {
        $developer = developer_api::find($id);
            // dd($developer);
        return view('dashboard.developers.edit', compact('developer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\developer_api  $developer_api
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, developer_api $developer_api , $id)
    {
        $developer_api = developer_api::find($id);

        $developer_api->model  = $request->model;
        $developer_api->type = $request->type;
        $developer_api->route_api = $request->route_api;

        $developer_api->update();

        Alert::success('Success Update Rote api');
        return redirect()->route('dashboard.developers.index');
        // dd($developer_api);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\developer_api  $developer_api
     * @return \Illuminate\Http\Response
     */
    public function destroy(developer_api $developer_api , $id)
    {
        $developer_api = developer_api::find($id);
        $developer_api->delete();

        Alert::toast('deleted successfully Route api',);
        return redirect()->route('dashboard.developers.index');
    }
}

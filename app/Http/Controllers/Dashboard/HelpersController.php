<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class HelpersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $helpers = Helper::orderby('id')->paginate(3);

        return view('dashboard.helpers.index', compact('helpers'));
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
     * @param  \App\Models\Helper  $helper
     * @return \Illuminate\Http\Response
     */
    public function show(Helper $helper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Helper  $helper
     * @return \Illuminate\Http\Response
     */
    public function edit(Helper $helper)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Helper  $helper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Helper $helper)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Helper  $helper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Helper $helper)
    {
        //
    }

    // @mido_shriks function controller Update status helper from 1 to 0 or 0 to 1

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Helper  $helper
     * @return \Illuminate\Http\Response
     */
    public function updatestatus(Request $request, Helper $helper)
    {
        $status_helper = Helper::find($request->id);
        if ($status_helper->status == 1) {
            # code...
            $status_helper->status = $request->status;

            $status_helper->save();
            // dd($status_helper->status);
            Alert::toast('Success helper deacvtiv ' . $helper->name);
        } else {
            # code...
            $status_helper->status = $request->status;

            $status_helper->save();
            // dd($status_helper->status);
            Alert::toast('Success helper acvtivit ' . $helper->name);
        }

        return redirect()->route('dashboard.helpers.index');
    }
    // @mido_shriks function controller Update status helper from 1 to 0 or 0 to 1
}

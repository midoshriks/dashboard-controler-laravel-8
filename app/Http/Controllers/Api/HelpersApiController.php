<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Helper;
use Illuminate\Http\Request;

class HelpersApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $helpers = Helper::select([
        //     'helpers.id',
        //     'helpers.name',
        //     'helpers.status',
        // ])->get();

        $helpers = Helper::select([
            'helpers.id',
            'helpers.name',
            'helpers.status',
        ])->with(['products' => function($q) {
            $q->with('type');
        }])->get();

        // ])->with('type')->get();

        $response = [
            'status' => true,
            'message' => "The Helpers has been Get successfully!"
        ];

        return response()->json(['helpers' => $helpers , $response , 200]);
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
    public function show(Helper $helper , $id)
    {
        // $helper = Helper::where('id' , $id)->select([
        //     'id',
        //     'name',
        //     'status',
        // ])->get();

        $helper = Helper::where('id' , $id)->select([
            'id',
            'name',
            'status',
        ])->with(['type' => function($q) {
            $q;
        }])->get();


        // dd($test);
        // var_dump($helper->coin->price);
        // dd($helper->name);
        // exit;

        // dd($helper);

        return response()->json(['helper' => $helper] , 200);
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
}

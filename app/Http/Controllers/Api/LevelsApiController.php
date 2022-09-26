<?php

namespace App\Http\Controllers\Api;

use App\Models\level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LevelsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = level::all([
            'name',
            'rewards',
        ]);

        return response()->json($levels, $status = 200,);
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
        // var_dump($request->all());
        // exit;

        $rules = [
            'name' => 'required|string|min:3|unique:levels,name,',
            'rewards' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $level = new level();
            $level->name = $request->name;
            $level->rewards = $request->rewards;
            $level->save();
        }

        // var_dump($level->name);
        // var_dump($level->rewards);

        // var_dump($request->all());
        // exit;

        $response = [
            'status' => true,
            'message' => "The level has been Creared successfully!"
        ];

        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(level $level , $id)
    {
        $level = level::find($id);
        // dd($level);
        return response()->json($level);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit(level $level)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, level $level , $id)
    {
        $level = level::findOrFail($id);

        // // var_dump($level);
        // // exit;
        $rules = [
            'name' => 'required|string|min:3|unique:levels,name,'.$id,
            'rewards' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $level = level::findOrFail($level->id);
            $level->name = $request->name;
            $level->rewards = $request->rewards;
            $level->save();
        }

        $response = [
            'status' => true,
            'message' => "The level has been Update successfully!"
        ];

        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(level $level , $id)
    {
        $level = level::findOrFail($id);
        // var_dump($level->name);
        // exit;
        $level->destroy($id);

        $response = [
            'status' => true,
            'message' => "The Level has been Deleted successfully!"
        ];
        return response()->json($response, 200);
    }
}

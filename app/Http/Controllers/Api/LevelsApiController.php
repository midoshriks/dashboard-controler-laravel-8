<?php

namespace App\Http\Controllers\Api;

use App\Models\level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Question;
use App\Models\UserLevel;
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
        // $levels = level::select([
        //     'levels.id',
        //     'levels.name as level',
        //     'rewards',
        // ])->with(['questions' => function($q){
        //     $q->select('level_id', 'id',  'name');
        // }])->get();
        // User::inRandomOrder()->get();

        // $levels = level::select([
        //     'levels.id',
        //     // 'levels.name as level',
        //     'levels.name',
        //     'rewards',
        // ])->withCount('questions as questions')->get();

        // return response()->json(['levels' => $levels], $status = 200,);


        $levels = level::select([
            'levels.id',
            'levels.name',
            'rewards',
            'levels.image',
        ])->get();


        return response()->json(['levels' => $levels], $status = 200,);
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
    public function show(level $level)
    {

        $level->load([
            'questions' => function ($q) {
                $q->orderBy('type_id', 'DESC')->inRandomOrder()->with('type')->with(['answers' => function ($answer) {
                    $answer->inRandomOrder();
                }]);
            },
            'additions' => function ($q) {
                $q->orderBy('type_id', 'DESC')->inRandomOrder()->with('type')->with(['answers' => function ($answer) {
                    $answer->inRandomOrder();
                }]);
            },
        ]);
        $next_level = Level::where('id', '>', $level->id);
        $level['next_id'] = $next_level->min('id');
        //! $level['additions'] = Question::where('level_id', $level['next_id'])->with('answers')->get();
        return response()->json(["level" => $level], 200);
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
    public function update(Request $request, level $level, $id)
    {
        $level = level::findOrFail($id);

        // // var_dump($level);
        // // exit;
        $rules = [
            'name' => 'required|string|min:3|unique:levels,name,' . $id,
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
    public function destroy(level $level, $id)
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

    // users_levels insert api

    public function insertlevel(Request $request)
    {
        $insertlevel = new UserLevel();
        $insertlevel->firstOrCreate([
            'user_id' => $request->user_id,
            'level_id' => $request->level_id,
        ]);
        $response = [
            'status' => true,
            'message' => "The Level has been Insert user successfully!"
        ];
        return response()->json($response, 200);
    }
}

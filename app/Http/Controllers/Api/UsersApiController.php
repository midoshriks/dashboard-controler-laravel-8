<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\level;
use App\Models\UserLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class UsersApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = $request->user();
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'dob_date' => 'required',
            'gender' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->dob_date = $request->dob_date;
            $user->gender = $request->gender;
            // $user->country_id = $request->country_id;
            // $user->password = bcrypt($request->password);
        }
        $user->update();
        // mo2men@image
        if ($request->base64_image) {
            $upload_path = public_path('uploads/users/' . uniqid());
            Image::make(file_get_contents($request->base64_image))->save($upload_path);
            $user->addMedia($upload_path)->toMediaCollection('photo_user', 'users');
        }
        // endEdit@image
        // dd($user);
        $response = [
            'status' => true,
            'user' => $user,
            'message' => "The User has been Update successfully!"
        ];

        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    // users_levels insert api

    public function insertlevel(Request $request)
    {
        // dd($request->all());
        $insertlevel = new UserLevel();
        $insertlevel->user_id = $request->user_id;
        $insertlevel->level_id = $request->level_id;
        $insertlevel->save();

        // $insertlevel->create([
        //     'user_id' => $request->user_id,
        //     'level_id' => $request->level_id,
        // ]);

        // dd($insertlevel);

        // var_dump(DB::table('levels')->where('id', $insertlevel->level_id)->get());
        // exit;

        $response = [
            'status' => true,
            'message' => "The Level has been Insert user successfully!",
            'next_level' => level::select(
                [
                    'levels.id',
                    'levels.name',
                    // 'rewards',
                    'levels.image',
                ]
            )->where('id', $insertlevel->level_id)->first(),
        ];
        return response()->json($response, 200);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Models\type;
use App\Models\User;
use App\Models\level;
use App\Models\UserLevel;
use App\Models\WalletLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        $user = $user;
        $user['coins'] = $user->wallets->balance('coin');
        $user['bucks'] = $user->wallets->balance('bucks');
        $helpers = [];
        for ($i = 1; $i < 5; $i++) {
            $helpers[$i] = $user->wallets->balance('helper', $i);
        }
        // $user['helpers'] = $helpers;
        return response()->json(["user" => $user], 200);
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
            // ! error here
            // 'phone' => 'string|exists:users,phone,'. $user->phone,
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->dob_date = $request->dob_date;
            $user->gender = $request->gender;
            $user->phone = $request->phone;
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
        $user = Auth::user();

        if (DB::table('user_levels')->where('user_id', $request->user_id)->where('level_id', $request->level_id)->count() == 0) {
            $insertlevel = new UserLevel();
            $insertlevel->user_id = $request->user_id;
            $insertlevel->level_id = $request->level_id;
            $insertlevel->save();
        }
        $lastLevel = $user->levels->last();

        //? coins rewards
        $Wallet_coins = new WalletLog();
        $Wallet_coins->wallet_id = $user->wallets->id;
        $Wallet_coins->amount = @$request->new_coins;
        $Wallet_coins->type_id = type::TYPE_WALLET_COIN;
        $Wallet_coins->wallet_status_id = type::TYPE_WALLET_STATUS_REWARDS;
        $Wallet_coins->save();

        //? bucks rewards
        $Wallet_coins = new WalletLog();
        $Wallet_coins->wallet_id = $user->wallets->id;
        $Wallet_coins->amount = @$request->bucks;
        $Wallet_coins->type_id = type::TYPE_WALLET_BUCKS;
        $Wallet_coins->wallet_status_id = type::TYPE_WALLET_STATUS_REWARDS;
        $Wallet_coins->save();

        $response = [
            'status' => true,
            'message' => "The Level has been Insert user successfully!",
            'level' => level::select(
                [
                    'levels.id',
                    'levels.name',
                    'levels.image',
                ]
            )->where('id', $lastLevel->id)->first(),
            'coins' => $user->coins,
            'bucks' => $user->bucks
        ];
        return response()->json($response, 200);
    }

    public function bucksValues(Request $request)
    {
        $user = Auth::user();
        $bucks = $user->bucks;
        $rate = get_config_value('bucks', 'dollar');
        $dollar = $bucks * $rate;
        $response = [
            'status' => true,
            'bucks' => $bucks,
            'rate' => $rate,
            'dollar' => $dollar,
        ];
        return response()->json($response, 200);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserLevel;
use App\Models\Wallets;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PassPortController extends Controller
{
    // Stop plase make  php artisan passport:install pefor refesh seeder
    // @mido_shriks message respoans
    public function sendResponse($result, $message)
    {
        $response = [
            // $key   => value
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }

    public function sendError($error, $errorMessage = [], $code = 404)
    {
        $response = [
            // $key   => value
            'success' => false,
            'data' => $error,
        ];

        if (!empty($errorMessage)) {
            # code...
            $response['data'] = $errorMessage;
        }

        return response()->json($response, $code);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'gender' => 'required',
            'dob_date' => 'required|date',
            'password' => 'required|min:6',
            // 'password_confirmation' => 'required|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            # code...
            return response()->json($validator->errors(), 404);
        }

        $input = $request->all();
        $input['role_permissions'] = 'gaming';
        $input['code_membership'] = Str::random(2) . mt_rand(1000000, 10000000);
        $input['country_id'] = 1;
        $input['password'] = bcrypt($input['password']);


        $user = User::create($input);
        $levelids = 1;
        $user->levels()->attach($levelids);
        Wallets::create([
            'user_id' => $user->id,
        ]);
        
        $success['token'] = $user->createToken('mido')->accessToken;
        $success['first_name'] = $user->first_name;
        $success['last_name'] = $user->last_name;
        $success['full_name'] = $user->first_name . ' ' . $user->last_name;
        $success['gender'] = $user->gender;
        $success['dob_date'] = $user->dob_date;
        $success['email'] = $user->email;
        $success['phone'] = $user->phone;
        $success['country'] = $user->country->name;
        $success['user_photo'] = $user->photo_user;
        $success['level'] = $user->levels->last()->id;
        // $success['levels'] = $user->levels;


        // $user_level =  UserLevel::create([
        //     'user_id' => $user->id,
        //     'level_id' => 1,
        // ]);

        return $this->sendResponse($success, 'User registered seccussfully');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('mido')->accessToken;
            $success['first_name'] = $user->first_name;
            $success['last_name'] = $user->last_name;
            $success['full_name'] = $user->first_name . ' ' . $user->last_name;
            $success['gender'] = $user->gender;
            $success['dob_date'] = $user->dob_date;
            $success['email'] = $user->email;
            $success['phone'] = $user->phone;
            $success['country'] = $user->country->name;
            $success['user_photo'] = $user->photo_user;
            $success['level'] = $user->levels->last()->id;
            // $success['levels'] = $user->levels;

            // return response()->json(["success" => $success], 200);
            return $this->sendResponse(["user" => $success], 'User login seccussfully');
        } else {
            return $this->sendError('Please check your auth', ['error' => 'unauthorised']);
        }
    }
}

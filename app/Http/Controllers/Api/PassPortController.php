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
            'success' => true,
            'message' => $message,
            'user' => $result,
        ];

        return response()->json($response, 200);
    }

    public function sendError($error, $errorMessage = [], $code = 200)
    {
        $response = [
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
        ]);

        if ($validator->fails()) {
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

        $result['token'] = $user->createToken('mido')->accessToken;
        $result['id'] = $user->id;
        $result['first_name'] = $user->first_name;
        $result['last_name'] = $user->last_name;
        $result['full_name'] = $user->first_name . ' ' . $user->last_name;
        $result['gender'] = $user->gender;
        $result['dob_date'] = $user->dob_date;
        $result['email'] = $user->email;
        $result['phone'] = $user->phone;
        $result['country'] = $user->country->name;
        $result['user_photo'] = $user->photo_user;
        $result['level'] = $user->levels->last()->id;
        return $this->sendResponse($result, 'User registered seccussfully');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $result['token'] = $user->createToken('bucks')->accessToken;
            $result['id'] = $user->id;
            $result['first_name'] = $user->first_name;
            $result['last_name'] = $user->last_name;
            $result['full_name'] = $user->first_name . ' ' . $user->last_name;
            $result['gender'] = $user->gender;
            $result['dob_date'] = $user->dob_date;
            $result['email'] = $user->email;
            $result['phone'] = $user->phone;
            $result['country'] = $user->country->name;
            $result['user_photo'] = $user->photo_user;
            $result['level'] = $user->levels->last()->id;
            return $this->sendResponse($result, 'User login seccussfully');
        } else {
            return $this->sendError('Please check your auth', ['error' => 'unauthorised']);
        }
    }

    public function logout(Request $request)
    {
        $token = $request->user()->token();
        // $token->revoke();
        $token->delete();
        return $this->sendResponse($token, 'You have logout seccussfully');
    }
}

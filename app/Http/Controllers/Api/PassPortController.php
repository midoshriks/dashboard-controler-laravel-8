<?php

namespace App\Http\Controllers\Api;

use Log;
use App\Models\User;
use App\Models\level;
use App\Models\country;
use App\Models\Wallets;
use App\Models\UserLevel;
use App\Mail\SendMailAuth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class PassPortController extends Controller
{
    // Stop plase make  php artisan passport:install pefor refesh seeder
    // @mido_shriks message respoans
    public function sendResponse($user, $message)
    {

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
        $result['photo_user'] = $user->photo_user;
        $level = $user->levels->last() ? $user->levels->last() : level::first();
        // mo2men@level
        $result['level'] = $level->id;
        $result['level_name'] = $level->name;
        $result['level_photo'] = $level->photo_level;
        // endEdit@level
        $wallet = Wallets::where('user_id', $user->id)->first();
        $result['coins'] = $wallet->balance('coin');
        $result['bucks'] = $wallet->balance('bucks');
        // dd($wallet->walletLogs()->pluck('helper_id'));
        // $helper_id = $wallet->walletLogs()->pluck('helper_id');
        $result['helpers'] = [];
        for ($i = 1; $i < 5; $i++) {
            $result['helpers'][$i] = $wallet->balance('helper', $i);
        }

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
        foreach ($validator->errors()->getMessages() as $key => $error) {
            # code...
            switch ($key) {
                case 'first_name':
                    # code...
                    return response()->json(['status' => false, 'error' => 'FIRSTNAME_REPEAT'], 401);
                    break;
                case 'last_name':
                    return response()->json(['status' => false, 'error' => 'LASTNAME_REPEAT'], 401);
                    break;
                case 'email':
                    return response()->json(['status' => false, 'error' => 'EMAIL_REPEAT'], 401);
                    break;
                case 'phone':
                    return response()->json(['status' => false, 'error' => 'PHONE_REPEAT'], 401);
                    break;
                case 'gender':
                    return response()->json(['status' => false, 'error' => 'gender'], 401);
                    break;
                case 'dob_date':
                    return response()->json(['status' => false, 'error' => 'dob_date'], 401);
                    break;
                case 'password':
                    return response()->json(['status' => false, 'error' => 'password'], 401);
                    break;

                    // default:
                    //     # code...
                    //     break;
            }
        }

        // if ($validator->fails()) {
        //     return response()->json($validator->errors(), 404);
        // }

        // mo2men@registeration
        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['role_permissions'] = 'gaming';
            $input['code_membership'] = Str::random(2) . mt_rand(1000000, 10000000);
            // mo2men@country
            $input['country_id'] = country::where('name', IPtoLocation($_SERVER['REMOTE_ADDR'])['country'])->first()->id;
            // mo2men@country
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);
            $levelids = level::first()->id;
            $user->levels()->attach($levelids);

            Wallets::create([
                'user_id' => $user->id,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            Log::error($e);
            DB::rollback();
        }
        // mo2men@registeration
        return $this->sendResponse($user, 'User registered seccussfully');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            return $this->sendResponse($user, 'User login seccussfully');
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

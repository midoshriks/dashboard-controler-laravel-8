<?php

namespace App\Http\Controllers\Api;

use Log;
use App\Models\User;
use App\Models\level;
use App\Models\country;
use App\Models\Wallets;
use App\Models\UserLevel;
use App\Mail\SendMailAuth;
use App\Mail\MailVerifyOtp;
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
        $result['dob_date'] = date("Y-m-d", strtotime($user->dob_date));
        $result['email'] = $user->email;
        $result['phone'] = $user->phone;
        $result['country'] = $user->country->name;
        $result['photo_user'] = $user->photo_user;
        // @change here
        if (!$user->email_verified_at) {
            $otp = generate_code(10000, 99999);
            $user->otp = $otp;
            $user->save();
            $result['otp'] = $user->otp;
            Mail::to($user->email)->send(new MailVerifyOtp($user->otp));
        }
        // @endChange
        $level = $user->levels->last() ? $user->levels->last() : level::first();
        $result['level'] = $level->id;
        $result['level_name'] = $level->name;
        $result['level_photo'] = $level->photo_level;
        $wallet = Wallets::where('user_id', $user->id)->first();
        $result['coins'] = $wallet->balance('coin');
        $result['bucks'] = $wallet->balance('bucks');
        $result['helpers'] = [];
        for ($i = 1; $i < 5; $i++) {
            $result['helpers'][$i] = $wallet->balance('helper', $i);
        }

        $response = [
            'success' => true,
            'message' => $message,
            'user' => $result,
        ];
        // return date("Y-m-d", strtotime($user->dob_date));
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
        if ($request->password != 'facebook' && $request->password != 'google') {
            // @change here
            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required|unique:users,phone',
                'gender' => 'required',
                'dob_date' => 'required|date',
                'password' => 'required|min:3',
            ]);
            // @endChange

            foreach ($validator->errors()->getMessages() as $key => $error) {
                switch ($key) {
                    case 'first_name':
                        return response()->json(['status' => false, 'error' => 'FIRSTNAME_REPEAT'], 401);
                        break;
                    case 'last_name':
                        return response()->json(['status' => false, 'error' => 'LASTNAME_REPEAT'], 401);
                        break;
                    case 'email':
                        return response()->json(['status' => false, 'message' => 'EMAIL_REPEAT', 'code' => 400]);
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
                }
            }
        }

        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['login_via'] = ($input['password'] == 'facebook') ? 'facebook' : (($input['password'] == 'google') ? 'google' : 'mail');
            if ($input['login_via'] != 'mail') {
                $request->merge(['login' => 'third_party']);
                $account = $this->login($request);
                if ($account)
                    $user = $account;
            }
            $input['role_permissions'] = 'gaming';
            $input['code_membership'] = Str::random(2) . mt_rand(1000000, 10000000);
            // mo2men@country
            // $input['country_id'] = country::where('name', IPtoLocation($_SERVER['REMOTE_ADDR'])['country'])->first()->id;
            $input['country_id'] = 1;
            // mo2men@country
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);
            $levelids = level::first()->id;
            $user->levels()->attach($levelids);
            Wallets::create([
                'user_id' => $user->id,
            ]);
            if ($input['login_via'] != 'mail' && !$user->email_verified_at) {
                $user->email_verified_at = now();
                $user->save();
            }
            DB::commit();
        } catch (\Exception $e) {
            Log::error($e);
            DB::rollback();
        }
        return $this->sendResponse($user, 'User registered seccussfully');
    }

    public function login(Request $request)
    {
        $login_via = isset($request->login) && $request->login ? $request->password : 'mail';

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'login_via' => $login_via])) {

            $user = Auth::user();
            if (isset($request->login) && $request->login == 'third_party') {
                if ($user) {
                    return $user;
                } else {
                    return null;
                }
            } else {
                return $this->sendResponse($user, 'User login seccussfully');
            };
        } else {
            if (isset($request->login) && $request->login == 'third_party') {
                return null;
            }
            return $this->sendError('Please check your auth', ['error' => 'unauthorised']);
        }
    }


    // @change here
    public function otp(Request $request)
    {

        //? get date user by email or user_id;
        $user = User::where('email', $request->mail)->orWhere('id', $request->user_id)->first();

        if (!$user) {
            return response([
                "code" => 400,
                "message" => "error_email",
            ]);;
        } else {

            $validator = Validator::make($request->all(), [
                'email' => 'unique:users,email,' . $user->id,
                'reset' => 'required',
            ]);

            foreach ($validator->errors()->getMessages() as $key => $error) {
                switch ($key) {
                    case 'email':
                        return response()->json(['status' => false, 'message' => 'EMAIL_REPEAT', 'code' => 400]);
                        break;
                }
            }

            $otp = generate_code(10000, 99999);
            $user->otp = $otp;
            $user->save();
            $user = User::where('email', '=', $user->email)->first();

            Mail::to($request->email ?? $user->email)->send(new MailVerifyOtp($otp));

            return response([
                "code" => 200,
                "message" => "OTP send Successfully",
                "otp" => $otp,
                "user_id" => $user->id,
            ]);
        }
    }

    public function resetOtpData(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'reset' => 'required',
        ]);
        foreach ($validator->errors()->getMessages() as $key => $error) {
            switch ($key) {
                case 'reset':
                    return response()->json(['status' => false, 'error' => 'reset'], 401);
                    break;
            }
        }

        $user = User::where('otp', $request->otp)->where(function ($q) use ($request) {
            $q->where('id', $request->user_id)->orWhere('email', $request->mail);
        })->first();

        if ($user) {

            $validator = Validator::make($request->all(), [
                'email' => 'unique:users,email,' . $user->id,
            ]);

            foreach ($validator->errors()->getMessages() as $key => $error) {
                switch ($key) {
                    case 'email':
                        return response()->json(['status' => false, 'message' => 'EMAIL_REPEAT', 'code' => 400]);
                        break;
                }
            }

            switch ($request->reset) {
                case 'email':
                    $user->email = $request->email;
                    break;
                case 'email_verify':
                    $user->email_verified_at = now();
                    break;

                default:
                    $user->password = bcrypt($request->password);
                    break;
            }
            $user->otp = null;
            $user->update();
            return response([
                "code" => 200,
                "message" => "Update Otp data New Successfully",
                "user_id" => $user->id,
            ]);
        } else {
            return response([
                "code" => 400,
                "message" => "error_otp",
            ]);
        }
    }
    // @endChange


    public function logout(Request $request)
    {
        $token = $request->user()->token();
        // $token->revoke();
        $token->delete();
        return $this->sendResponse($token, 'You have logout seccussfully');
    }
}

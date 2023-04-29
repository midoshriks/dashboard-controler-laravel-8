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
        $result['dob_date'] = $user->dob_date;
        $result['email'] = $user->email;
        $result['phone'] = $user->phone;
        $result['country'] = $user->country->name;
        $result['photo_user'] = $user->photo_user;
        if (!$user->email_verified_at)
            $result['otp'] = $user->otp;
        Mail::to($user->email)->send(new MailVerifyOtp($user->otp));

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
            'password' => 'required|min:3',
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
            $input['login_via'] = ($input['password'] == 'facebook') ? 'facebook' : (($input['password'] == 'google') ? 'google' : 'mail');
            if ($input['login_via'] != 'mail') {
                $request->merge(['login' => 'third_party']);
                $account = $this->login($request);
                if ($account)
                    $user = $account;
            }
            $input['role_permissions'] = 'gaming';
            $input['code_membership'] = Str::random(2) . mt_rand(1000000, 10000000);
            // ? emailVerify save code in table
            $input['otp'] = generate_code(10000, 99999);
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


    public function otp(Request $request)
    {
        // user_id: 22
        // otp: 56423

        //? get date user by email or user_id;
        $user = User::where('email', $request->email)->orWhere('id', $request->user_id)->first();
        $rules = [
            $user->email => 'email|max:128|exists:users,email,' . $user->email,
            // 'email' => 'required|email|max:128|exists:users,email,' . $user->email,
        ];

        // dd($user);

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        } else {

            // $user = User::findOrFail($user->id);
            $otp = generate_code(10000, 99999);
            $user->otp = $otp;
            $user->save();
            $user = User::where('email', '=', $user->email)->first();
            $email = Mail::to($user->email)->send(new MailVerifyOtp($otp));

            return response([
                "code" => 200,
                "message" => "OTP send Successfully",
                "otp" => $otp,
                "user_id" => $user->id,
            ]);
        }
    }

    public function resetPassword(Request $request)
    {
        // dd($request->all());

        $user = User::where('otp', $request->otp)
            ->orWhere('id', $request->user_id)
            ->orWhere('email', $request->email)->first();
        if ($user->otp == $request->otp) {
            $validator = Validator::make($request->all(), [
                'password' => 'required|min:3',
            ]);
            foreach ($validator->errors()->getMessages() as $key => $error) {
                # code...
                switch ($key) {
                    case 'password':
                        return response()->json(['status' => false, 'error' => 'password'], 401);
                        break;
                        // default:
                        //     # code...
                        //     break;
                }
            }
            $user = User::findOrFail($user->id);
            $user->password = bcrypt($request->password);
            $user->otp = null;
            $user->update();
            // dd($user->password);
            return response([
                "code" => 200,
                "message" => "Update Password New Successfully",
                "user_id" => $user->id,
            ]);
        } else {
            return response([
                "code" => 400,
                "message" => "Error Code ResetPassword",
            ]);
        }
    }
    public function resetEmail(Request $request)
    {
        $user = User::where('otp', $request->otp)
            ->orWhere('id', $request->user_id)->first();
            dd($request->all(), $user->id, $user->email);
        if ($user->otp == $request->otp) {
            $user = User::findOrFail($user->id);
            $user->email = $request->email;
            $user->otp = null;
            $user->update();
            return response([
                "code" => 200,
                "message" => "Update ResetEmail Now Successfully",
                "user_id" => $user->id,
            ]);
        } {
            return response([
                "code" => 400,
                "message" => "Error Code ResetEmail",
            ]);
        }
        // dd($request->all(),$user);


        // set email_verified_at now()

    }


    public function emailVerify(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user->otp == $request->otp) {
            $user = User::findOrFail($user->id);
            $user->email_verified_at = now();
            $user->otp = null;
            // dd($user->otp);
            $user->update();
            return response([
                "code" => 200,
                "message" => "Update emailVerify Now Successfully",
                "user_id" => $user->id,
            ]);
        } {
            return response([
                "code" => 400,
                "message" => "Error Code emailVerify",
            ]);
        }
        // dd($request->all(),$user);


        // set email_verified_at now()
    }

    public function logout(Request $request)
    {
        $token = $request->user()->token();
        // $token->revoke();
        $token->delete();
        return $this->sendResponse($token, 'You have logout seccussfully');
    }
}

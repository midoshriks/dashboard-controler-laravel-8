<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\UsersExport;
use App\Models\Role;
use App\Models\type;
use App\Models\User;
use App\Models\country;
use App\Models\Wallets;
use App\Mail\SendMailAuth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Notifications\send_notification;
use RealRashid\SweetAlert\Facades\Alert;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Notification;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::all();
        $users = User::where('role_permissions', 'super_admin')->get();
        $select_countries = country::all();
        $types = type::where('model', 'user')->get();

        return view('dashboard.users.index', compact('users', 'select_countries', 'types'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        // $users = User::all();
        $admins = User::where('role_permissions', 'admin')->get();
        $select_countries = country::all();
        $types = type::where('model', 'user')->get();

        return view('dashboard.users.admin', compact('admins', 'select_countries', 'types'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gaming()
    {
        // $users = User::all();
        $gaming = User::where('role_permissions', 'gaming')->get();
        $select_countries = country::all();
        $types = type::where('model', 'user')->get();

        return view('dashboard.users.gaming', compact('gaming', 'select_countries', 'types'));
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

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->dob_date = $request->dob_date;
        $user->gender = $request->gender;
        $user->country_id = $request->country_id;
        $user->code_membership =  Str::random(2) . mt_rand(1000000, 10000000);
        $user->otp =  generate_code(10000, 99999);
        $user->password = bcrypt($request->password);

        dd($user);

        // create token device
        $user->device_token = $user->createToken('bucks')->accessToken;
        // dd($request->all(), $request->role_permissions);

        // get type_user where table types
        $types = type::where('id', $request->role_permissions)->first(); // role_permissions = name => type
        if (!$types) {
            $type = type::create([
                'model' => 'user',
                'name' => $request->role_permissions,
            ]);
        }
        $user->type_id = $types->id;

        // dd($request->all(), $user->role_permissions, $types);


        if (DB::table('types')->where('name', $types->name)->get()) {
            // save type user by select table types
            $user->role_permissions =  $types->name;

            if ($user->role_permissions == 'admin') {
                # code... create user by admin ...

                // save user with role admin
                $user->save();

                // dd($request->all(), $user, $types->name);

                // get addMedia spatie
                if ($request->image) {
                    $upload_path = public_path('uploads/users/' . $request->image->hashName());
                    Image::make($request->image)->save($upload_path);
                    $user->addMedia($upload_path)->toMediaCollection('photo_user', 'users');
                    //save image im local & data
                    $user->image = $request->image->getClientOriginalName();
                    $request->file('image')->move('uploads/users/', $request->file('image')->getClientOriginalName());
                    // dd($user->image , $user);
                    $user->update();
                }

                // syncPermissions role laratrest
                $user->attachRole('admin');
                $user->syncPermissions($request->permissions);

                // send Notification in dashboard
                // $admins = User::where('role_permissions', 'admin')->where('id',  '!=', Auth::user()->id)->get();
                // $data_send = auth()->user();
                // $message = 'create new admin with you';
                // Notification::send($admins, new send_notification($data_send->id, $data_send->first_name, $user->first_name, $message));

                // send mail welcome to smartbackus
                Mail::to($user->email)
                    ->send(new SendMailAuth($user->first_name));

                Alert::success('Success Title', 'Success Save ' . $user->role_permissions . ' ' .  $user->first_name);
                return redirect()->route('dashboard.users.admin');
            } else {
                # code... create user by gaming
                // save user with role admin
                $user->save();

                // dd($request->all(), $user, $types->name);

                // Start create level to users
                $levelids = 1;
                $user->levels()->attach($levelids);

                // create wallet to user
                Wallets::create([
                    'user_id' => $user->id,
                ]);

                // get addMedia spatie
                if ($request->image) {
                    $upload_path = public_path('uploads/users/' . $request->image->hashName());
                    Image::make($request->image)->save($upload_path);
                    $user->addMedia($upload_path)->toMediaCollection('photo_user', 'users');
                    //save image im local & data
                    $user->image = $request->image->getClientOriginalName();
                    $request->file('image')->move('uploads/users/', $request->file('image')->getClientOriginalName());
                    // dd($user->image , $user);
                    $user->update();
                }

                // send mail welcome to smartbackus
                Mail::to($user->email)
                    ->send(new SendMailAuth($user->first_name));

                Alert::success('Success Title', 'Success Save ' . $user->role_permissions . ' ' .  $user->first_name);
                return redirect()->route('dashboard.users.gaming');
            }
        }





        // // $request->validate([
        // //     'first_name' => 'required',
        // //     'last_name' => 'required',
        // //     'email' => 'required|unique:users',
        // //     'image' => 'image',
        // //     'password' => 'required|confirmed',
        // //     'permissions' => 'required|min:1'
        // // ]);

        // // var_dump($request->dob_date);
        // // dd($request->all());
        // // exit;

        // $request_data = $request->except(['password', 'password_confirmation', 'permissions', 'code_membership', 'role_permissions', 'image']);
        // $request_data['password'] = bcrypt($request->password);


        // // @mido_shrisk ++ code_membership
        // $request_data['code_membership'] = '';

        // if ($request_data['code_membership'] == null) {
        //     # code...
        //     $request_data['code_membership'] =  Str::random(2) . mt_rand(1000000, 10000000);

        //     // var_dump($request_data['code_membership']);
        //     // exit;
        //     // dd($request_data);
        // }
        // // @mido_shrisk ++ code_membership

        // $request_data['role_permissions'] = $request->role_permissions;

        // if ($request_data['role_permissions'] == 'gaming') {
        //     // var_dump($request_data['role_permissions']);

        //     # code...
        //     $request_data['role_permissions']  = 'gaming';
        //     $user = User::create($request_data);

        //     $levelids = 1;
        //     $user->levels()->attach($levelids);

        //     Wallets::create([
        //         'user_id' => $user->id,
        //     ]);

        //     // dd($user);

        //     if ($request->image) {
        //         $upload_path = public_path('uploads/users/' . $request->image->hashName());
        //         Image::make($request->image)->save($upload_path);
        //         $user->addMedia($upload_path)->toMediaCollection('photo_user', 'users');

        //         // var_dump($user->image);
        //         // dd($request->all());
        //         // exit;
        //     }
        //     // send mail welcome to smartbackus
        //     Mail::to($user->email)
        //         ->send(new SendMailAuth($user->first_name));

        //     Alert::success('Success Title', 'Success Save  gaming ' .  $user->first_name);
        //     return redirect()->route('dashboard.users.index');
        // } else {
        //     // var_dump($request_data['role_permissions']);
        //     // exit;

        //     # code...
        //     $request_data['role_permissions']  = 'admin';

        //     // var_dump($request_data['code_membership']);
        //     // var_dump($request_data['role_permissions']);
        //     // var_dump($count_user);
        //     // dd($request->all());
        //     // exit;

        //     $user = User::create($request_data);

        //     $levelids = 1;
        //     $user->levels()->attach($levelids);


        //     if ($request->image) {
        //         $upload_path = public_path('uploads/users/' . $request->image->hashName());
        //         Image::make($request->image)->save($upload_path);
        //         $user->addMedia($upload_path)->toMediaCollection('photo_user', 'users');

        //         // var_dump($user->image);
        //         // dd($request->all());
        //         // exit;
        //     }

        //     $user->attachRole('admin');
        //     $user->syncPermissions($request->permissions);

        //     // var_dump($request_data['code_membership']);
        //     // var_dump($request_data['role_permissions']);
        //     // dd($request->all());
        //     // exit;

        //     // send mail welcome to smartbackus
        //     Mail::to($user->email)
        //         ->send(new SendMailAuth($user->first_name));

        //     Alert::success('Success Title', 'Success Save ' . $user->role_permissions . ' ' .  $user->first_name);
        //     return redirect()->route('dashboard.users.index');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user = User::find($user->id);
        $levels_users = $user->levels;

        // // $getIDnotifiaction = DB::table('notifications')->where('notifiable_id', $user->id)->pluck('id');
        // // return $getIDnotifiaction;
        // // DB::table('notifications')->where('id', $getIDnotifiaction)->update(['read_at' => now()]);


        // dd($user);
        return view('dashboard.users.show', compact('user', 'levels_users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = User::find($user->id);
        $select_countries = country::all();
        $types = type::where('model', 'user')->get();

        // dd($user);
        return view('dashboard.users.edit', compact('user', 'select_countries', 'types'));
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
        $user = User::findOrFail($user->id);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        // $user->email = $request->email;
        $user->phone = $request->phone;
        $user->dob_date = $request->dob_date;
        $user->gender = $request->gender;
        $user->country_id = $request->country_id;
        $user->code_membership =  $user->code_membership;
        // $user->password = bcrypt($request->password);

        // create token device
        $user->device_token = $user->device_token;

        // dd($request->all(), $user);

        // get type_user where table types
        $types = type::where('id', $request->role_permissions)->first(); // role_permissions = name => type

        $user->type_id = $types->id;

        if (DB::table('types')->where('name', $types->name)->get()) {
            // update type user by select table types
            $user->role_permissions =  $types->name;

            if ($user->role_permissions == 'admin') {
                # code... create user by admin ...

                // update user with role admin
                $user->update();

                // dd($request->all(), $user, $types->name);

                // get addMedia spatie
                if ($request->image) {
                    $upload_path = public_path('uploads/users/' . $request->image->hashName());
                    Image::make($request->image)->save($upload_path);
                    $user->addMedia($upload_path)->toMediaCollection('photo_user', 'users');
                    //update image im local & data
                    $user->image = $request->image->getClientOriginalName();
                    $request->file('image')->move('uploads/users/', $request->file('image')->getClientOriginalName());
                    // dd($user->image , $user);
                    $user->update();
                }

                // syncPermissions role laratrest
                $user->syncPermissions($request->permissions);
                $user->update();

                Alert::success('Success Title', 'Success Save ' . $user->role_permissions . ' ' .  $user->first_name);
                return redirect()->route('dashboard.users.admin');
            } else {
                # code... create user by gaming
                // update user with role admin
                $user->update();

                // dd($request->all(), $user, $types->name);

                // get addMedia spatie
                if ($request->image) {
                    $upload_path = public_path('uploads/users/' . $request->image->hashName());
                    Image::make($request->image)->save($upload_path);
                    $user->addMedia($upload_path)->toMediaCollection('photo_user', 'users');
                    //save image im local & data
                    $user->image = $request->image->getClientOriginalName();
                    $request->file('image')->move('uploads/users/', $request->file('image')->getClientOriginalName());
                    // dd($user->image , $user);
                    $user->update();
                }

                Alert::success('Success Title', 'Success Save ' . $user->role_permissions . ' ' .  $user->first_name);
                return redirect()->route('dashboard.users.gaming');
            }
        }

        // dd($request->all());

        // $request->validate([
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'email' => ['required', Rule::unique('users')->ignore($user->id),],
        //     'image' => 'image',
        //     'permissions' => 'required|min:1'
        // ]);

        // $request_data = $request->except(['permissions', 'role_permissions', 'image']);
        // $request_data['role_permissions'] = $request->role_permissions;

        // if ($request_data['role_permissions']  == 'gaming') {
        //     // var_dump($request_data);
        //     // var_dump($request_data['status']);
        //     // exit;
        //     # code...
        //     $request_data['role_permissions']  = 'gaming';
        //     $user->update($request_data);

        //     if ($request->image) {
        //         $upload_path = public_path('uploads/users/' . $request->image->hashName());
        //         Image::make($request->image)->save($upload_path);
        //         $user->clearMediaCollection('photo_user');
        //         $user->addMedia($upload_path)->toMediaCollection('photo_user', 'users');

        //         // var_dump($user->id);
        //         // dd($request->all());
        //         // exit;
        //     }

        //     Alert::toast('Success Title', 'Success Update user gaming ' .  $user->first_name);
        //     return redirect()->route('dashboard.users.index');
        // } else {
        //     # code...
        //     $user->syncPermissions($request->permissions);
        //     $user->update($request_data);

        //     if ($request->image) {
        //         $upload_path = public_path('uploads/users/' . $request->image->hashName());
        //         Image::make($request->image)->save($upload_path);
        //         $user->clearMediaCollection('photo_user');
        //         $user->addMedia($upload_path)->toMediaCollection('photo_user', 'users');

        //         // var_dump($user->id);
        //         // dd($request->all());
        //         // exit;
        //     }

        //     // dd($request_data);

        //     Alert::toast('Success Title', 'Success Updated ' . $user->role_permissions . ' ' .  $user->first_name);
        //     return redirect()->route('dashboard.users.index');
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        if ($user->image != 'user.png') {
            Storage::disk('public_uploads')->delete('/users/' . $user->image);
        } //end of if

        $user->delete();

        // Alert::question('Question Title', 'Question Message');

        // Alert::info('Info Title', 'deleted successfully');

        Alert::toast('deleted successfully user');
        return redirect()->route('dashboard.users.index');
    }

    // @mido_shriks function controller Update status user from 1 to 0 or 0 to 1

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updatestatus(Request $request, User $user)
    {
        $status_user = User::find($request->id);
        if ($status_user->status == 1) {
            # code...
            $status_user->status = $request->status;

            $status_user->save();
            // dd($status_user->status);
            Alert::toast('Success user deacvtiv ' . $user->first_name);
        } else {
            # code...
            $status_user->status = $request->status;

            $status_user->save();
            // dd($status_user->status);
            Alert::toast('Success user acvtivit ' . $user->first_name);
        }

        return redirect()->route('dashboard.users.index');
    }
    // @mido_shriks function controller Update status user from 1 to 0 or 0 to 1

    public function export(Request $request)
    {
        $role = $request->role;
        // dd($request->role);
        Alert::toast('successfully download file',);
        // return Excel::download(new UsersExport('$request->role'), 'data_users.xlsx');
        return Excel::download(new UsersExport($request->role), 'data_users.xlsx');
    } // end of function export
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $profile = User::findOrFail($id);

        // $date_of_birth = "2000-10-25";
        // $age = Carbon::parse($date_of_birth)->diff(Carbon::now())->y;
        // dd($age . " Years"); // To check result

        // $age = Carbon::parse($profile->dob_date)->diff(Carbon::now())->y;

        // dd($profile, $age,);

        // $profile = User::find($user->id);
        return view('dashboard.profiles.index', compact('profile'));
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
    public function update(Request $request, User $user, $id)
    {
        $user = User::findOrFail($id);

        // $user->first_name = $request->first_name;
        // $user->last_name = $request->last_name;
        if ($request->email) {
            # code...
            $user->email = $request->email;
        }
        // $user->phone = $request->phone;
        // $user->dob_date = $request->dob_date;
        // $user->gender = $request->gender;
        // $user->country_id = $request->country_id;
        $user->code_membership =  $user->code_membership;
        if ($request->password) {
            # code...
            $user->password = bcrypt($request->password);
            // dd(bcrypt($request->password) , $user->password);
        }

        // create token device
        $user->device_token = $user->device_token;


        // get type_user where table types
        $types = type::where('name', $user->role_permissions)->first(); // role_permissions = name => type

        if (!$types) {
            $type = type::create([
                'model' => 'user',
                'name' => $user->role_permissions,
            ]);
        }
        // dd($request->all(), $user->role_permissions, $types);
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
                    // dd($user->image, $user);
                    $user->update();
                }

                // syncPermissions role laratrest
                $user->syncPermissions($request->permissions);
                $user->update();

                Alert::success('Success Title', 'Success Save ' . $user->role_permissions . ' ' .  $user->first_name);
                return redirect()->route('dashboard.profiles.show', $id);
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
                return redirect()->route('dashboard.profiles.show', $id);
            }
        }
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
}

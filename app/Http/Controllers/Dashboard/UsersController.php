<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\country;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $select_countries = country::all();

        return view('dashboard.users.index', compact('users', 'select_countries'));
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
        // $request->validate([
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'email' => 'required|unique:users',
        //     'image' => 'image',
        //     'password' => 'required|confirmed',
        //     'permissions' => 'required|min:1'
        // ]);

        // var_dump($request->dob_date);
        // dd($request->all());
        // exit;

        $request_data = $request->except(['password', 'password_confirmation', 'permissions', 'code_membership', 'role_permissions']);
        $request_data['password'] = bcrypt($request->password);

        // @mido_shrisk ++ code_membership
        $count_user = User::all()->count();
        if ($count_user <= $count_user) {
            # code...
            $request_data['code_membership'] =  'M-202201' . $count_user + 1;
        }
        // @mido_shrisk ++ code_membership

        $request_data['role_permissions'] = $request->role_permissions;
        if ($request_data['role_permissions'] == 'gaming') {
            // var_dump($request_data['role_permissions']);

            # code...
            $request_data['role_permissions']  = 'gaming';
            $user = User::create($request_data);

            Alert::success('Success Title', 'Success Save  gaming ' +  $user->first_name);
            return redirect()->route('dashboard.users.index');
        } else {
            // var_dump($request_data['role_permissions']);
            // exit;

            # code...
            $request_data['role_permissions']  = 'admin';

            // var_dump($request_data['code_membership']);
            // var_dump($request_data['role_permissions']);
            // var_dump($count_user);
            // dd($request->all());
            // exit;

            $user = User::create($request_data);
            $user->attachRole('admin');

            $user->syncPermissions($request->permissions);

            // var_dump($request_data['code_membership']);
            // var_dump($request_data['role_permissions']);
            // dd($request->all());
            // exit;

            Alert::success('Success Title', 'Success Save ' . $user->role_permissions . ' ' .  $user->first_name);
            return redirect()->route('dashboard.users.index');
        }
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
        $user = User::find($user->id);
        $select_countries = country::all();
        // dd($user);
        return view('dashboard.users.edit', compact('user', 'select_countries'));
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
        // dd($request->all());

        // $request->validate([
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'email' => ['required', Rule::unique('users')->ignore($user->id),],
        //     'image' => 'image',
        //     'permissions' => 'required|min:1'
        // ]);

        $request_data = $request->except(['permissions', 'role_permissions']);
        $request_data['role_permissions'] = $request->role_permissions;
        if ($request_data['role_permissions']  == 'gaming') {
            // var_dump($request_data);
            // var_dump($request_data['status']);
            // exit;
            # code...
            $request_data['role_permissions']  = 'gaming';
            $user->update($request_data);

            Alert::toast('Success Title', 'Success Update user gaming ' .  $user->first_name);
            return redirect()->route('dashboard.users.index');
        } else {
            # code...
            $user->syncPermissions($request->permissions);
            $user->update($request_data);

            // dd($request_data);

            Alert::toast('Success Title', 'Success Updated ' . $user->role_permissions . ' ' .  $user->first_name);
            return redirect()->route('dashboard.users.index');
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
        // if ($user->image != 'default.png') {

        //     Storage::disk('public_uploads')->delete('/user_images/' . $user->image);
        // } //end of if

        $user->delete();

        // Alert::question('Question Title', 'Question Message');

        // Alert::info('Info Title', 'deleted successfully');

        Alert::toast('Toast Message', 'deleted successfully user');
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
}

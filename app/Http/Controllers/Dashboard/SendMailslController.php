<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Mail\SendMailAds;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\SendMailAdsJop;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class SendMailslController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.notification.emails.index');
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
        // $users = User::all();
        $data = User::select('email')->get();

        // $emails = User::select('email')->get();
        $emails = User::pluck('email')->toArray();

        // dd($users);

        // $users = User::pluck('email')->toArray();
        // foreach ($users as $key => $user) {
        //     # code...
        //     Mail::to($user->email) //midoshriks36@gmail.com
        //         ->send(new SendMailAds(
        //             $user->first_name,
        //             $request->title,
        //             $request->body,
        //         ));
        // }

        // dd($emails);

        // foreach ($emails as $key => $value) {
        //     # code...
        //     SendMailAdsJop::dispatch(
        //         $value->email,
        //         $request->title,
        //         $request->body,
        //     );
        // }

        SendMailAdsJop::dispatch(
            $emails,
            $request->title,
            $request->body,
        );


        // dd($data->count('email'));
        // dd($request->all());
        Alert::toast('Success send all mail ' . $data->count('email')); //.  dd($data->count('email'));
        return redirect()->route('dashboard.index');
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
        //
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

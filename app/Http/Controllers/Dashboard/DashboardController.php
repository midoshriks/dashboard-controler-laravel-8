<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\type;
use App\Models\User;
use App\Models\Product;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\level;
use App\Models\UserLevel;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $total = [
            'admin' => User::where('role_permissions', 'admin')->get(),
            'gaming' => User::where('role_permissions', 'gaming')->get(),
            'questions' => Question::all(),
            'level' => level::all(),

            $coin = type::where('model', 'product')->where('name', 'coin')->first(),
            $helper = type::where('model', 'product')->where('name', 'helper')->first(),
            'coin' => Product::where('type_id', $coin->id)->get(),
            'helper' => Product::where('type_id', $helper->id)->get(),

            'helpers' => Product::where('type_id', $helper->id)->get(),
            'levels' => level::all(),

            // dd($coin),

        ];

        // dd($total['helpers']);

        $first5 = User::select('users.*')->where('role_permissions', 'gaming')->leftjoin('user_levels', function($join){
            $join->select('level_id', 'user_levels.id as joinid');
            $join->on('users.id', '=', 'user_id');
        })->orderBy('level_id', 'DESC')->limit(5)->get();

        // dd($first5[1], User::where('id', '9')->get()[0]->levels);

        return view('dashboard.index', compact('total', 'first5'));
    }
}

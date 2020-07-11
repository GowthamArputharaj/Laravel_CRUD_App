<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        // dd($user->posts);
        $date = [];

        foreach ($user->posts as $value) {
            array_push($date, $value->created_at);
        }

        foreach ($date as $v) {
            // echo $v;
        }

        $data = [
            'posts' => $user->posts,
            'date' => $date
        ];

        // echo $data['date'];
        // return view('dashboard')->with('posts', $user->posts);
        return view('dashboard')->with('data', $data);
    }
}

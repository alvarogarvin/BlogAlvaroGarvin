<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $datos['users'] = User::paginate(10);

        $post = DB::select('SELECT id, COUNT(*) FROM `posts` GROUP BY user_id');

        // dd($post);

        $datos['posts'] = $post;
        return view('users', $datos);
    }
}
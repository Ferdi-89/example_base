<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of user accounts.
     */
    public function index()
    {
        // Paginate users, displaying 10 users per page
        $users = User::paginate(10);

        return view('akademik.user.index', compact('users'));
    }
}

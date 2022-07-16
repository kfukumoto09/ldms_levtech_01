<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use Gate;

class UserController extends Controller
{
    public function mypage() 
    {
        Gate::authorize('isManager');
        return view('projects/mypage');
    }
}

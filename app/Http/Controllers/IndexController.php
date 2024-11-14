<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function userProfile()
    {
        $user = Auth::user();

        return view('profile.show', compact('user'));
    }
}


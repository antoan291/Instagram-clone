<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');//ne moje da sledva usera kogato ne e lognat
    }
    //
    public function store(User $user)
    {
        return auth()->user()->following()->toggle($user->profile);

    }
}

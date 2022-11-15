<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show(User $user) {
        $photo_count = $user->photos->count();
        // filter user photos by last 24 hours and sort by created, then paginate 6
        $photos = $user->photos()->where('created_at', '>=', now()->subDay())->orderBy('created_at', 'desc')->paginate(6);
        return view('users.show')->with(compact('user', 'photos', 'photo_count'));
    }
}

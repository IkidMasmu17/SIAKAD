<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Determine layout based on role
        if ($user->hasRole('admin')) {
            $layout = 'layouts.admin';
        } elseif ($user->hasRole('guru')) {
            $layout = 'layouts.guru';
        } elseif ($user->hasRole('siswa')) {
            $layout = 'layouts.siswa';
        } elseif ($user->hasRole('orangtua')) {
            $layout = 'layouts.orangtua';
        } elseif ($user->hasRole('superadmin')) {
            $layout = 'layouts.app'; // or superadmin layout if exists
        } else {
            $layout = 'layouts.app';
        }

        return view('profile.index', compact('user', 'layout'));
    }
}

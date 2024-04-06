<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class DashController extends Controller
{
    public function dashboard()
    {
        if (Session::has('user')) {
            $user = Session::get('user');
            switch ($user->roles) {
                case 'admin':
                    return view('dashboard.adash', ['user' => $user]);
                case 'assistance':
                    return view('dashboard.assdash', ['user' => $user]);
                case 'vendeur':
                    return view('dashboard.vdash', ['user' => $user]);
                case 'magasiniere':
                    return view('dashboard.mdash', ['user' => $user]);
                default:
                    return redirect()->route('lo');
            }
        } else {
            auth()->logout();
            return redirect()->route('logout')->with('error', 'Your session has expired. Please login again.');
        }
    }
}

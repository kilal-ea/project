<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator; 

class loginController extends Controller
{
    public function v(Request $req)
    {
        $user = session()->get('user');
        
        if ($user) {
            return redirect()->back();
        } else {
            return redirect()->route('logout');
        }
    }
    public function login(Request $req)
    {
        $email = $req->email;
        $password = $req->password;

        $credentials = ['email' => $email, 'password' => $password];

        
        if (Auth::attempt($credentials)) {
              
            $user = DB::table('users')->where('email', $email)->first();
            Session::put('user', $user);
            $n=session()->get('user');
            return redirect()->route('d');

        } else {
            return redirect()->back();
            ;
        }
    }
    public function logout(Request $req)
{
    Auth::logout(); 
    $req->session()->invalidate(); 
    $req->session()->regenerateToken(); 
    return redirect()->route('home');
}
public function profile(Request $req)
{
    $user = session()->get('user');
    
    return view('profile');
}
public function changeprofile(Request $req)
{
    $u = session()->get('user');
    $user = DB::table('users')->where('id', $u->id)->first();
    
    $rules = [
        'name' => 'string|max:255',
        'new_password' => 'nullable|string|min:8|confirmed',
        'confirm_password' => 'required_with:new_password|string|same:new_password|min:8',
        'validation_pass' => 'required|string|min:8',
    ];

    $validator = Validator::make($req->all(), $rules);

    $passwordFromUser = $req->input('validation_pass'); 
    $hashedPasswordFromDB = $user->password;

    if (!$validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    if (password_verify($passwordFromUser, $hashedPasswordFromDB)) {
        $updateData = [];
        if ($req->filled('name')) {
            $updateData['name'] = $req->input('name');
           
        }

        if ($req->filled('new_password')) {
            $updateData['password'] = bcrypt($req->input('new_password'));
        }

        $updateData['updated_at'] = now(); 
        
        if (!empty($updateData)) {
            DB::table('users')
                ->where('id', $user->id)
                ->update($updateData);
                
            session()->put('user', $user); 
            return redirect()->route('d'); 
        }
    } else {
        return redirect()->back()->with('error', 'Invalid password');
    }

    return redirect()->route('d');
}





}

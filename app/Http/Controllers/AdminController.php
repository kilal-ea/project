<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    // View for managing users
    public function user(Request $req)
    { 
        $user = Session::get('user');
        
        if (Session::has('user')) {
            if ($user->roles == 'admin') {
                return view('admin.user');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }
    // View for managing product
    public function produits(Request $req)
    { 
        $user = Session::get('user');
        
        if (Session::has('user')) {
            if ($user->roles == 'admin') {
                return view('admin.products');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }
    // View for adding users
    public function sv(Request $req)
    {
        $user = Session::get('user');
        
        if (Session::has('user') && $user->roles == 'admin') {
            return view('admin.adduser');
        } else {
            return redirect()->back();
        }
    }

// View for adding products
public function addpro(Request $req)
{
    $user = Session::get('user');
    
    if (Session::has('user') && $user->roles == 'admin') {
        return view('admin.addpro');
    } else {
        return redirect()->back();
    }
}

    // Adding a new user
    public function singup(Request $req)
    {
        // Validation rules
        $req->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string|in:admin,assistance,vendeur,magasiniere',
        ]);

        // Inserting user data into the database
        DB::table('users')->insert([
            'name' => $req->input('name'),
            'email' => $req->input('email'),
            'password' => bcrypt($req->input('password')),
            'roles' => $req->input('role'),
            'remember_token' => $req->input('_token'),
            'created_at' => now(),
        ]);
        
        return redirect()->back();
    }

    // Showing all users
    public function showuser(Request $req)
    {
        $user = Session::get('user');
        
        if (Session::has('user') && $user->roles == 'admin') {
            $users = DB::table('users')->get();
            return view('admin.showuser', ['users' => $users]);
        } else {
            return redirect()->back();
        }
    }

    // View for deleting a user
    public function userdeletev(Request $req)
    {
        $user = Session::get('user');
        
        if (Session::has('user') && $user->roles == 'admin') {
            $users = DB::table('users')->get();
            return view('admin.deleteuser', ['users' => $users]);
        } else {
            return redirect()->back();
        }
    }

    // Deleting a user
    public function destroy(Request $request)
    {
        $user = Session::get('user');
        
        if (Session::has('user') && $user->roles == 'admin') {
            $userId = $request->route('user');
            DB::table('users')->where('id', $userId)->delete();
            return redirect()->back()->with('success', 'User deleted successfully.');
        } else {
            return redirect()->back();
        }
    }

    // Showing more information about a user
    public function moreuser(Request $request)
    {
        $user = Session::get('user');
        
        if (Session::has('user') && $user->roles == 'admin') {
            $userId = $request->route('user');
            $user = DB::table('users')
                ->join('citys', 'users.idcity', '=', 'citys.id')
                ->join('sectors', 'citys.idsec', '=', 'sectors.id')
                ->select('users.id', 'users.name', 'users.email', 'users.roles', 'sectors.name as sectors')
                ->where('users.id', $userId)
                ->first();
            return view('admin.oneuser', ['user' => $user]);
        } else {
            return redirect()->back();
        }
    }

    // View for accepting a client
    public function addclientsv()
    {
        $user = Session::get('user');
        
        if (Session::has('user') && $user->roles == 'admin') {
            $clients = DB::table('clients')
                ->where('status', 0)
                ->join('users', 'clients.ids', '=', 'users.id')
                ->select('clients.id', 'clients.name', 'clients.phone', 'users.name as username')
                ->get();
            return view('admin.addclines', ['clients' => $clients]);
        } else {
            return redirect()->back();
        }
    }

    // Accepting a client
    public function addclients(request $request)
    {
        $user = Session::get('user');
        
        if (Session::has('user') && $user->roles == 'admin') {
            $clientId = $request->route('client');
            DB::table('clients')->where('id', $clientId)->update(['status' => 1]);
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    // Showing accepted clients
    public function clientsv(Request $req)
    {
        $user = Session::get('user');
        
        if (Session::has('user') && $user->roles == 'admin') {
            $clients = DB::table('clients')
                ->where('status', 1)
                ->join('users', 'clients.ids', '=', 'users.id')
                ->select('clients.id', 'clients.name', 'clients.phone', 'users.name as username')
                ->get();
            return view('admin.clinesv', ['clients' => $clients]);
        } else {
            return redirect()->back();
        }
    }

    // Showing products
    public function productsv(Request $req)
    {
        $user = Session::get('user');
        
        if (Session::has('user') && $user->roles == 'admin') {
            $pro = DB::table('products')
                ->join('categorys', 'products.category_id', '=', 'categorys.id')
                ->select('products.id', 'products.name', 'products.price', 'categorys.name as catname')
                ->get();
            return view('admin.prov', ['pro' => $pro]);
        } else {
            return redirect()->back();
        }
    }

    // View for changing user password
    public function pass(Request $req)
    { 
        $user = Session::get('user');
        
        if (Session::has('user') && $user->roles == 'admin') {
            $id = $req->route('id');
            $user = DB::table('users')
                ->join('citys', 'users.idcity', '=', 'citys.id')
                ->join('sectors', 'citys.idsec', '=', 'sectors.id')
                ->select('users.id', 'users.name', 'users.email', 'users.roles', 'sectors.name as sectors')
                ->where('users.id', $id)
                ->first();
            return view('admin.oneuser.password', ['user' => $user], ['idup' => $id]);  
        } else {
            return redirect()->back();
        }
    }

    // Changing user password
    public function changepass(Request $req)
    {
        // Validation rules
        $rules = [
            'new_pass' => 'nullable|string|min:8|confirmed',
            'confirm_pass' => 'required_with:new_password|string|same:new_password|min:8',
        ];

        $validator = Validator::make($req->all(), $rules);
        
        if (!$validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Session::get('user');

        if ($user && $user->roles == 'admin') {
            $passwordFromUser = $req->input('validation_pass');
            $updateData = [];

            if ($req->filled('new_pass')) {
                $updateData['password'] = bcrypt($req->input('confirm_pass'));
            }
            
            $id = $req->input('id');
            $updateData['updated_at'] = now(); 

            if (!empty($updateData)) {
                DB::table('users')->where('id', $id)->update($updateData); 
            }

            return redirect()->back(); 
        } else {
            return redirect()->back();
        }
    }

    // View for user stock
    public function stockuser(Request $req)
    { 
        $user = Session::get('user');
        
        if (Session::has('user') && $user->roles == 'admin') {
            $id = $req->route('id');
            $user = DB::table('users')
                ->join('citys', 'users.idcity', '=', 'citys.id')
                ->join('sectors', 'citys.idsec', '=', 'sectors.id')
                ->select('users.id', 'users.name', 'users.email', 'users.roles', 'sectors.name as sectors')
                ->where('users.id', $id)
                ->first();
            
            $stocks = DB::table('users')
                ->join('trucks', 'users.id', '=', 'trucks.idS')
                ->join('stocks', 'trucks.idstock', '=', 'stocks.id')
                ->join('st_p', 'stocks.id', '=', 'st_p.idst')
                ->join('products', 'st_p.idp', '=', 'products.id')
                ->join('categorys', 'products.category_id', '=', 'categorys.id')
                ->select('products.name', 'categorys.name as category_name', 'st_p.quantity_Carton', 'st_p.quantity_piece')
                ->get();
            
            return view('admin.oneuser.stock', ['user' => $user, 'idup' => $id, 'stocks' => $stocks]);
        } else {
            return redirect()->back();
        }
    }
}

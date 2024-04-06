<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
            auth()->logout();
            return redirect()->route('logout')->with('error', 'Your session has expired. Please login again.');
        }
    }
    
    // View for managing products
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
            auth()->logout();
            return redirect()->route('logout')->with('error', 'Your session has expired. Please login again.');
        }
    }
    
    // View for adding products
    public function addprov(Request $req)
    {
        if (Session::has('user')) {
            $user = Session::get('user');
            
            if ($user->roles == 'admin') {
                $cat = DB::table('categorys')->get();
                return view('admin.addpro', ['cat' => $cat]);
            } else {
                return redirect()->back();
            }
        } else {
            auth()->logout();
            return redirect()->route('logout')->with('error', 'Your session has expired. Please login again.');
        }
    }
    
    // Adding products
    public function addpro(Request $req)
    {
        $user = Session::get('user');
        
        if (Session::has('user')) {
            if ($user->roles == 'admin') {
                $req->validate([
                    'name' => 'required|string',
                    'nbpc' => 'required|integer',
                    'category' => 'required|exists:categories,id' 
                ]);

                DB::table('Products')->insert([
                    'name' => $req->input('name'),
                    'nbpc' => $req->input('nbpc'),
                    'category_id' => $req->input('category'),
                    'created_at' => now(),
                ]);

                return redirect()->route('success.route'); 
            } else {
                return redirect()->back();
            } 
        } else {
            auth()->logout();
            return redirect()->route('logout')->with('error', 'Your session has expired. Please login again.');
        }
    }

    // View for adding a new user
    public function sv(Request $req)
    {
        $user = Session::get('user');
        
        if (Session::has('user') ) {
            if ($user->roles == 'admin') {
                return view('admin.adduser');
            }
            else{
                return redirect()->back();
            }
        } else {
            auth()->logout();
            return redirect()->route('logout')->with('error', 'Your session has expired. Please login again.');
        }
    }

    // Adding a new user
    public function singup(Request $req)
    {
        if (Session::has('user')) {
            $user = Session::get('user');
            
            if ($user->roles == 'admin') {
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
            } else {
                return redirect()->back();
            } 
        } else {
            auth()->logout();
            return redirect()->route('logout')->with('error', 'Your session has expired. Please login again.');
        }
    }

    // Showing all users
    public function showuser(Request $request)
    {
        $user = $request->session()->get('user');
        if ($request->session()->has('user')  ){
            if ($user->roles == 'admin') {
                if ($request->method() == 'POST') {
                // Handle form submissions for filtering users
                $role = $request->input('role');
                $cec = $request->input('cec'); // Corrected variable name
                
                // Build your query based on the selected filters
                $query = DB::table('users')
                ->join('citys', 'users.idcity', '=', 'citys.id')
                ->join('sectors', 'citys.idsec', '=', 'sectors.id')
                ->where('deleted', 0) 
                ->select('users.id', 'users.name', 'users.email', 'users.roles', 'sectors.name as sectors');

                // Apply filters if they are selected
                if ($role) {
                    $query->where('users.roles', $role);
                }
                if ($cec) {
                    $query->where('sectors.name', $cec); 
                }
                if ($cec && $role) {
                    $query->where('sectors.name', $cec )->where( 'users.roles', $role); 
                }
                
                // Execute the query
                $users = $query->get();
                
                // Retrieve all sectors for the dropdown
                $ceq = DB::table('sectors')->get();
                
                return view('admin.showuser', ['users' => $users, 'ceq' => $ceq]);
            } else {
                $query = DB::table('users')
                    ->join('citys', 'users.idcity', '=', 'citys.id')
                    ->join('sectors', 'citys.idsec', '=', 'sectors.id')
                    ->where('deleted', 0) // Fetch non-deleted users
                    ->select('users.id', 'users.name', 'users.email', 'users.roles', 'sectors.name as sectors');
                    
                $ceq = DB::table('sectors')->get();
                
                // Execute the query and fetch the users
                $users = $query->get();
                
                return view('admin.showuser', ['users' => $users, 'ceq' => $ceq]);
            }
            }
            else{
                return redirect()->back();
            }
            
            
        } else {
            auth()->logout();
            return redirect()->route('logout')->with('error', 'Your session has expired. Please login again.');
        }
    }


    // Deleting a user
    public function destroy(Request $request)
    {
        $user = Session::get('user');
        
        if (Session::has('user')  ) {
            if ($user->roles == 'admin') {
                $userId = $request->route('user');
                DB::table('users')->where('id', $userId)->update(['deleted' => 1]);
                return redirect()->route("showuser");
            }
            else {
                return redirect()->back();
            } 
        } else {
            auth()->logout();
            return redirect()->route('logout')->with('error', 'Your session has expired. Please login again.');
        }
    }

    // Showing more information about a user
    public function moreuser(Request $request)
    {
        $user = Session::get('user');
        
        if (Session::has('user')) {
            if ($user->roles == 'admin') {
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
        } else {
            auth()->logout();
            return redirect()->route('logout')->with('error', 'Your session has expired. Please login again.');
        }
    }

    // Showing products
    
    public function productsv(Request $request)
{
    $user = $request->session()->get('user');
    if ($request->session()->has('user')) {
        if ($user->roles == 'admin') {
            if ($request->method() == 'POST') {
                $categories = $request->input('cat');

                $pros = DB::table('products')
                    ->join('categorys', 'products.category_id', '=', 'categorys.id')
                    ->select('products.id', 'products.name', 'products.price', 'categorys.name as catname');

                if ($categories) {
                    $pros->where('categorys.name', $categories);
                }

                $pro = $pros->get();

                $ceq = DB::table('categorys')->get();

                return view('admin.prov', ['pro' => $pro, 'categories' => $ceq]);
            } else {
                $pro = DB::table('products')
                    ->join('categorys', 'products.category_id', '=', 'categorys.id')
                    ->select('products.id', 'products.name', 'products.price', 'categorys.name as catname')
                    ->get();

                $categories = DB::table('categorys')->get();

                return view('admin.prov', ['pro' => $pro, 'categories' => $categories]);
            }
        } else {
            return redirect()->back();
        }
    } else {
        auth()->logout();
        return redirect()->route('logout')->with('error', 'Your session has expired. Please login again.');
    }
}


    // View for changing user password
    public function pass(Request $req)
    { 
        $user = Session::get('user');
        
        if (Session::has('user') ) {
            if ($user->roles == 'admin') {
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
        } else {
            auth()->logout();
            return redirect()->route('logout')->with('error', 'Your session has expired. Please login again.');
        }
    }

    // Changing user password
    public function changepass(Request $req)
    {
        $user = Session::get('user');
        
        if (Session::has('user') ) {
            $rules = [
                'new_pass' => 'nullable|string|min:8|confirmed',
                'confirm_pass' => 'required_with:new_password|string|same:new_password|min:8',
            ];

            $validator = Validator::make($req->all(), $rules);
            
            if (!$validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

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
        } else {
            auth()->logout();
            return redirect()->route('logout')->with('error', 'Your session has expired. Please login again.');
        }
    }

    // View for user stock
    public function stockuser(Request $req)
    { 
        $user = Session::get('user');
        
        if (Session::has('user') ) {
            if ($user->roles == 'admin') {
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
                
        } else {
            auth()->logout();
            return redirect()->route('logout')->with('error', 'Your session has expired. Please login again.');
        }
    }

    public function ventV(Request $req)
    { 
        $user = Session::get('user');
        
        if (Session::has('user') ) {
            if ($user->roles == 'admin') {
                 
            } else {
                return redirect()->back();
            }
                
        } else {
            auth()->logout();
            return redirect()->route('logout')->with('error', 'Your session has expired. Please login again.');
        }
    }
     // View for accepting a client 
     public function addclientsv()
     {
         $user = Session::get('user');
         
         if (Session::has('user')) {
             if ($user->roles == 'admin') {
                 $clients = DB::table('clients')
                     ->where('status', 0)
                     ->join('users', 'clients.ids', '=', 'users.id')
                     ->select('clients.id', 'clients.name', 'clients.phone', 'users.name as username')
                     ->get();
                 return view('admin.clients.clientsadd', ['clients' => $clients]);
             } else {
                 return redirect()->back();
             }
         } else {
             auth()->logout();
             return redirect()->route('logout')->with('error', 'Your session has expired. Please login again.');
         }
     }

     // Accepting a client 
     public function addclients(request $request)
     {
         $user = Session::get('user');
         
         if (Session::has('user')  ) {
             if ($user->roles == 'admin') {
                 $clientId = $request->route('client');
                 DB::table('clients')->where('id', $clientId)->update(['status' => 1]);
                 return redirect()->back();
             } else {
                 return redirect()->back();
             }
         } else {
             auth()->logout();
             return redirect()->route('logout')->with('error', 'Your session has expired. Please login again.');
         }
     }
 
     // Showing accepted clients  
     public function clients(Request $req)
     {
         $user = Session::get('user');
         
         if (Session::has('user') ) {
             if ($user->roles == 'admin') {
                 $clients = DB::table('clients')
                     ->where('status', 1)
                     ->join('users', 'clients.ids', '=', 'users.id')
                     ->join('citys', 'clients.idCity', '=', 'citys.id')
                     ->select('clients.id', 'clients.name', 'clients.phone', 'users.name as username', 'citys.name as city')
                     ->get();
                    
                return view('admin.clients.clientsv', ['clients' => $clients]);
            } else {
                 return redirect()->back();
             }
         } else {
             auth()->logout();
             return redirect()->route('logout')->with('error', 'Your session has expired. Please login again.');
         }
     }
     // View for managing cliets
    public function clientsv(Request $req)
    { 
        $user = Session::get('user');
        
        if (Session::has('user')) {
            if ($user->roles == 'admin') {
                return view('admin.clients.client');
            } else {
                return redirect()->back();
            }
        } else {
            auth()->logout();
            return redirect()->route('logout')->with('error', 'Your session has expired. Please login again.');
        }
    }
    //  delete client
    public function deletclient(request $request)
    {
        $user = Session::get('user');
        
        if (Session::has('user')  ) {
            if ($user->roles == 'admin') {
                $clientId = $request->route('client');
                DB::table('clients')->where('id', $clientId)->update(['status' => 2]);
                return redirect()->back();
            } else {
                return redirect()->back();
            }
        } else {
            auth()->logout();
            return redirect()->route('logout')->with('error', 'Your session has expired. Please login again.');
        }
    }

     // View for deleted  client 
     public function deletedlientsv()
     {
         $user = Session::get('user');
         
         if (Session::has('user')) {
             if ($user->roles == 'admin') {
                 $clients = DB::table('clients')
                     ->where('status', 2)
                     ->join('users', 'clients.ids', '=', 'users.id')
                     ->select('clients.id', 'clients.name', 'clients.phone', 'users.name as username')
                     ->get();
                 return view('admin.clients.deletedclients', ['clients' => $clients]);
             } else {
                 return redirect()->back();
             }
         } else {
             auth()->logout();
             return redirect()->route('logout')->with('error', 'Your session has expired. Please login again.');
         }
     }
    
}

<?php

namespace App\Http\Controllers;

use Carbon\Exceptions\InvalidDateException;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use InvalidArgumentException;

class UserController extends Controller
{
    function sandForm()
    {
        $data['title']  =   'Password';
        return view('user.password', $data);
    }

    function sandAction(Request $request)
    {
        $request->validate([
            'OldSand'        =>  'required',
            'NewSand'        =>  'required',
            'ConfNewSand'    =>  'required|same:NewSand',
        ]);

        if(Hash::check($request->OldSand, Auth::user()->password))
        {
            $user   =   User::find(Auth::id());
            $user   ->  password = Hash::make($request->NewSand);
            $user->save();
            return redirect()->route('password')->with('msg','Password has Changed');
        }
        else
        {
            return back()->withErrors(['Latest password is Wrong!']);
        }
    }   
    
    function show()
    {
        return redirect()->route('user.index')
            ->with('msg', 'User Added');
    }

    public function destroy(User $id)
    {
        
        $id->delete();
        return redirect()->back();
    }

    function update(Request $request, User $user)
    {
        $request->validate([
                'name'  =>  'required',
            ]);

        $user->name = $request->name;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('user.index')->with('msg', 'Data is Saved');
    }

    function edit(User $user)
    {
        $data['title']  =   'Edit Profile';
        $data['user']   =   $user;

        return view('user.edit', $data);
    }

    function store(Request $request)
    {
        $request->validate([
                'name'      =>  'required',
                'username'  =>  'required|unique:tb_user',
                'email'     =>  'required|unique:tb_user',
                'password'  =>  'required',
            ]);

        $user = new User([
                'name'      =>  $request->name,
                'username'  =>  $request->username,
                'email'     =>  $request->email,
                'password'  =>  Hash::make($request->password),
            ]);
        $user->save();

        return redirect()->route('user.index')
            ->with('msg', 'User Added');
    }

    function create()
    {
        $data['title']  = 'Add User';
        return view('user.create', $data);
    }

    // USER PAGE 
    function index(Request $request)
    {
        $users = User::where('name', 'like', '%' . $request->get('q') . '%')
            ->paginate(15)->WithQueryString();
        $data =
            [
                'title' => 'User Page',
                'users' => $users,
                'q'     => $request->get('q'),
            ];

        return view('user.index', $data);
        if (count($data)) {
        }
    }

    function loginForm()
    {
        //TITLE
        $data['title'] = 'Login';
        //Setelah mengisikan semua Form dengan benar maka akan di arahkan ke 'user.login'(user/login.blade.php)
        return view('user.login', $data);
    }

    function loginAction(Request $request)
    {
        //Jika 'username' dan 'password' benar maka akan di arahkan ke 'home'(page/home.blade.php)
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('home');
        } else //Jika salah satu atau semua salah, atau tidak di isikan maka akan muncul notif eror seperti dibawah
        {
            return back()->withErrors(['Wrong Username and Password Combination']);
        }
    }

    function logOut(Request $request)
    {
        //Jika Logout di klik, maka 'user' akan keluar, dan halaman mengarah ke 'home'
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('home');
    }
}

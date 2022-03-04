<?php

namespace App\Http\Controllers\Vaxtracing\Auth;

use App\Http\Controllers\Controller;
use App\Models\Vaxtracing\Person;
use App\Models\Vaxtracing\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        //Validate request
        $request -> validate([
            'email' => 'required:email',
            'password' => 'required|min:5|max:22'
        ]);

        $user = User::with('person')->where('email', '=', $request->email)->first();

        if(!$user){
            return back()->with('error', 'We do not recognize your email');
        }
        else{
            
            if(Hash::check($request->password, $user ->password)){
                $request->session()->put('LoggedUser', $user);
                saveActivityLog(generateFullName(session('LoggedUser')), "Logged in");
                return redirect(route('get_admin_dashboard'));
            
            }
            else{
                return back()->with('error', 'Incorrect password');
            }
        }
    }

    public function view_login()
    {
        if(session()->has('LoggedUser')){
            return back();
        }

        return view('Vaxtracing.auth.Login.index');
    }

    public function logout()
    {
        if(session()->has('LoggedUser')){
            saveActivityLog(generateFullName(session('LoggedUser')), "Logged out");
            session()->pull('LoggedUser');
            session()->flush();
            return redirect()->route('home');
        }
    }

}

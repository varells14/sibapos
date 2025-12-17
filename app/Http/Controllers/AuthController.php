<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function register(request $request)
    {
        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'lokasi' => $request->lokasi,
            'password' => Hash::make($request->password),
        ]);
         return back()->with('success', 'Registration successful. Please login.');
    }

    public function login(Request $request)
{
    $user = User::where('name', $request->name)
                ->orWhere('email', $request->name)  
                ->first();

    if ($user && Hash::check($request->password, $user->password)) {
        Auth::login($user);               
        
        return redirect()->intended(route('dashboard'));
    }

    return back()->with('error', 'Invalid username/email or password.');
}


    public function logout(Request $request)
    {
        Auth::logout();                           
        return redirect('/')->with('success', 'You have been logged out successfully.');
    }

    public function changePassword(Request $request)
    {
         
        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();
        Auth::logout();
        return redirect('/')
            ->with('success', 'Your password has been changed successfully. Please login again.');
    }

}

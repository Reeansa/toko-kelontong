<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate( Request $request ): RedirectResponse
    {
        $request->validate( [ 
            'email'    => [ 'required', 'email:dns' ],
            'password' => [ 'required', 'min:6', 'max:10' ],
            'status' => ['active'],
        ] );

        if ( Auth::attempt( [ 'email' => $request->email, 'password' => $request->password, 'status' => 'active' ] ) ) {
            $request->session()->regenerate();

            return redirect()->intended( '/' );
        } elseif(Auth::attempt( [ 'email' => $request->email, 'password' => $request->password, 'status' => 'nonactive' ] )) {
            return back()->withErrors( [ 
                'email' => 'akun anda sudah dinonaktifkan!',
            ] )->onlyInput( 'email' );
        }

        return back()->with([ 'error' => 'email atau password salah' ]);

        
    }
    public function loginProcess() {
        
    }
    public function register() {
        return view( 'register' );
    }
    public function registerProcess(Request $request): RedirectResponse {

        $validated = $request->validate( [ 
            'name' => 'required',
            'email'  => [ 'required', 'unique:users', 'email:dns'],
            'password'  => [ 'required', 'min:6', 'max:10'],
        ] );

        User::create( $validated );
        return redirect()->route( 'login' )->with( 'success', 'Register success, please login' );
    }

    public function logout( Request $request ): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect( 'login' );
    }
}

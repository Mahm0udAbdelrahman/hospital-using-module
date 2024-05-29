<?php

namespace Modules\Doctors\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
     /**
     * Display a listing of the resource.
     * @return Renderable
     */

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function index()
    {
        return view('doctors::auth.login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            // 'g-recaptcha-response' => 'required'
        ]);

        $credentials = $request->only('phone');
        if (Auth::attempt($credentials, true)) {
            return to_route('dashboard');
        }
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    protected function authenticated(Request $request, $user)
    {
        Alert::info('Selamat datang ' . $user->name)->toToast();
        return to_route('dashboard');
    }
}
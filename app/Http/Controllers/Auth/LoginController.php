<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Register_specialist;
use App\Models\User;
use App\Models\Verification;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            // 'password' => 'required',
            // 'g-recaptcha-response' => 'required'
        ]);

        // $credentials = $request->only('phone');
        // $verification = Verification::where('code',$request->input('code'))->first();
        // $verification->generateCode();
        $admin=User::where('phone',$request->phone)->first();
        if (isset($admin)) {
            // return to_route('dashboard');
            // Verification::create([
            //     'user_id'=>,
            //     'code'=>
            // ]);

            $code= rand(1000,9999);
            Verification::create([
                'user_id'=>$admin->id,
                'code'=>$code
            ]);
            return redirect()->route("verification.index");

        }else{
            throw ValidationException::withMessages([
                $this->username() => [trans('auth.failed')],
            ]);
        }

    }

    protected function authenticated(Request $request, $user)
    {
        Alert::info('Selamat datang ' . $user->name)->toToast();
        return to_route('dashboard');
    }
}
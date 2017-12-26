<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Auth;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (!Auth::user()) {
            return redirect('/home');
        }

        $this->middleware('guest');
    }

    public function showPassword(Request $request, User $user)
    {
        $user = Auth::user();
        return view('user.changepassword', compact('request', 'user'));
    }

    public function changePassword(Request $request, User $user)
    {
        
        //$this->middleware('auth');
        $user = Auth::user();

        $user->username = $user->username;
        $user->password = bcrypt($request->password);

        $user->save();
// dd('change pw');
        // return view('user.profile', compact('request', 'user'));
        return redirect('home')->withSuccessMessage('User created successfully!');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'username' => $request->username]
        );
    }

    protected function rules()
    {
        return [
            'token' => 'required', 
            'username' => 'required',
            'password' => 'required|confirmed|min:6',
        ];
    }

    protected function credentials(Request $request)
    {
        return $request->only(
            'username', 'password', 'password_confirmation', 'token'
        );
    }

    protected function sendResetFailedResponse(Request $request, $response)
    {
        return redirect()->back()
            ->withInput($request->only('username'))
            ->withErrors(['username' => trans($response)]);
    }

}


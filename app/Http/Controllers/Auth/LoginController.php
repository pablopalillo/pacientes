<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Login
     * Por defecto existe un metodo Auth:login, pero solo para web.
     * Para que funcione como API, debemos sobreescribir el comportamiento
     * del metodo login. 
     */
    public function login(Request $request)
    {
        $response = array(
                        "response" => 0,
                        "code" => null,
                        "error" => null
                    );
        try {

            if ( Auth::attempt(
                ['email' => $request->input('email'),
                 'password' => $request->input('password')])
            ) {

                if (Auth::user()) {
                    $userAuth = Auth::user();

                    /** Respuesta para usuario valido */
                    return response()->json(Auth::user());
                } 
                
            }

            /** Respuesta para usuario no valido */
            $response["response"] = 0;
            $response["error"] = "Usuario no valido";
            $response["code"]  = 401;

            return response()->json($response);

          
        } catch (Exception $e) {

            $response["response"] = 0;
            $response["error"] = "Server error";
            $response["code"] = 500;
            
            return response()->json($response);
        }
    }
}

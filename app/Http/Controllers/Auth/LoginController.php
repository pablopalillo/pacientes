<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

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

                    // Token de usuario 
                    $userAuth->remember_token = str_random(60);
                    $userAuth->save();

                    // Respuesta para usuario valido 
                    $response["response"] = 1;
                    $response["code"] = 200;

                    $response["id"]     = $userAuth->id;
                    $response["name"]   = $userAuth->name;
                    $response["email"]  = $userAuth->email;
                    $response["token"]  = $userAuth->remember_token;
                
                    return response()->json($response);
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

    /**
     * Logout
     * token: campo Remember_token guardado para cada usuario
     * 
     * Por defecto existe un metodo Auth:logout, pero solo para web.
     * Para que funcione como API, debemos sobreescribir el comportamiento
     * del metodo login. 
     */

     public function logout(Request $request)
     {

        $apiToken = $request->input('token');

        $response = array(
            "response" => 0,
            "code" => null,
            "error" => null
        );

        try {
            if (!empty($apiToken)) {

                $loggedUser =  User::where("remember_token", $apiToken)->first();

                if($loggedUser) {

                    $loggedUser->remember_token = null;

                    $response["response"] = 1;
                    $response["code"] = 200;
                    return response()->json($response);
                }   
            }

            $response["response"] = 0;
            $response["code"] = 400;
            $response["error"] = "usuario no encontrado";

        } catch (Exception $e) {
            $response["response"] = 0;
            $response["error"] = "Server error";
            $response["code"] = 500;
            
            return response()->json($response);
        }

     }

}

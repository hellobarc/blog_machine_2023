<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Image;
use File;

class AuthController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    public function register(Request $request)
    {

        $validation = Validator::make($request->all(),[
            'name' => 'required|string|min:5|max:100',
            'email' => 'required|string|email|unique:users',
            'password'=> 'required|min:8',
            'confirm_password' => 'required|same:password',
            'avatar' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if( $validation->fails())
        {
            $response = [
                'success' => false,
                'message' => $validation->errors(),
            ];

            return response()->json($response, 400);
        }

        // $image = $request->file('avatar');
    	// $img = time() . '.' . $image->getClientOriginalExtension();
	    // $location = public_path('uploads/users/' .$img);

	    // Image::make($image)->save($location);

        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'avatar' => $img,
        ]);

        $response = [
            'success' => true,
            'data' => $users,
            'message' => 'User Registered Successfully',
        ];
        return response()->json($response, 200);
    }

    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {

            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

           // $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {

                if($request->route()->getPrefix() === 'api') {
                    //$token = $this->guard()->attempt($credentials);
                    //return $this->respondWithToken($token);

                        // RETURN A JSON ??


                }else{
                    // WEB //
                    $request->session()->regenerate();
                    if( Auth::user()->rolled_user->role_name == "admin"){
                        return redirect()->route('admin.dashboard');
                    }
                    // WEB end //
                }
            }else{
                if($request->route()->getPrefix() === 'api') {
                    return response()->json(['error' => 'Unauthorized'], 401);
                }else{
                    //WEB  //
                    return back()->withInput();
                }
            }


        }else{
            if($request->route()->getPrefix() === 'api') {
                return response()->json(['error' => 'Unauthorized'], 401);
            }else{
                //web //
                if (Auth::check()) {
                    dd(Auth::user());
                }else{
                    return view('auth.login');
                }

            }
        }

    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json($this->guard()->user());
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard();
    }
}

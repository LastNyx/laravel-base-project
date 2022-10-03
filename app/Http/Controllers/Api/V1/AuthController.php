<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')
            ->except('login','register','refresh');

    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->ErrorResponse($validator->messages(), 401);
        }

        $credentials = $request->only('username', 'password');

        $token = Auth::attempt($credentials);

        if (!$token) {
            $user = user::where('username', $request->username)->first();
            if($user){
                return $this->ErrorResponse('Wrong Password', 401);
            }
            return $this->ErrorResponse('User Not Exists', 401);
        }

        $user = auth()->user();
        $currentUser = User::find($user->id);

        return $this->AuthorizationResponse('Token Refreshed', $currentUser, $token);
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6',
        ],[
            'required' => 'The :attribute field is required.',
        ]);

        if ($validator->fails()) {
            return $this->ErrorResponse($validator->messages(), 401);
        }

        try{
            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);
        }catch(\Exception $e){
            return $this->ErrorResponse('Register Error', 401);
        }


        // $user-> assignRole('user');

        $token = Auth::login($user);

        return $this->AuthorizationResponse('User Created Successfully', $user, $token);
    }

    public function me()
    {
        $user = auth()->user();
        $currentUser = User::find($user->id);

        return $this->SuccessResponse('Current User Details', $currentUser);
    }

    public function logout()
    {
        auth()->logout();

        return $this->SuccessResponse('Successfully logged out');
    }

    public function refresh()
    {
        try{
            $token = Auth::refresh();
        }catch (\Exception $e){
            return $this->ErrorResponse('Bad Request for Refreshing Token', 400);
        }

        $user = auth()->user();
        $currentUser = User::find($user->id);

        return $this->AuthorizationResponse('Token Refreshed', $currentUser, $token);
    }
}

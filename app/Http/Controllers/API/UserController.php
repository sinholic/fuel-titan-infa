<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
    public $successStatus = 200;

    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password'), 'imei' => request('imei')])) {
            $user = Auth::user();
            $data['token'] = $user->createToken('nApp')->accessToken;
            $data['message'] = "Login successfully";
            return response()->json([
                'success' => true,
                'data' => $data
            ], $this->successStatus);
        } else {
            $data['message'] = "Unauthorised, are you forgotting your password or change device?";
            return response()->json([
                'success' => false,
                'data' => $data
            ], 401);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['erorr' => $validator->errors()], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('nApp')->accessToken;
        $success['name'] = $user->name;

        return response()->json(['success' => $success], $this->successStatus);
    }

    public function details()
    {
        $data = Auth::user();
        return response()->json([
            'success' => true,
            'data' => $data
        ], $this->successStatus);
    }
}

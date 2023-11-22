<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function check_username(Request $request)
    {
        $username = $request->username;
        $result = DB::table('users')->where('username', $username)->first();
        if ($result) {
            return response()->json(['status' => 0]);
        } else {
            return response()->json(['status' => 1]);
        }
    }
    public function register_me(Request $request)
    {
        $validator = Validator($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'username' => 'required|unique:users,username',
            'role' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'message' => $validator->errors()->first()]);
        } else {
            $register_data = [
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'phone' => $request->phone,
                'role' => $request->role,
                'status' => 'pending',
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $result = DB::table('users')->insertGetId($register_data);
            $profile_data = [
                'user_id' => $result,
                'first' => $request->first_name,
                'last' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'registration_date' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $final_result = DB::table('profile')->insertGetId($profile_data);
            if ($final_result) {
                return response()->json(['status' => 1, 'message' => 'Registration successfully']);
            } else {
                return response()->json(['status' => 0, 'message' => $result]);
            }
        }
    }

    public function login_me(Request $request)
    {
        $validator = Validator($request->all(), [
            'username' => 'required|exists:users,username',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'message' => $validator->errors()->first()]);
        } else {
            $UserStatus = DB::table('users')
                ->select('*')
                ->where('username', $request->username)
                ->get();  //

            if (count($UserStatus) > 0) {
                if ($UserStatus[0]->status == 'active') {
                    $LoginUser = Auth::guard('users')->attempt([
                        'username' => $request->username,
                        'password' => $request->password
                    ]);
                    return response()->json(['status' => 1, 'message' => 'Login successfully']);
                } else {
                    return response()->json(['status' => 0, 'message' => 'Account Not Active']);
                }
            } else {
                return response()->json(['status' => 0, 'message' => 'Username not found']);
            }
        }
    }
}

<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function admin()
    {
        $arrayName = [];
        $users = DB::table('users')->where('role', 'admin')->get();
        foreach ($users as $value) {
            $profile = DB::table('profile')->where('user_id', $value->id)->get();
            $data = array([
                'id' => $value->id,
                'first_name' => $profile[0]->first,
                'last_name' => $profile[0]->last,
                'username' => $value->username,
                'role' => $value->role,
                'image' => $profile[0]->image,
                'joining_date' => $profile[0]->registration_date,
                'status' => $value->status,
            ]);
        }
        return view('backend.users.index', compact('data'));
    }

    public function create()
    {
        return view('backend.users.create');
    }

    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users,username',
            'role' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required',
            'role' => 'required',
            'status' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
            'support_pin' => 'numeric|digits:4',
            'transaction_pin' => 'numeric|digits:4',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'message' => $validator->errors()->first()]);
        } else {
            if ($request->email_verified == '0') {
                $email_var = '1';
            } else {
                $email_var = '0';
            }
            $register_data = [
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'phone' => $request->phone,
                'role' => $request->role,
                'status' => $request->status,
                'support_pin' => $request->support_pin ?? null,
                'txn_pin' => $request->transaction_pin ?? null,
                'email_verified' => $email_var,
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
                return response()->json(['status' => 1, 'message' => 'User Created successfully']);
            } else {
                return response()->json(['status' => 0, 'message' => $result]);
            }
        }
    }
}

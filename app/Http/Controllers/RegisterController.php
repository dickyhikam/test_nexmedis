<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        $data['title'] = "Register";
        // $data['year'] = now()->year;
        return view('register/index', $data);
    }

    public function action_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first' => 'required|string',
            'last' => 'required|string',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                function ($attribute, $value, $fail) {
                    // Periksa keunikan email
                    $existingEmail = UsersModel::where('email', $value)->first();
                    if ($existingEmail) {
                        $fail($attribute . ' has already been taken.');
                    }
                },
            ],
            'login.password' => 'required|string|min:6|max:255|regex:/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
        ], [
            'attributes' => [
                'login.password' => 'password'
            ]
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // data save to database
        $user = new UsersModel();
        $user->first_name = $request->input('first');
        $user->last_name = $request->input('last');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('login.password'));
        // Menyimpan data ke database dan memeriksa hasilnya
        if ($user->save()) {
            return redirect()->route('login')->with([
                'message' => 'User successfully created.',
                'alert-type' => 'success' // Tipe notifikasi: info, warning, success, error
            ]);
        } else {
            return redirect()->back()->with([
                'message' => 'Failed to create user.',
                'alert-type' => 'error' // Tipe notifikasi: info, warning, success, error
            ])->withInput();
        }
    }
}

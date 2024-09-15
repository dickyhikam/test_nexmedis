<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        $data['title'] = "Auth";
        // $data['year'] = now()->year;
        return view('auth/index', $data);
        // // $hashedPassword = Hash::make('Test@123');
        // echo Hash::make('Test@123');
    }

    public function action_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                'string',
                'email',
                'max:255'
            ],
            'login.password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $email = $request->input('email');
        $passowrd = $request->input('login.password');
        $user = UsersModel::where('email', $email)->first();
        if ($user) {
            if (Hash::check($passowrd, $user->password)) {
                // Mengautentikasi pengguna
                Auth::login($user);

                // Menyimpan data pengguna ke sesi
                Session::put('user_id', $user->id);
                Session::put('user_email', $user->email);
                Session::put('user_first', $user->first_name);
                Session::put('user_last', $user->last_name);

                return redirect()->route('social_media');
            } else {
                return redirect()->back()->with([
                    'message' => 'The password you entered was not found, try another account.',
                    'alert-type' => 'error' // Tipe notifikasi: info, warning, success, error
                ])->withInput();
            }
        } else {
            return redirect()->back()->with([
                'message' => 'The email you entered was not found, try another account.',
                'alert-type' => 'error' // Tipe notifikasi: info, warning, success, error
            ])->withInput();
        }
    }

    public function logout()
    {
        // Mengeluarkan pengguna
        Auth::logout();

        // Menghapus semua data sesi (opsional, biasanya tidak diperlukan jika menggunakan Auth::logout())
        Session::flush();

        // Redirect ke halaman login atau halaman lain setelah logout
        return redirect()->route('login');
    }
}

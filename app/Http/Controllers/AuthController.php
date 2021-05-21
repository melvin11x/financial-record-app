<?php

namespace App\Http\Controllers;

use App\Models\Token;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $r)
    {
        $r->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $r->email)->first();

        if ($user) {
            $checkPassword = Hash::check($r->password, $user->password);

            if ($checkPassword) {
                $token = md5($r->name) . Carbon::now()->format('Ymd');

                Token::create(['user_id' => $user->id, 'token' => $token]);

                session(['token' => $token]);
                session()->save();

                return redirect()->route("page.$user->role.dashboard");
            } else {
                return back()->withInput()->with('message', 'Incorrect email or password');
            }
        } else {
            return back()->withInput()->with('message', 'Incorrect email or password');
        }
    }

    public function register(Request $r)
    {
        $data = $r->validate([
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|email|min:14|max:150|unique:users,email',
            'password' => 'required|confirmed|string|min:6|max:16'
        ]);

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect()->to('/login');
    }

    public function logout()
    {
        Token::where('token', session('token'))->delete();

        session()->forget('token');

        return redirect()->to('/login');
    }
}

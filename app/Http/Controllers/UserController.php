<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserAuthRequest;
use App\Http\Requests\UserStoreRequest;

class UserController extends Controller
{
    public function register(){
        return view('users.register');
    }

    public function store(UserStoreRequest $request){
        //この時点でStoreUserRequestによりバリデーション済み
        $formFields = $request->validated();
        $formFields['password'] = bcrypt($formFields['password']);

        //新規ユーザー作成
        $user = User::create($formFields);
        //ログインする
        auth()->login($user);

        return redirect('/')->with('message', '新規ユーザーを作成してログインしました！');
    }

    public function login(){
        return view('users.login');
    }

    public function authenticate(UserAuthRequest $request){ {
        $formFields = $request->safe()->only(['email', 'password']);
        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'ログインしました！');
        }

        return back()->withErrors(['email' => '資格情報が不正'])->onlyInput('email');
    }
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect('/')->with('message', 'ログアウトしました！');
    }
}

<form action="/users/authenticate" method="POST">
    @csrf
    <div>
        <label>メールアドレス：</label>
        <input type="text" name="email" value="{{ old('email') }}"/>
    </div>

    @error('email')
        {{ $message }}
    @enderror

    <div>
        <label>パスワード：</label>
        <input type="text" name="password" value="{{ old('password') }}"/>
    </div>

    @error('password')
        {{ $message }}
    @enderror

    <button type="submit" >
        ログイン
    </button>

    <p>
        アカウントがありませんか？
        <a href="/register">ユーザー登録</a>
    </p>
</form>

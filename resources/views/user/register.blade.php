<form action="/users" method="POST">
    @csrf
    <div>
        <label>アカウント名：</label>
        <input type="text" name="name" value="{{ old('name') }}"/>
    </div>

    @error('name')
        {{ $message }}
    @enderror

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

    <div>
        <label>パスワード確認：</label>
        <input type="text" name="password_confirmation" value="{{ old('password_confirmation') }}"/>
    </div>

    @error('password_confirmation')
        {{ $message }}
    @enderror

    <button type="submit" >
        ユーザー登録
    </button>
</form>

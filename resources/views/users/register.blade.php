<form action="/users" method="POST">
    @csrf
    <div>
        <label>account name: </label>
        <input type="text" name="name" value="{{ old('name') }}"/>
    </div>

    @error('name')
        {{ $message }}
    @enderror

    <div>
        <label>mail address: </label>
        <input type="text" name="email" value="{{ old('email') }}"/>
    </div>

    @error('email')
        {{ $message }}
    @enderror

    <div>
        <label>password: </label>
        <input type="text" name="password" value="{{ old('password') }}"/>
    </div>

    @error('password')
        {{ $message }}
    @enderror

    <div>
        <label>password confirmation: </label>
        <input type="text" name="password_confirmation" value="{{ old('password_confirmation') }}"/>
    </div>

    @error('password_confirmation')
        {{ $message }}
    @enderror

    <button type="submit" >
        Register
    </button>
</form>

<form action="/users/authenticate" method="POST">
    @csrf
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

    <button type="submit" >
        Login
    </button>

    <p>
        No account?
        <a href="/users/register">Register</a>
    </p>
</form>

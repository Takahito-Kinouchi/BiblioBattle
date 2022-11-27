<form action="/email/verification-notification" method="POST">
    @csrf
    <div>
        <label>account email address: </label>
        <p>{{ auth()->user->email }}</p>
    </div>

    <button type="submit" >
        Resend
    </button>
</form>

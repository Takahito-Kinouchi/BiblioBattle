<form action="/email/verification-notification" method="POST">
    @csrf
    <div>
        Your email adrress needs to be verified before posting in this site.
    </div>

    <button type="submit" >
        Resend Verification
    </button>
</form>

<p>Vote for this review!</p>
    @auth
    <form action="/votes/upvote" method="POST">
        @csrf
        <button type="submit" name="review_id" value="{{ $review->id }}">
            upvote
        </button>
    </form>
    <form action="/votes/downvote" method="POST">
        @csrf
        <button type="submit" name="review_id" value="{{ $review->id }}">
            downvote
        </button>
    </form>
    @else
    <p>You Must Login to Vote: <a href="/users/login">Login</a> or <a href="/users/register">Register</a></p>
    @endauth

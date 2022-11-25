<li>
    review title: {{ $review->review_title }}
    <p>user name: {{ $review->user->name }}</p>
    <p>book title: {{ $review->book_title }}</p>
    <p>author: {{ $review->author }}</p>
    <p>publisher: {{ $review->publisher }}</p>
    <p>content: {{ $review->content }}</p>
    <p>date: {{ $review->created_at->format('Y-m-d') }}</p>
    <p>current vote: {{ $review->votes->sum('vote') }}</p>

    @if (auth()->id() != $review->user->id)
    <p>Vote for this review!
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
        <p>You must login to vote: <a href="/users/login">Login</a> or <a href="/users/register">Register</a></p>
        @endauth
    </p>
    @endif
</li>

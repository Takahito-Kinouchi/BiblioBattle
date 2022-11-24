<li>
    review title: {{ $review->review_title }}
    <p>user name: {{ $review->user->name }}</p>
    <p>book title: {{ $review->book_title }}</p>
    <p>author: {{ $review->author }}</p>
    <p>publisher: {{ $review->publisher }}</p>
    <p>content: {{ $review->content }}</p>
    <p>date: {{ $review->created_at->format('Y-m-d') }}</p>
    <p>current vote: {{ $review->votes->sum('vote') }}</p>
    <p>
        <form action="/votes" method="POST" name="vote_type", value="upvote">
            @csrf
            <button type="submit" name="review_id" value="{{ $review->id }}">
                upvote
            </button>
        </form>
    </p>
</li>

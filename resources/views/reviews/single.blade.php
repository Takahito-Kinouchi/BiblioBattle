<ul>
    <p>Review</p>
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
            @include('votes.vote', ['review' => $review])
            @include('comments.comments', ['comments' => $review->comments])
        @endif
    </li>
</ul>

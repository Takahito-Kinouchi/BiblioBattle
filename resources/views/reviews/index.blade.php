@include('components.header')

<p>All Reviews</p>
<ul>
    @if (count($reviews) == 0)
        <li>
            No Review Available
        </li>
    @endif
    @foreach($reviews as $review)
        <li>
            review title: <a href="/reviews/{{ $review->id }}">{{ $review->review_title }}</a>
            <p>user name: {{ $review->user->name}}</p>
            <p>book title: {{ $review->book_title }}</p>
            <p>author: {{ $review->author }}</p>
            <p>publisher: {{ $review->publisher }}</p>
            <p>content: {{ $review->content }}</p>
            <p>date: {{ $review->created_at->format('Y-m-d') }}</p>
            <p>current vote: {{ $review->votes->sum('vote') }}</p>
        </li>
    @endforeach
    </ul>

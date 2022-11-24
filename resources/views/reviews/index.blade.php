@include('components.header')

<p>Most Voted Reviews</p>
<ul>
    @if (count($reviews) == 0)
        <li>
            No Review Available
        </li>
    @endif
    @foreach($reviews as $review)
        <li>
            review title: {{ $review->review_title }}
            <p>user name: {{ $review->user->name}}</p>
            <p>book title: {{ $review->book_title }}</p>
            <p>author: {{ $review->author }}</p>
            <p>publisher: {{ $review->publisher }}</p>
            <p>content: {{ $review->content }}</p>
            <p>date: {{ $review->created_at->format('Y-m-d') }}</p>
            <p>current vote: {{ $review->votes->count() }}</p>
        </li>
    @endforeach
    </ul>

<ul>
    @if (count($reviews) == 0)
        <li>
            No Review Available
        </li>
    @endif
        @foreach($reviews as $review)
        {{ dd($users->where('id', '=', $review->user_id)->id); }}
            <li>
                review title: {{ $review->title }}
                <p>book title: {{ $review->book_title }}</p>
                <p>author: {{ $review->author }}</p>
                <p>publisher: {{ $review->publisher }}</p>
                <p>user name: {{ $users->where('id', '=', $review->user_id)->name }}</p>
                <p>content: {{ $review->content }}</p>
                <p>date: {{ $review->created_at->format('Y-m-d') }}</p>
                <p>current vote: {{ $review->vote }}</p>
            </li>
        @endforeach
    </ul>

<ul>
    <p>Comments</p>
        @foreach ($comments as $comment)
        <li>
            <p>user name: {{ $comment->user->name }}</p>
            comment: <p>{{ $comment->comment }}</p>
        </li>
        <p>Comment On This Review</p>
            @auth
                <form action="/comments" method="POST">
                    @csrf
                    <input type="text" name="comment" size="100" value="{{ old('comment')}}" />
                    <button type="submit" name="review_id" value="{{ $review->id }}">
                        comment
                    </button>
                </form>
            @else
                <p>You Must Login to Comment: <a href="/users/login">Login</a> or <a href="/users/register">Register</a></p>
            @endauth

        @endforeach
</ul>



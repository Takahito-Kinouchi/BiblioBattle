<form action="/reviews" method="POST">
    @csrf
    <div>
        <label>review title: </label>
        <input type="text" name="review_title" value="{{ old('review_title') }}" />
    </div>

    @error('review_title')
        {{ $message }}
    @enderror

    <div>
        <label>book title: </label>
        <input type="text" name="book_title" value="{{ old('book_title') }}" />
    </div>

    @error('book_title')
        {{ $message }}
    @enderror

    <div>
        <label>author: </label>
        <input type="text" name="author" value="{{ old('book_title') }}" />
    </div>

    @error('author')
        {{ $message }}
    @enderror

    <div>
        <label>publisher: </label>
        <input type="text" name="publisher" value="{{ old('publisher') }}" />
    </div>

    @error('publisher')
        {{ $message }}
    @enderror

    <div>
        <label>content: </label>
        <input type="text" name="content" size="100" value="{{ old('content') }}" />
    </div>

    @error('content')
        {{ $message }}
    @enderror

    <button type="submit">
        Entry
    </button>

</form>

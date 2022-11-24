<table class="w-full table-auto rounded-sm">
    <tbody>
        @if(count($reviews) == 0)
        <tr class="border-gray-300">
            <td class="px-4 py-8 border t border-b border-gray-300 text-lg">
                <p class="text-center">No reviews Found</p>

            </td>
            <td
                class="px-4 py-8 border-t border-b border-gray-300 text-lg"
            >
                <a
                    href="/reviews/entry"
                    class="text-blue-400 px-6 py-2 rounded-xl"
                >
                Entry Your Review
            </a>
            </td>
        </tr>
        @else
            @foreach ($reviews as $review)
            <tr class="border-gray-300">
                <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                >
                    <a href="/reviews/{{ $review->id }}">
                        {{ $review->review_title }}
                    </a>
                </td>
                <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                >
                        {{ $review->votes->count() }}
                </td>
                <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                >
                    <a
                        href="/reviews/{{ $review->id }}/edit"
                        class="text-blue-400 px-6 py-2 rounded-xl"
                        ><i
                            class="fa-solid fa-pen-to-square"
                        ></i>
                        Edit</a
                    >
                </td>
                <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                >
                    <form method="POST" action="/reviews/{{ $review->id }}">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500"><i class="fa-solid fa-trash"></i>Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @endif
    </tbody>
</table>

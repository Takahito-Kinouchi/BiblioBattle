<nav class="flex justify-between items-center mb-4">
    <ul class="flex space-x-6 mr-6 text-lg">
        @auth
        <li>
            <span class="font-bold uppercase">
                Welcome {{ auth()->user()->name }}
            </span>
        </li>
        <li>
            <a href="/reviews/manage" class="hover:text-laravel"
                ><i class="fa-solid fa-gear"></i>
                Manage Reviews</a>
        </li>
        <li>
            <a href="/reviews/entry" class="hover:text-laravel"
                ><i class="fa-solid fa-gear"></i>
                Post Your Review</a>
        </li>
        <li>
            <form action="/users/logout" method="POST" class="inline">
            @csrf
            <button type="submit">
                <i class="fa-solid fa-door-closed"></i>logout
            </button>
        </form>
        </li>
        @includeWhen(auth()->user()->email_veridied_at, 'users.resend_email_notification')
        @else
        <li>
            <a href="/users/register" class="hover:text-laravel"
                ><i class="fa-solid fa-user-plus"></i> Register</a
            >
        </li>
        <li>
            <a href="/users/login" class="hover:text-laravel"
                ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                Login</a
            >
        </li>
        @endauth
    </ul>
</nav>

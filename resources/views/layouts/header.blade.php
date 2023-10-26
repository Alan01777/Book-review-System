<header class="py-2 mb-4 bg-slate-100">
    <nav class="container mx-auto flex justify-between items-center">
        <ul class="flex items-center">
            <li class="mr-4">
                <a href="{{ route('books.index') }}"
                    class="text-slate-800 hover:text-slate-600 text-2xl font-semibold">Home</a>
            </li>
        </ul>
        <div class="hidden lg:flex lg:items-center">
            <ul class="lg:flex lg:space-x-6">
                @auth
                    <li class="lg:inline-block">
                        <a class="text-slate-800 hover:text-slate-600 text-xl font-semibold"
                            href="{{ route('users.show', ['user' => $user->id]) }}">Profile</a>
                    </li>
                    <li class="lg:inline-block">
                        <a class="text-slate-800 hover:text-slate-600 text-xl font-semibold"
                            href="{{ route('users.logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                @endauth
            </ul>
            <span class="text-white ml-6 overflow-hidden whitespace-nowrap max-w-20">
                @auth
                    <span
                        class="text-slate-800 hover:text-slate-600 text-xl font-semibold">{{ auth()->user()->name }}</span>
                @endauth
            </span>
        </div>
        @auth
            <form id="logout-form" action="{{ route('users.logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        @endauth
    </nav>
</header>

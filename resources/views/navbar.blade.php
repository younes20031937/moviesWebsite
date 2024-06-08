<nav class="border-b border-gray-800">
    <div class="container flex flex-col justify-between items-center px-4 py-6 mx-auto md:flex-row">
        <ul class="flex flex-col items-center md:flex-row">
            <li>
                <a href="{{ route('movies.index') }}">
                    <img src="{{ asset('images/logo.png') }}" class="w-10" alt="">
                </a>
            </li>
            <li class="mt-3 md:ml-16 md:mt-0">
                <a href="{{ route('movies.index') }}" class="hover:text-gray-300">Movies</a>
            </li>
            <li class="mt-3 md:ml-6 md:mt-0">
                <a href="#" class="hover:text-gray-300">TV Shows</a>
            </li>
            <li class="mt-3 md:ml-6 md:mt-0">
                <a href="{{ route('actors.index') }}" class="hover:text-gray-300">Actors</a>
            </li>
        </ul>
        <div class="flex flex-col items-center md:flex-row">
            @if (Auth::check())
                <livewire:search-dropdown />
                <div class="relative mt-3 md:ml-4 md:mt-0">
                    <a href="#">
                        <img src="{{ 'images/avatars/' . Auth::user()->avatar }}" alt="avatar"
                            class="w-10 h-10 rounded-full" id="avatar">
                    </a>
                    <div id="avatarDropdown"
                        class="hidden absolute right-0 z-20 mt-2 bg-white rounded-md shadow-lg w-55">
                        <p class="block px-4 py-2 bg-gray-900 text-white-800">Welcome {{ Auth::user()->name }} ! <br>
                            <span class="text-sm text-gray-400">{{ Auth::user()->email }}</span>
                        </p>
                        <a href="{{ route('profile.show') }}"
                            class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Profile</a>
                        @if (Auth::check() && Auth::user()->isAdmin)
                            <a href="{{ route('users.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">
                                Dashboard
                            </a>
                        @endif
                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                            class="px-4 py-2 w-full text-left text-gray-800 hover:bg-gray-200" type="button">
                            Logout
                        </button>
                    </div>
                </div>
            @else
                <div class="flex flex-col items-center md:flex-row">
                    <livewire:search-dropdown />
                    <div class="mt-3 md:ml-6 md:mt-0">
                        <a href="{{ route('auth.login') }}" class="hover:text-gray-300">Login</a>
                    </div>
                    <div class="mt-3 md:ml-6 md:mt-0">
                        <a href="{{ route('auth.register') }}" class="hover:text-gray-300">Register</a>
                    </div>
                </div>
            @endif
        </div>
    </div>



    <!--logout model-->

    <div id="popup-modal" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="inline-flex absolute top-3 justify-center items-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg end-2.5 hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 text-center md:p-5">
                    <svg class="mx-auto mb-4 w-12 h-12 text-gray-400 dark:text-gray-200" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to
                            logout?</h3>
                        <button data-modal-hide="popup-modal" type="submit"
                            class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800">
                            Yes, I'm sure
                        </button>
                        <button data-modal-hide="popup-modal" type="button"
                            class="px-5 py-2.5 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 ms-3 focus:outline-none hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                            cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--End logout modal-->
</nav>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const avatar = document.getElementById('avatar');
        const dropdown = document.getElementById('avatarDropdown');

        avatar.addEventListener('mouseenter', function() {
            dropdown.classList.remove('hidden');
        });

        avatar.addEventListener('mouseleave', function() {
            setTimeout(function() {
                if (!dropdown.matches(':hover')) {
                    dropdown.classList.add('hidden');
                }
            }, 200);
        });

        dropdown.addEventListener('mouseenter', function() {
            dropdown.classList.remove('hidden');
        });

        dropdown.addEventListener('mouseleave', function() {
            dropdown.classList.add('hidden');
        });
    });
</script>

<!-- register.blade.php -->

@extends('layouts.main')

@section('content')
    <div class="flex justify-center items-center px-4 py-12 min-h-screen bg-gray-50 sm:px-6 lg:px-8">
        <div class="space-y-8 w-full max-w-md">
            <div>
                <img class="mx-auto w-auto h-12" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                    alt="Workflow">
                <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900">
                    Create a new account
                </h2>
            </div>
            <form class="mt-8 space-y-6" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="-space-y-px rounded-md shadow-sm">
                    <div>
                        <label for="name" class="sr-only">Name</label>
                        <input id="name" name="name" type="text" autocomplete="name" required
                            class="block relative px-3 py-2 w-full placeholder-gray-500 text-gray-900 rounded-none rounded-t-md border border-gray-300 appearance-none focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Name">
                    </div>
                    <div>
                        <label for="email-address" class="sr-only">Email address</label>
                        <input id="email-address" name="email" type="email" autocomplete="email" required
                            class="block relative px-3 py-2 w-full placeholder-gray-500 text-gray-900 rounded-none rounded-b-md border border-gray-300 appearance-none focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Email address">
                    </div>
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" type="password" autocomplete="new-password" required
                            class="block relative px-3 py-2 w-full placeholder-gray-500 text-gray-900 rounded-none rounded-b-md border border-gray-300 appearance-none focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Password">
                    </div>
                    <div>
                        <label for="password-confirm" class="sr-only">Confirm Password</label>
                        <input id="password-confirm" name="password_confirmation" type="password"
                            autocomplete="new-password" required
                            class="block relative px-3 py-2 w-full placeholder-gray-500 text-gray-900 rounded-none rounded-b-md border border-gray-300 appearance-none focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Confirm Password">
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="flex relative justify-center px-4 py-2 w-full text-sm font-medium text-white bg-indigo-600 rounded-md border border-transparent group hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="flex absolute inset-y-0 left-0 items-center pl-3">
                            <!-- Heroicon name: solid/lock-closed -->
                            <svg class="w-5 h-5 text-indigo-500 group-hover:text-indigo-400"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 12a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                    d="M4 8a6 6 0 1112 0v4a2 2 0 01-2 2H6a2 2 0 01-2-2V8zm10-2V5a4 4 0 10-8 0v1H4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V8a2 2 0 00-2-2h-2z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        Sign up
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

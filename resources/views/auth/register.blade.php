@extends('layouts.main')

@section('content')
    <div
        class="flex justify-center items-center px-4 py-24 min-h-screen bg-gray-800 dark:bg-gray-900 dark:text-gray-100 sm:px-6 lg:px-8">
        <div class="space-y-8 w-full max-w-lg">
            <div class="text-center">
                <img class="mx-auto w-auto h-16" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                    alt="Workflow">
                <h2 class="mt-6 text-4xl font-extrabold text-gray-100">
                    Create a new account
                </h2>
            </div>
            <form class="mt-8 space-y-6" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="-space-y-px rounded-md shadow-sm">
                    <div>
                        <label for="name" class="sr-only">Name</label>
                        <input id="name" name="name" type="text" autocomplete="name" required
                            class="block relative px-4 py-3 w-full text-lg placeholder-gray-400 text-black rounded-none rounded-t-md border border-gray-300 dark:text-gray-100 dark:border-gray-700 dark:bg-gray-800 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Name">
                    </div>
                    <div class="pb-3 mt-3 mb-3">
                        <label class="block mt-2 mb-2 text-sm font-medium text-white-900 dark:text-white"
                            for="file_input">Upload your image</label>
                        <input id="avatar" name="avatar" autocomplete="avatar"
                            class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            type="file">

                    </div>
                    <div>
                        <label for="email-address" class="sr-only">Email address</label>
                        <input id="email-address" name="email" type="email" autocomplete="email" required
                            class="block relative px-4 py-3 w-full text-lg placeholder-gray-400 text-black rounded-none rounded-b-md border border-gray-300 dark:border-gray-700 dark:bg-gray-800 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Email address">
                    </div>
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" type="password" autocomplete="new-password" required
                            class="block relative px-4 py-3 w-full text-lg placeholder-gray-400 text-black rounded-none rounded-b-md border border-gray-300 dark:border-gray-700 dark:bg-gray-800 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Password">
                    </div>
                    <div>
                        <label for="password-confirm" class="sr-only">Confirm Password</label>
                        <input id="password-confirm" name="password_confirmation" type="password"
                            autocomplete="new-password" required
                            class="block relative px-4 py-3 w-full text-lg placeholder-gray-400 text-black rounded-none rounded-b-md border border-gray-300 dark:border-gray-700 dark:bg-gray-800 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Confirm Password">
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="flex relative justify-center px-6 py-3 w-full text-lg font-medium text-white bg-indigo-600 rounded-md border border-transparent dark:bg-indigo-500 group hover:bg-indigo-700 dark:hover:bg-indigo-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="flex absolute inset-y-0 left-0 items-center pl-3">
                            <svg class="w-6 h-6 text-indigo-400 group-hover:text-indigo-300"
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
            <div>
                <a href="{{ route('login') }}" type="submit"
                    class="flex relative justify-center px-6 py-3 w-full text-lg font-medium text-white bg-indigo-600 rounded-md border border-transparent dark:bg-indigo-500 group hover:bg-indigo-700 dark:hover:bg-indigo-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <span class="flex absolute inset-y-0 left-0 items-center pl-3">
                        <svg class="w-6 h-6 text-indigo-400 group-hover:text-indigo-300" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 12a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="M4 8a6 6 0 1112 0v4a2 2 0 01-2 2H6a2 2 0 01-2-2V8zm10-2V5a4 4 0 10-8 0v1H4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V8a2 2 0 00-2-2h-2z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                    Already member ? Login
                </a>
            </div>
        </div>
    </div>
@endsection

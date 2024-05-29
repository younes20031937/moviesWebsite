@extends('layouts.main')

@section('content')
    <div class="flex justify-center items-center px-4 py-24 min-h-screen bg-gray-800 sm:px-6 lg:px-8">
        <div class="space-y-8 w-full max-w-lg">
            <div class="text-center">
                <img class="mx-auto w-auto h-16" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
                <h2 class="mt-6 text-4xl font-extrabold text-gray-100">
                    Sign in to your account
                </h2>
            </div>
            <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="-space-y-px rounded-md shadow-sm">
                    <div>
                        <label for="email-address" class="sr-only">Email address</label>
                        <input id="email-address" name="email" type="email" autocomplete="email" required
                            class="block px-4 py-3 w-full text-lg placeholder-gray-500 text-black rounded-t-md border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Email address">
                    </div>
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="block px-4 py-3 w-full text-lg placeholder-gray-500 text-black rounded-b-md border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Password">
                    </div>
                </div>

                <div class="flex justify-between items-center mt-4">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember" type="checkbox" class="w-4 h-4 text-black rounded border-gray-300 focus:ring-indigo-500">
                        <label for="remember_me" class="block ml-2 text-sm text-gray-100">
                            Remember me
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="#" class="font-medium text-indigo-500 hover:text-indigo-400">
                            Forgot your password?
                        </a>
                    </div>
                </div>

                <div>
                    <button type="submit" class="flex relative justify-center px-4 py-3 w-full text-lg font-medium text-white bg-indigo-600 rounded-md border border-transparent hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="flex absolute inset-y-0 left-0 items-center pl-3">
                            <svg class="w-6 h-6 text-indigo-400 group-hover:text-indigo-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 12a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                <path fill-rule="evenodd" d="M4 8a6 6 0 1112 0v4a2 2 0 01-2 2H6a2 2 0 01-2-2V8zm10-2V5a4 4 0 10-8 0v1H4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V8a2 2 0 00-2-2h-2z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        Sign in
                    </button>
                </div>
            </form>
            <div>
                <a href="{{ route('register') }}" type="submit" class="flex relative justify-center px-4 py-3 w-full text-lg font-medium text-white bg-indigo-600 rounded-md border border-transparent hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <span class="flex absolute inset-y-0 left-0 items-center pl-3">
                        <svg class="w-6 h-6 text-indigo-400 group-hover:text-indigo-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 12a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            <path fill-rule="evenodd" d="M4 8a6 6 0 1112 0v4a2 2 0 01-2 2H6a2 2 0 01-2-2V8zm10-2V5a4 4 0 10-8 0v1H4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V8a2 2 0 00-2-2h-2z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    Register if you don't have 
                </a>
            </div>
        </div>
    </div>
@endsection

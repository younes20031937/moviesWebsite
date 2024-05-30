@extends('layouts.main')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Profile</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    </head>

    <body class="">

        <div class="container p-5 mx-auto my-10 rounded-lg shadow-lg">
            <h2 class="mb-5 text-2xl font-bold">User Profile</h2>

            <div class="flex">
                <div class="w-1/3">
                    <img src="{{ 'images/avatars/' . Auth::user()->avatar }}" alt="avatar"
                        class="mx-auto w-32 h-32 rounded-full">
                </div>
                <div class="w-2/3">
                    <div class="mb-5">
                        <h3 class="text-xl font-bold">Personal Information</h3>
                        <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    </div>

                    <div>
                        <h3 class="text-xl font-bold">Edit Profile</h3>
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="-space-y-px rounded-md shadow-sm">
                                <div class="mt-3 mb-3">
                                    <label for="name" class="sr-only">Name</label>
                                    <input id="name" name="name" type="text" autocomplete="name" required
                                        value="{{ Auth::user()->name }}"
                                        class="block px-4 py-3 w-full text-lg placeholder-gray-500 text-black rounded-b-md border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                        placeholder="name">
                                </div>
                                <div class="mt-2 mb-2">
                                    <label for="email-address" class="sr-only">Email address</label>
                                    <input id="email-address" name="email" type="email" autocomplete="email" required
                                        value="{{ Auth::user()->email }}"
                                        class="block px-4 py-3 w-full text-lg placeholder-gray-500 text-black rounded-t-md border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                        placeholder="Email address">
                                </div>
                                <div class="mt-3 mb-3">
                                    <label class="block mt-2 mb-2 text-sm font-medium text-white-900 dark:text-white"
                                        for="file_input">Upload your image</label>
                                    <input id="avatar" name="avatar" autocomplete="avatar"
                                        value="{{ Auth::user()->avatar }}"
                                        class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        type="file">

                                </div>
                            </div>
                            <div class="flex justify-between mt-4">
                                <button type="submit"
                                    class="px-5 py-2.5 mb-2 text-sm font-medium text-center text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 rounded-lg hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 me-2">
                                    Update Profile
                                </button>
                                <!-- Modal toggle -->
                                <button data-modal-target="change-password-modal" data-modal-toggle="change-password-modal"
                                    class="px-5 py-2.5 mb-2 text-sm font-medium text-center text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 rounded-lg hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 me-2"
                                    type="button">
                                    Change Password
                                </button>
                                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                    class="px-5 py-2.5 mb-2 text-sm font-medium text-center text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 rounded-lg hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 me-2"
                                    type="button">
                                    Delete Account
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Change password modal -->
        <div id="change-password-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex justify-between items-center p-4 rounded-t border-b md:p-5 dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Change Password
                        </h3>
                        <button type="button"
                            class="inline-flex justify-center items-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg end-2.5 hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="change-password-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <form class="space-y-4" action="{{ route('profile.updatePassword') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div>
                                <label for="new-password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New
                                    Password</label>
                                <input type="password" name="password" id="new-password" placeholder="New Password"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required />
                            </div>
                            <div>
                                <label for="confirm-password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                                    Password</label>
                                <input type="password" name="confirm-password" id="confirm-password"
                                    placeholder="Confirm Password"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required />
                            </div>
                            <button type="submit"
                                class="px-5 py-2.5 w-full text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Change
                                Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!--End change password modal-->


        <!--Delete account model-->

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
                        <form action="{{ route('profile.destroy') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to
                                delete this account?</h3>
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
        <!--End delete account modal-->

    </body>

    </html>
@endsection

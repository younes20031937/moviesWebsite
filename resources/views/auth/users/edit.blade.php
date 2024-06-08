@extends('layouts.main')

@section('content')
    <div class="container px-4 mx-auto min-h-screen bg-custom-blue">
        <h1 class="mb-4 text-2xl font-bold">Edit User</h1>
        <img src="{{ asset('images/avatars/' . $user->avatar) }}" alt="{{ $user->name }}"
            class="mt-2 w-16 h-16 rounded-full">
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data"
            class="p-6 rounded shadow-md bg-dark">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-white-700">Name</label>
                <input type="text" name="name" id="name" class="p-2 w-full text-black rounded border-2"
                    value="{{ $user->name }}" required>
            </div>
            <div class="mb-4">
                <label for="avatar" class="block text-white-700">Avatar</label>
                <input type="file" name="avatar" id="avatar"
                    class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                @error('avatar')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                        {{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block text-white-700">Email</label>
                <input type="email" name="email" id="email" class="p-2 w-full text-black rounded border-2"
                    value="{{ $user->email }}" required>
                    @error('email')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                        {{ $message }}</p>
                @enderror
            </div>


            <div class="flex items-center mb-4">
                <input @if ($user->isAdmin) checked @endif id="disabled-radio-1" type="radio" name="isAdmin"
                    value="1"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="disabled-radio-1" class="text-sm font-medium text-gray-400 ms-2 dark:text-gray-500">Admin
                </label>
            </div>
            <div class="flex items-center">
                <input @if (!$user->isAdmin) checked @endif id="disabled-radio-2" type="radio" name="isAdmin"
                    value="0"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="disabled-radio-2" class="text-sm font-medium text-gray-400 ms-2 dark:text-gray-500">Normal User
                </label>
            </div>
            <div class="mb-4">
                <button type="submit"
                    class="px-5 py-2.5 mb-2 text-sm font-medium text-center text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 rounded-lg hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 me-2">Update</button>
            </div>
        </form>
    </div>
@endsection

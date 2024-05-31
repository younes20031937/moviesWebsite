@extends('layouts.main')

@section('content')
<div class="container px-4 mx-auto min-h-screen bg-custom-blue">
    <h1 class="mb-4 text-2xl font-bold">Create User</h1>
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" class="p-6 rounded shadow-md bg-dark">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name</label>
            <input type="text" name="name" id="name" class="p-2 w-full rounded border-2" required>
        </div>
        <div class="mb-4">
            <label for="avatar" class="block text-gray-700">Avatar</label>
            <input type="file" name="avatar" id="avatar" class="p-2 w-full rounded border-2">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="p-2 w-full rounded border-2" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700">Password</label>
            <input type="password" name="password" id="password" class="p-2 w-full rounded border-2" required>
        </div>
        <div class="mb-4">
            <label for="confirm-password" class="block text-gray-700">Confirm Password</label>
            <input type="password" name="confirm-password" id="confirm-password" class="p-2 w-full rounded border-2" required>
        </div>
        <div class="mb-4">
            <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded">Create</button>
        </div>
    </form>
</div>
@endsection

@extends('layouts.main')

@section('content')
<div class="container px-4 mx-auto min-h-screen bg-custom-blue">
    <h1 class="mb-4 text-2xl font-bold">Edit User</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="p-6 rounded shadow-md bg-dark">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-white-700">Name</label>
            <input type="text" name="name" id="name" class="p-2 w-full text-black rounded border-2" value="{{ $user->name }}" required>
        </div>
        <div class="mb-4">
            <label for="avatar" class="block text-white-700">Avatar</label>
            <input type="file" name="avatar" id="avatar" class="p-2 w-full rounded border-2">
            <img src="{{ asset('images/avatars/' . $user->avatar) }}" alt="{{ $user->name }}" class="mt-2 w-16 h-16 rounded-full">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-white-700">Email</label>
            <input type="email" name="email" id="email" class="p-2 w-full text-black rounded border-2" value="{{ $user->email }}" required>
        </div>
        <div class="mb-4">
            <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded">Update</button>
        </div>
    </form>
</div>
@endsection

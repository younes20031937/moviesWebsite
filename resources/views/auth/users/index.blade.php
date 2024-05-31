@extends('layouts.main')

@section('content')
    <h1 class="mb-4 text-2xl font-bold">Users</h1>
    <a href="{{ route('users.create') }}" class="inline-block px-4 py-2 mb-4 text-white bg-blue-500 rounded shadow">Create
        User</a>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-dark">
            <thead>
                <tr>
                    <th
                        class="px-6 py-3 text-sm font-medium tracking-wider leading-4 text-left text-gray-500 uppercase border-b-2 border-gray-300">
                        ID</th>
                    <th
                        class="px-6 py-3 text-sm font-medium tracking-wider leading-4 text-left text-gray-500 uppercase border-b-2 border-gray-300">
                        Name</th>
                    <th
                        class="px-6 py-3 text-sm font-medium tracking-wider leading-4 text-left text-gray-500 uppercase border-b-2 border-gray-300">
                        Email</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="px-6 py-4 border-b border-gray-200 whitespace-no-wrap">{{ $user->id }}</td>
                        <td class="px-6 py-4 border-b border-gray-200 whitespace-no-wrap">{{ $user->name }}</td>
                        <td class="px-6 py-4 border-b border-gray-200 whitespace-no-wrap">{{ $user->email }}</td>
                        <td class="px-6 py-4 border-b border-gray-200 whitespace-no-wrap">
                            <a href="{{ route('users.edit', $user->id) }}"
                                class="mr-2 text-indigo-600 hover:text-indigo-900">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

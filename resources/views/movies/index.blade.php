@extends('layouts.main')

@section('content')
    <div class="flex">
        <!-- Sidebar -->
        <aside id="cta-button-sidebar" class="p-4 mr-4 w-64 h-screen bg-gray-900 dark:bg-gray-800" aria-label="Sidebar">
            <div class="overflow-y-auto">
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="#" class="flex items-center p-2 text-white rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                            <svg class="w-5 h-5 text-white group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 22 21">
                                <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                                <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                            </svg>
                            <span class="ml-3">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-white rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                            <svg class="w-5 h-5 text-white group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 18 18">
                                <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                            </svg>
                            <span class="ml-3">Users</span>
                        </a>
                    </li>
                    <!-- Add more sidebar items here -->
                </ul>
            </div>
        </aside>


        <!-- Main content -->
        <div class="flex-1 p-4">
            <h1 class="mb-4 text-2xl font-bold">Users</h1>
            <a href="{{ route('users.create') }}"
               class="px-5 py-2.5 mb-2 text-sm font-medium text-center text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 rounded-lg hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 me-2">
                Create User
            </a>
            <a href="{{ route('users.export.pdf') }}"
               class="px-5 py-2.5 mb-2 text-sm font-medium text-center text-white bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 rounded-lg hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 me-2">
                Export PDF
            </a>
            <div class="overflow-x-auto">
                <table class="mt-4 min-w-full bg-dark">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-sm font-medium tracking-wider leading-4 text-left text-gray-500 uppercase border-b-2 border-gray-300">ID</th>
                            <th class="px-6 py-3 text-sm font-medium tracking-wider leading-4 text-left text-gray-500 uppercase border-b-2 border-gray-300">Image</th>
                            <th class="px-6 py-3 text-sm font-medium tracking-wider leading-4 text-left text-gray-500 uppercase border-b-2 border-gray-300">Name</th>
                            <th class="px-6 py-3 text-sm font-medium tracking-wider leading-4 text-left text-gray-500 uppercase border-b-2 border-gray-300">Email</th>
                            <th class="px-6 py-3 text-sm font-medium tracking-wider leading-4 text-left text-gray-500 uppercase border-b-2 border-gray-300">isAdmin ?</th>
                            <th class="px-6 py-3 text-sm font-medium tracking-wider leading-4 text-left text-gray-500 uppercase border-b-2 border-gray-300">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="px-6 py-4 border-b border-gray-200 whitespace-no-wrap">{{ $user->id }}</td>
                                <td class="px-6 py-4 border-b border-gray-200 whitespace-no-wrap">
                                    <a href="{{ route('users.edit', $user->id) }}">
                                        <img src="{{ asset('images/avatars/' . $user->avatar) }}" alt="Avatar" class="w-10 h-10 rounded-full">
                                    </a>
                                </td>
                                <td class="px-6 py-4 border-b border-gray-200 whitespace-no-wrap">
                                    <a href="{{ route('users.edit', $user->id) }}">
                                        {{ $user->name }}
                                    </a>
                                </td>
                                <td class="px-6 py-4 border-b border-gray-200 whitespace-no-wrap">{{ $user->email }}</td>
                                <td class="px-6 py-4 border-b border-gray-200 whitespace-no-wrap">
                                    @if ($user->isAdmin)
                                        <p class="text-green-500">YES</p>
                                    @else
                                        <p class="text-yellow-500">NO</p>
                                    @endif
                                </td>
                                <td class="px-6 py-4 border-b border-gray-200 whitespace-no-wrap">
                                    <a href="{{ route('users.edit', $user->id) }}"
                                       class="px-5 py-2.5 mb-2 text-sm font-medium text-center text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 rounded-lg hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 me-2">Edit</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-5 py-2.5 mb-2 text-sm font-medium text-center text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 rounded-lg hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 me-2">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-5 mr-5 ml-4">
                <div class="flex justify-center">
                </div>
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection

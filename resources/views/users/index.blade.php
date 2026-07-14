<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">

<div class="max-w-6xl mx-auto py-10 px-6">

    <div class="bg-white rounded-2xl shadow-xl p-8">

        <div class="flex justify-between items-center mb-6">

            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    User Management
                </h1>

                <p class="text-gray-500 mt-2">
                    Manage all registered users.
                </p>
            </div>

            <a href="{{ route('users.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg transition">
                + Create User
            </a>

        </div>

        @if(session('success'))
            <div class="mb-5 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">

            <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">

                <thead class="bg-blue-600 text-white">

                    <tr>
                        <th class="px-6 py-3 text-left">Name</th>
                        <th class="px-6 py-3 text-left">Email</th>
                        <th class="px-6 py-3 text-left">Role</th>
                        <th class="px-6 py-3 text-center">Actions</th>
                    </tr>

                </thead>

                <tbody>

                @forelse($users as $user)

                    <tr class="border-b hover:bg-gray-50">

                        <td class="px-6 py-4 font-medium">
                            {{ $user->name }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $user->email }}
                        </td>

                        <td class="px-6 py-4">
                            @if($user->role == 'admin')
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
                                    Admin
                                </span>

                            @elseif($user->role == 'staff')
                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                                    Staff
                                </span>

                            @else
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                                    Customer
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-4 text-center">

                            <a href="{{ route('users.edit', $user) }}"
                               class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg mr-2">
                                Edit
                            </a>

                            <form action="{{ route('users.destroy', $user) }}"
                                  method="POST"
                                  class="inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    onclick="return confirm('Delete this user?')"
                                    class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="4" class="text-center py-8 text-gray-500">
                            No users found.
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="w-full max-w-lg bg-white rounded-2xl shadow-xl p-8">

    <div class="text-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            Edit User
        </h1>

        <p class="text-gray-500 mt-2">
            Update the user's information.
        </p>
    </div>

    @if ($errors->any())
        <div class="mb-4 rounded-lg border border-red-300 bg-red-100 p-4 text-red-700">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('users.update', $user) }}" class="space-y-5">

        @csrf
        @method('PUT')

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-700">
                Full Name
            </label>

            <input
                type="text"
                name="name"
                value="{{ old('name', $user->name) }}"
                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-700">
                Email Address
            </label>

            <input
                type="email"
                name="email"
                value="{{ old('email', $user->email) }}"
                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-700">
                New Password
            </label>

            <input
                type="password"
                name="password"
                placeholder="Leave blank to keep current password"
                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-700">
                Confirm Password
            </label>

            <input
                type="password"
                name="password_confirmation"
                placeholder="Confirm new password"
                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-700">
                Role
            </label>

            <select
                name="role"
                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

                <option value="customer" @selected($user->role === 'customer')>
                    Customer
                </option>

                <option value="staff" @selected($user->role === 'staff')>
                    Staff
                </option>

                <option value="admin" @selected($user->role === 'admin')>
                    Admin
                </option>

            </select>
        </div>

        <div class="flex justify-between pt-4">

            <a href="{{ route('users.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg transition">
                Cancel
            </a>

            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition">
                Update User
            </button>

        </div>

    </form>

</div>

</body>
</html>
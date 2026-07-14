<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">
    <nav class="bg-amber-600 shadow-lg">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
            <h1 class="text-2xl font-bold text-white">Staff Dashboard</h1>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="rounded-lg bg-red-500 px-4 py-2 text-white transition hover:bg-red-600">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <div class="mx-auto max-w-6xl p-8">
        <div class="mb-8 rounded-2xl bg-white p-8 shadow-lg">
            <h2 class="text-3xl font-bold text-gray-800">Welcome, {{ auth()->user()->name }} 👋</h2>
            <p class="mt-3 text-gray-600">
                You are logged in as
                <span class="font-semibold text-amber-600">{{ ucfirst(auth()->user()->role) }}</span>.
            </p>
            <p class="mt-2 text-gray-500">Review product inventory and support customers from here.</p>
        </div>

        <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
            <div class="rounded-2xl bg-white p-8 shadow-lg transition hover:shadow-xl">
                <h3 class="text-2xl font-bold text-gray-800">Manage Products</h3>
                <p class="mt-2 mb-6 text-gray-500">Browse and update the available inventory.</p>
                <a href="{{ route('products.index') }}" class="inline-block rounded-lg bg-amber-600 px-6 py-3 text-white transition hover:bg-amber-700">
                    View Products
                </a>
            </div>
        </div>
    </div>
</body>
</html>

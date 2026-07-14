<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-blue-600 shadow-lg">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            <h1 class="text-2xl font-bold text-white">
                Admin Dashboard
            </h1>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button
                    type="submit"
                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition">
                    Logout
                </button>

            </form>

        </div>
    </nav>

    <div class="max-w-6xl mx-auto p-8">

        <!-- Welcome Card -->
        <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">

            <h2 class="text-3xl font-bold text-gray-800">
                Welcome, {{ auth()->user()->name }} 👋
            </h2>

            <p class="text-gray-600 mt-3">
                You are logged in as
                <span class="font-semibold text-blue-600">
                    {{ ucfirst(auth()->user()->role) }}
                </span>.
            </p>

            <p class="text-gray-500 mt-2">
                Manage users and products using the shortcuts below.
            </p>

        </div>

        <!-- Dashboard Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <!-- Users -->
            <div class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition">

             
                <h3 class="text-2xl font-bold text-gray-800">
                    User Management
                </h3>

                <p class="text-gray-500 mt-2 mb-6">
                    Create, edit, and manage all registered users.
                </p>

                <a href="{{ route('users.index') }}"
                   class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition">
                    Manage Users
                </a>

            </div>

            <!-- Products -->
            <div class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition">

              

                <h3 class="text-2xl font-bold text-gray-800">
                    Product Management
                </h3>

                <p class="text-gray-500 mt-2 mb-6">
                    Add, update, and remove products from inventory.
                </p>

                <a href="{{ route('products.index') }}"
                   class="inline-block bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg transition">
                    Manage Products
                </a>

            </div>

        </div>

    </div>

</body>
</html>
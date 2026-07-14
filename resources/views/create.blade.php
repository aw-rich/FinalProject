<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="w-full max-w-lg bg-white rounded-2xl shadow-xl p-8">

    <div class="text-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            Create Product
        </h1>

        <p class="text-gray-500 mt-2">
            Add a new product to your inventory.
        </p>
    </div>

    @if ($errors->any())
        <div class="mb-4 rounded-lg border border-red-300 bg-red-100 p-3 text-red-700">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" class="space-y-5">

        @csrf

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-700">
                Product Name
            </label>

            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                placeholder="Enter product name"
                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-700">
                Price
            </label>

            <input
                type="number"
                step="0.01"
                name="price"
                value="{{ old('price') }}"
                placeholder="Enter price"
                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-700">
                Quantity
            </label>

            <input
                type="number"
                name="quantity"
                value="{{ old('quantity') }}"
                placeholder="Enter quantity"
                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
        </div>

        <div class="flex justify-between pt-4">

            <a href="{{ route('products.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg transition">
                Cancel
            </a>

            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition">
                Save Product
            </button>

        </div>

    </form>

</div>

</body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Products</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">

<div class="max-w-6xl mx-auto py-10 px-6">

    <div class="bg-white shadow-xl rounded-2xl p-8">

        <div class="flex justify-between items-center mb-6">

            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    Product Management
                </h1>

                <p class="text-gray-500">
                    Manage your products here.
                </p>
            </div>

            @if(auth()->check() && in_array(auth()->user()->role, ['admin','staff'], true))
                <a href="{{ route('products.create') }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg transition">
                    + Add Product
                </a>
            @endif

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
                        <th class="px-6 py-3 text-left">ID</th>
                        <th class="px-6 py-3 text-left">Name</th>
                        <th class="px-6 py-3 text-left">Price</th>
                        <th class="px-6 py-3 text-left">Quantity</th>

                        @if(auth()->check() && in_array(auth()->user()->role,['admin','staff'],true))
                            <th class="px-6 py-3 text-center">
                                Actions
                            </th>
                        @endif

                    </tr>

                </thead>

                <tbody>

                @forelse($products as $product)

                    <tr class="border-b hover:bg-gray-50">

                        <td class="px-6 py-4">
                            {{ $product->id }}
                        </td>

                        <td class="px-6 py-4 font-medium">
                            {{ $product->name }}
                        </td>

                        <td class="px-6 py-4">
                            ₱{{ number_format($product->price,2) }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $product->quantity }}
                        </td>

                        @if(auth()->check() && in_array(auth()->user()->role,['admin','staff'],true))

                        <td class="px-6 py-4 text-center">

                            <a href="{{ route('products.edit',$product) }}"
                               class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg mr-2">
                                Edit
                            </a>

                            <form action="{{ route('products.destroy',$product) }}"
                                  method="POST"
                                  class="inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Delete this product?')"
                                    class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">
                                    Delete
                                </button>

                            </form>

                        </td>

                        @endif

                    </tr>

                @empty

                    <tr>
                        <td colspan="5" class="text-center py-8 text-gray-500">
                            No products found.
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
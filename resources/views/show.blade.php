<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

      <h2>Product Details</h2>

<p>Name : {{ $product->name }}</p>

<p>Price : {{ $product->price }}</p>

<p>Quantity : {{ $product->quantity }}</p>

<a href="{{ route('products.index') }}">
Back
</a>
    </body>
</html>

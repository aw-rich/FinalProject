<?php

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('admin can access the admin dashboard and customers can view products', function () {
    $admin = User::create([
        'name' => 'Admin User',
        'email' => 'admin@example.com',
        'password' => bcrypt('password123'),
        'role' => 'admin',
    ]);

    $customer = User::create([
        'name' => 'Customer User',
        'email' => 'customer@example.com',
        'password' => bcrypt('password123'),
        'role' => 'customer',
    ]);

    Product::create([
        'name' => 'Laptop',
        'price' => 999.99,
        'quantity' => 10,
    ]);

    $this->actingAs($admin)->get('/admin/dashboard')->assertOk();
    $this->actingAs($customer)->get('/customer/dashboard')->assertOk();
    $this->actingAs($customer)->get('/products')->assertOk();
});

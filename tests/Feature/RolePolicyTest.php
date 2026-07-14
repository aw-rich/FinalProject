<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('users can be authorized through a role policy', function () {
    $admin = User::create([
        'name' => 'Admin User',
        'email' => 'admin-policy@example.com',
        'password' => bcrypt('password123'),
        'role' => 'admin',
    ]);

    $customer = User::create([
        'name' => 'Customer User',
        'email' => 'customer-policy@example.com',
        'password' => bcrypt('password123'),
        'role' => 'customer',
    ]);

    expect($admin->can('hasRole', 'admin'))->toBeTrue();
    expect($customer->can('hasRole', 'customer'))->toBeTrue();
    expect($customer->can('hasRole', 'admin'))->toBeFalse();
});

<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Akun Login
        User::create([
            'name' => 'Admin Inventaris',
            'email' => 'admin@test.com',
            'password' => bcrypt('12345678'),
        ]);

        // 3 Kategori
        Category::create(['name' => 'Aksesori']);
        Category::create(['name' => 'Perangkat Komputer']);
        Category::create(['name' => 'Penyimpanan']);

        // 5 Barang
        Item::create(['category_id' => 1, 'name' => 'Keyboard', 'price' => 150000, 'stock' => 10]);
        Item::create(['category_id' => 1, 'name' => 'Mouse', 'price' => 75000, 'stock' => 20]);
        Item::create(['category_id' => 2, 'name' => 'Monitor', 'price' => 1500000, 'stock' => 5]);
        Item::create(['category_id' => 1, 'name' => 'Headset', 'price' => 250000, 'stock' => 8]);
        Item::create(['category_id' => 3, 'name' => 'Flashdisk', 'price' => 85000, 'stock' => 15]);
    }
}
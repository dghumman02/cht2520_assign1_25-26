<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StoreItem;

class StoreItemSeeder extends Seeder
{
    public function run(): void
    {
        StoreItem::create([
            'name' => 'Handmade Notebook',
            'description' => 'Eco-friendly handmade paper notebook.',
            'price' => 12.50,
            'stock_quantity' => 15,
            'category' => 'Stationery',
            'is_active' => true
        ]);

        StoreItem::create([
            'name' => 'Ceramic Coffee Mug',
            'description' => 'Locally crafted ceramic mug.',
            'price' => 9.99,
            'stock_quantity' => 20,
            'category' => 'Kitchenware',
            'is_active' => true
        ]);
    }
}

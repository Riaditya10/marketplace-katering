<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $merchant = User::firstOrCreate(
            ['email' => 'merchant@katering.test'],
            [
                'name' => 'Nusa Catering',
                'password' => bcrypt('password'),
                'role' => 'merchant',
                'company_name' => 'Nusa Catering',
                'phone' => '081234567890',
                'address' => 'Jl. Sudirman No. 10, Bandung',
                'description' => 'Catering sehat untuk kantor dan keluarga.',
            ]
        );

        $customer = User::firstOrCreate(
            ['email' => 'customer@katering.test'],
            [
                'name' => 'PT Maju Jaya',
                'password' => bcrypt('password'),
                'role' => 'customer',
                'company_name' => 'PT Maju Jaya',
                'phone' => '081298765432',
                'address' => 'Jl. Cihampelas No. 24, Bandung',
                'description' => 'Perusahaan teknologi dan layanan.',
            ]
        );

        Menu::firstOrCreate(
            ['name' => 'Nasi Box Ayam Bakar', 'merchant_id' => $merchant->id],
            [
                'description' => 'Nasi box dengan ayam bakar, lalapan, dan sambal.',
                'price' => 35000,
                'category' => 'ayam',
                'image_url' => 'https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=800&q=80',
            ]
        );

        Menu::firstOrCreate(
            ['name' => 'Paket Vegetarian Sehat', 'merchant_id' => $merchant->id],
            [
                'description' => 'Menu sehat berbasis sayur dan protein nabati.',
                'price' => 30000,
                'category' => 'vegetarian',
                'image_url' => 'https://images.unsplash.com/photo-1547592180-85f173990554?auto=format&fit=crop&w=800&q=80',
            ]
        );

        Menu::firstOrCreate(
            ['name' => 'Nasi Kotak Rendang', 'merchant_id' => $merchant->id],
            [
                'description' => 'Nasi kotak dengan rendang padang yang lezat.',
                'price' => 42000,
                'category' => 'tradisional',
                'image_url' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=800&q=80',
            ]
        );
    }
}

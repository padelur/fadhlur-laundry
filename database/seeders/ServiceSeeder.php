<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'Cuci Kering',
                'description' => 'Layanan cuci dan pengeringan pakaian tanpa setrika.',
                'price_per_kg' => 6000,
            ],
            [
                'name' => 'Cuci Kering + Setrika',
                'description' => 'Paket cuci, pengeringan, dan setrika.',
                'price_per_kg' => 9000,
            ],
            [
                'name' => 'Setrika Saja',
                'description' => 'Hanya setrika baju yang sudah dicuci.',
                'price_per_kg' => 5000,
            ],
            [
                'name' => 'Cuci Bed Cover',
                'description' => 'Layanan khusus mencuci bed cover (harga per buah).',
                'price_per_kg' => 20000,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}

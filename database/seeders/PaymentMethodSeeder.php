<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentMethod::factory()->create([
            'username' => 'Bayar Ditempat',
            'bank_name' => 'Bayar Ditempat',
            'rekening' => 'cod',
        ]);

        // PaymentMethod::factory()->create([
        //     'username' => 'Antar Ke Alamat',
        //     'bank_name' => 'Antar Ke Alamat',
        //     'rekening' => 'delivery',
        // ]);

        // PaymentMethod::factory()->create([
        //     'username' => 'Ambil di Tempat',
        //     'bank_name' => 'Ambil di Tempat',
        //     'rekening' => 'pickup',
        // ]);

        PaymentMethod::factory(5)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'name' => 'Pakaian Wanita',
            ],
            [
                'name' => 'Pakaian Pria',
            ],
            [
                'name' => 'Celana/Rok Wanita',
            ],
            [
                'name' => 'Celana Pria',
            ],
            [
                'name' => 'Pakaian Anak-anak',
            ],
            [
                'name' => 'Pakaian Bayi',
            ],
            [
                'name' => 'Aksesoris/Perhiasan',
            ],
            [
                'name' => 'Sepatu Wanita',
            ],
            [
                'name' => 'Sepatu Pria',
            ],
            [
                'name' => 'Sepatu Anak-anak',
            ],
            [
                'name' => 'Produk Kecantikan',
            ],
        );

        foreach ($data as $item) {
            Category::create([
                'name' => $item['name'],
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Size;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::whereIn('name', ['Pakaian Wanita', 'Pakaian Pria', 'Pakaian Anak-anak', 'Celana/Rok Wanita', 'Celana Pria', 'Sepatu Wanita', 'Sepatu Pria', 'Sepatu Anak-anak'])->get();

        foreach ($categories as $category) {
            if ($category->name === 'Pakaian Wanita' || $category->name === 'Pakaian Pria' || $category->name === 'Pakaian Anak-anak') {
                $sizes = ['XS', 'S', 'M', 'L', 'XL', 'XXL'];
            } elseif ($category->name === 'Celana/Rok Wanita' || $category->name === 'Celana Pria') {
                $sizes = ['28', '30', '32', '34', '36'];
            } elseif ($category->name === 'Sepatu Wanita' || $category->name === 'Sepatu Pria') {
                $sizes = ['37', '38', '39', '40', '41', '42', '43', '44', '45'];
            } elseif ($category->name === 'Sepatu Anak-anak') {
                $sizes = ['21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31', '32', '33', '34', '35', '36'];
            } else {
                $sizes = [];
            }

            foreach ($sizes as $size) {
                Size::create([
                    'size' => $size,
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}

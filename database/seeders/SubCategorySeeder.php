<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subCategories = [
            [
                'category_id' => "1",
                'name' => "Psikologi"
            ],
            [
                'category_id' => "1",
                'name' => "Parenting"
            ],
            [
                'category_id' => "1",
                'name' => "Biografi"
            ],
            [
                'category_id' => "1",
                'name' => "Umum"
            ],
            [
                'category_id' => "1",
                'name' => "History"
            ],
            [
                'category_id' => "5",
                'name' => "Tips & Trik"
            ],
            [
                'category_id' => "5",
                'name' => "Kejahatan Siber"
            ],
            [
                'category_id' => "5",
                'name' => "Lain-Lain"
            ],
            [
                'category_id' => "6",
                'name' => "Nasional"
            ],
            [
                'category_id' => "6",
                'name' => "Internasional"
            ],
            [
                'category_id' => "7",
                'name' => "Food"
            ],
            [
                'category_id' => "7",
                'name' => "Film"
            ],
            [
                'category_id' => "7",
                'name' => "Travel"
            ],
            [
                'category_id' => "7",
                'name' => "Buku"
            ],
            [
                'category_id' => "7",
                'name' => "Sport"
            ],
            [
                'category_id' => "7",
                'name' => "Beauty & Woman"
            ],
        ];
        foreach ($subCategories as $subCategory) {
            SubCategory::create([
                'category_id' => $subCategory['category_id'],
                'name' => $subCategory['name'],
            ]);
        }
        
    }
}

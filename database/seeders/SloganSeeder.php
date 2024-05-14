<?php

namespace Database\Seeders;

use App\Models\Slogan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SloganSeeder extends Seeder
{
     /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $slogan = [
            ['content' => '© GetMedia berita terlengkap dengan berita terbaru dan terpopuler.', 'status' => 'active'],
        ];

        foreach($slogan as $slogan)
        {
            Slogan::create($slogan);
        }
    }
}

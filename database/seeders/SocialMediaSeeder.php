<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mediasosial = [
            ['icon' => '', 'name' => 'facebook', 'link' => 'https://www.facebook.com/?locale=id_ID', 'status' => 'active'],
            ['icon' => '', 'name' => 'twitter', 'link' => 'https://twitter.com/login', 'status' => 'active'],
            ['icon' => '', 'name' => 'instagram', 'link' => 'https://www.instagram.com/accounts/login/', 'status' => 'active'],
            ['icon' => '', 'name' => 'linked.in', 'link' => 'https://www.linkedin.com/login/in', 'status' => 'active'],
        ];

        foreach($mediasosial as $media)
        {
            SocialMedia::create($media);
        }
    }
}

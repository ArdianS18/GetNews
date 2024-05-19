<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contact = [
            ['logo' => '-', 'slogan' => 'Portal berita terlengkap dengan berita terbaru dan terpopuler.',
            'email' => 'getmedia@gmail.com', 'phone_number' => '+62 000 0000 0000', 'address' => 'Permata Regency Nglijo', 'url_facebook' => 'facebook.com',
            'url_twitter' => 'twitter.com', 'url_instagram' => 'instagram.com', 'url_linkedin' => 'likedin.com'],
        ];

        foreach($contact as $data)
        {
            Contact::create($data);
        }
    }
}

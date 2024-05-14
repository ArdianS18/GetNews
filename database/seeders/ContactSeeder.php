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
            ['name' => 'phone', 'content' => '+62 000 0000 0000', 'status' => 'active'],
            ['name' => 'email', 'content' => 'GetMedia@gmail.com', 'status' => 'active'],
            ['name' => 'location', 'content' => 'Permata Regency', 'status' => 'active'],
        ];

        foreach($contact as $data)
        {
            Contact::create($data);
        }
    }
}

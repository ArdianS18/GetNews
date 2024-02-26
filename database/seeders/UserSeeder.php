<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Provider\Uuid;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Role::all() as $role) {
            $profile = User::query()
                ->create([
                    'id' => Uuid::uuid(),
                    'name' => $role['name'],
                    'email' => str_replace(' ', '', $role['name']) . "@gmail.com",
                    'phone_number' => '08934574332',
                    'address' => '-',
                    'status' => 'approved',
                    'password' => bcrypt('password'),
                    'email_verified_at' => now()
                ]);

            $profile->assignRole($role);
        }
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\Category::factory(5)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'empNumber' => '00001',
            'phone' => '0123456789',
            'role' => '2',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'agent',
            'email' => 'agent@agent.com',
            'empNumber' => '00002',
            'phone' => '0123456788',
            'role' => '1',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'user',
            'email' => 'user@user.com',
            'empNumber' => '00003',
            'phone' => '0123456787',
            'role' => '0',
        ]);

        
        \App\Models\Ticket::factory(5)->create();
    }
}

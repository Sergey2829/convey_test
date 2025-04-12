<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Plan;
use App\Models\Domain;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = Plan::all();

        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
            'plan_id' => $plans->random()->id,
        ]);

        // Create 25 random users with domains
        User::factory()
            ->count(25)
            ->has(
                Domain::factory()
                    ->count(rand(1, 4))
            )
            ->create([
                'is_admin' => false,
                'plan_id' => fn() => $plans->random()->id,
            ]);
    }
}

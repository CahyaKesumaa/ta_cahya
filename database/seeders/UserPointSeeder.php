<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = \App\Models\User::all();

        foreach ($users as $user) {
            if (!$user->points) {
                \App\Models\UserPoint::create([
                    'user_id' => $user->id,
                    'strength' => rand(10, 100),
                    'endurance' => rand(10, 100),
                    'agility' => rand(10, 100),
                    'total_point' => rand(100, 1000),
                ]);
            }
        }
    }
}

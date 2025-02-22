<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Desta forma cria dados muito aleatórios
        /*$this->call([
            UserSeeder::class,
        ]);*/

        //Desta forma cria dados mais controlados, com dados mais próximos ao real
        User::factory(50)->create();


        /* User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/
    }
}

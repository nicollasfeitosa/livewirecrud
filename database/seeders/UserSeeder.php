<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
                'name' => 'Nicollas Feitosa',
                'email' => 'nicollas@gmail.com',
                'password' => bcrypt('123mudar'),
            ]);

        User::factory()->times(10)->create();
    }
}

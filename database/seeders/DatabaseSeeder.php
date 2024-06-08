<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Quest;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@tabletopgaymer.org',
        ]);

        $this->call([
            CategorySeeder::class,
        ]);

        $this->call([
            QuestSeeder::class,
        ]);

		$seeder = new CreateDefaultRolesAndPermissionsSeeder();
        $seeder->run();

       // User::factory(10)->create();  // Creates 10 users with random data

       // Quest::factory(10)->create();;
    }
}

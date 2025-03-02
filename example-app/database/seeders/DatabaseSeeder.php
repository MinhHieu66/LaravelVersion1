<?php
namespace Database\Seeders;

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

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // DB::table('users')->insert([
        //     'name'     => 'Newbie Laravel',
        //     'email'    => 'hp110333@gmail.com',
        //     'password' => Hash::make('password'),
        // ]);

        $this->call([
            UserSeeder::class,
        ]);
    }
}

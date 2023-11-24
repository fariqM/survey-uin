<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use MattDaneshvar\Survey\Models\Survey;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(1)->create();

        \App\Models\User::factory()->create([
            'name' => 'Muchammad Fariq Maulana, S.Kom.',
            'type' => 'Tenaga Kependidikan',
            'email' => 'maulana.fariq30@gmail.com',
            'nip' => '20230203',
            'password' => \Hash::make('rangga1822'),
            'email_verified_at' => Carbon::now(),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Jeffri Dian Asmoro, S.Kom',
            'type' => 'Tenaga Kependidikan',
            'email' => 'juki@gmail.com',
            'nip' => '20220805',
            'password' => \Hash::make('rangga1822'),
            'email_verified_at' => Carbon::now(),
        ]);

        
    }
}

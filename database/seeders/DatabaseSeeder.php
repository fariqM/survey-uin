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
            'email' => 'maulana.fariq30@gmail.com',
            'nip' => '20230203',
            'password' => \Hash::make('rangga1822'),
            'email_verified_at' => Carbon::now(),
        ]);

        $survey = Survey::create([
            'name' => 'Cat Population Survey',
            'settings' => [
                'accept-guest-entries' => true,
                'limit-per-participant' => 1
            ]
        ]);

        $survey->questions()->create([
            'content' => 'How many cats do you have?',
            'type' => 'number',
            'rules' => ['numeric', 'min:0']
        ]);

        $survey->questions()->create([
            'content' => 'What\'s the name of your first cat',
        ]);

        $survey->questions()->create([
            'content' => 'Would you want a new cat?',
            'type' => 'radio',
            'options' => ['Yes', 'Oui'],
            'rules' => ['required']
        ]);
    }
}

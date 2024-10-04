<?php

namespace Database\Seeders;

use App\Models\Background;
use Illuminate\Database\Seeder;

class BackgroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $backgrounds = [
            ['name' => 'Acolyte', 'description' => 'You have spent your life in the service of a temple to a specific god or pantheon of gods.'],
            ['name' => 'Charlatan', 'description' => 'You have always had a way with people.'],
            // Add other backgrounds with descriptions here
        ];

        foreach ($backgrounds as $background) {
            Background::create($background);
        }
    }
}

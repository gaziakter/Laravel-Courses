<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Series;
use App\Models\Topic;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $series = ['PHP', 'JavaScript', 'WordPress', 'Laravel'];
        foreach($series as $item){
            Series::create([
                'name' => $item,
            ]);
        }

        $topic = ['eloquent', 'validation', 'authentication', 'testing', 'Refactoring'];
        foreach($topic as $item){
            Topic::create([
                'name' => $item,
            ]);
        }
    }
}

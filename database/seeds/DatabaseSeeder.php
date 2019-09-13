<?php

use App\Series;
use App\User;
use App\Video;
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
        factory(App\User::class, 3)->create();

        Series::get()->each(function($series) {
            factory(Video::class, rand(2,4))->create([ 'series_id' => $series->id ]);
        });

        User::get()->each(function($user) {
            $user->videos_watched()->attach(Video::inRandomOrder()->first()->id, [ 'completed_watching' => rand(1,2) === 1 ]);
        });
    }
}

<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Tweet;
use Illuminate\Database\Seeder;

class TweetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tweet::factory()->count(10)->create()->each(
            fn (Tweet $tweet) => Image::factory()->count(4)->create()->each(
                fn (Image $image) => $tweet->images()->attach($image->id)
            )
        );
    }
}

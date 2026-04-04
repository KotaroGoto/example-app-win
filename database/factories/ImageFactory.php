<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Swatty007\FakerImageGenerator\Providers\FakerImageGenerationProvider;

/**
 * @extends Factory<Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // ディレクトリがなければ作成する
        if (! Storage::disk('public')->exists('images')) {
            Storage::disk('public')->makeDirectory('images');
        }
        $faker = \Faker\Factory::create();
        $faker->addProvider(new FakerImageGenerationProvider($faker));
        $imagePath = $faker->imageGenerator();

        return [
            'name' => basename($imagePath),
        ];
    }
}

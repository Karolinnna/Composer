<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $genres = ['Rock', 'Pop', 'Jazz', 'Hip-Hop', 'Classical', 'Electronic', 'Country', 'Blues'];

        return [
            'title' => $this->faker->sentence(3),
            'artist' => $this->faker->name(),
            'album' => $this->faker->optional(0.8)->words(3, true),
            'genre' => $this->faker->randomElement($genres),
            'duration' => $this->faker->numberBetween(120, 480), // 2-8 minutes
            'release_date' => $this->faker->optional(0.7)->date(),
            'lyrics' => $this->faker->optional(0.5)->paragraphs(3, true),
            'cover_image' => $this->faker->optional(0.6)->imageUrl(300, 300, 'music'),
        ];
    }
}

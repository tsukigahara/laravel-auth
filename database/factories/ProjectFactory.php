<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->company(),
            'description' => fake()->text(),
            'main_image' => fake()->imageUrl(640, 480, 'website', true),
            'release_date' => fake()->date('Y-m-d', 'now'),
            'repo_link' => 'https://github.com/' . fake()->slug(3, false),
        ];
    }
}

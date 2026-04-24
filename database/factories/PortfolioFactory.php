<?php

namespace Database\Factories;

use App\Models\Portfolio;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Portfolio>
 */
class PortfolioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(3);
        return [
            'portfolio_title' => $title,
            'slug' => Str::slug($title) . '-' . fake()->unique()->numberBetween(100, 999),
            'portfolio_description' => fake()->paragraph(3),
            'portfolio_image' => 'https://picsum.photos/600/400?random=' . fake()->numberBetween(1, 1000),
            'portfolio_category' => fake()->randomElement([
                'Web Design',
                'Company',
                'Dashboard',
                'E-commerce',
                
            ]),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        Str::slug('Laravel 5 Framework', '-');

        return [
            'name' => $name = fake()->unique()->company(),
            'address' => fake()->address(),
            'website' => Str::slug($name, '')  . '.com',
            'email' => Str::slug($name, '') . '@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}

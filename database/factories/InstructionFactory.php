<?php

namespace Database\Factories;

use App\Models\Recipe;
use App\Models\Picture;
use App\Models\Instrument;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Instruction>
 */
class InstructionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'recipe_id' => Recipe::select('id')->get()->random(),
            'picture_id' => Picture::factory()->create(),
            'instrument_id' => Instrument::select('id')->get()->random(),
            'order' => fake()->numberBetween(1, 15),
            'content' => fake()->paragraph(mt_rand(5, 25))
        ];
    }
}

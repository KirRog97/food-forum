<?php

namespace Database\Factories;

use App\Models\Picture;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /** 
     * Define the model's default state.     
     */
    public function definition(): array
    {
        return [
            'username'            =>      $this->faker->name,
            'avatar_id'           =>      Picture::factory()->avatar()->create()->id,
            'email'               =>      $this->faker->unique()->safeEmail,
            'password'            =>      bcrypt('secret'),
            'remember_token'      =>      Str::random(10),
            'email_verified_at'   =>      now(),
        ];
    }
}

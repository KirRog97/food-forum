<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PictureFactory extends Factory
{
    private string $default_post_image = '/images/recipes/default_post_img.jpg';
    private string $default_avatar_image =  '/images/icons/user_avacado.svg';

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'path'  =>  $this->default_post_image,
            'mime'  =>  'image/jpg',
            'size'  =>  fake()->randomDigitNotNull
        ];
    }

    /**
     * This state create Avatar for User.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function avatar()
    {
        return $this->state(
            function (array $attributes) {
                return [
                    'path'  =>  $this->default_avatar_image,
                    'mime'  =>  'image/svg',
                    'size'  =>  0
                ];
            }
        );
    }
}

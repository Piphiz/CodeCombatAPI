<?php

namespace Database\Factories;

use App\Models\Advert;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdvertFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Advert::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'file' => $this->faker->imageUrl($width = 640, $height = 480),
            'script_html' => $this->faker->optional()->randomHtml(2,3),
            'status' => $this->faker->optional()->boolean($chanceOfGettingTrue = 50),
            'start_date' => $this->faker->optional()->dateTimeBetween($startDate = '-1 years', $endDate = '+1 year', $timezone = null),
            'end_date' => $this->faker->optional()->dateTimeBetween($startDate = '-1 year', $endDate = '+1 year', $timezone = null),
        ];
    }
}

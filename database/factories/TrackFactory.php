<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Track>
 */
class TrackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'     => $this->faker->word,
            'filename' => function() {
                $filename = $this->faker->optional()->word;
                if ($filename) {
                    $filename .= ".wav";
                }

                return $filename;
            } ,
            'color'    => $this->faker->hexColor,
        ];
    }
}

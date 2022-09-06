<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Model\Patient;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $mode = Patient::class;

    public function definition()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));        

        return [
            'name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'ocupation' => fake()->jobTitle(),
            'birthdate' => fake()->dateTimeBetween('1960-01-01', '2000-12-31')->format('Y-m-d'),
            'district' => fake()->city(),
            'nutritional_diagnosis' => fake()->sentence(),
            'type_of_surgery' => fake()->optional(0.9, 'Bypass Gastrico')->randomElement(null),
            'profile_photo' => $faker->imageUrl(150,150),
        ];
    }
}

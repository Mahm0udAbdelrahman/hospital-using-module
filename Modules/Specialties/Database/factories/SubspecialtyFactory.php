<?php

namespace Modules\Specialties\Database\factories;

use Modules\Specialties\Entities\Subspecialty;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubspecialtyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subspecialty::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name()
        ];
    }
}
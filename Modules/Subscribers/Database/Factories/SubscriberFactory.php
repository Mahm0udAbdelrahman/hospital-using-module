<?php
namespace Modules\Subscribers\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Subscribers\Models\Subscriber;

class SubscriberFactory extends Factory
{
    protected $model = Subscriber::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name()
        ];
    }
}
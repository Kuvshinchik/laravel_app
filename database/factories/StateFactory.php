<?php

namespace Database\Factories;

use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\State>
 */
class StateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     *@var string
     *
     * @return array<string, mixed>
     */
    protected $model = State::class;
    public function definition()
    {
        return [
		//функция numberBetween рандомно генерит лайки или просмотры в данном контескте
            'likes' => $this->faker->numberBetween($min=1, $max=20),
            'views' => $this->faker->numberBetween($min=21, $max=100),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Rest;
use Illuminate\Database\Eloquent\Factories\Factory;

class RestFactory extends Factory
{
     /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
    protected $model = Rest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'attendance_id' => $this->faker->randomNumber,
            'rest_start_time' => $this->faker->time,
            'rest_end_time' =>$this->faker->time
        ];
    }
}

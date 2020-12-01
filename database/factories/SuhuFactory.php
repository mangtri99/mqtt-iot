<?php

namespace Database\Factories;

use App\Models\Suhu;
use Illuminate\Database\Eloquent\Factories\Factory;

class SuhuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Suhu::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 2,
            'suhu' => rand(35, 38),
        ];
    }
}

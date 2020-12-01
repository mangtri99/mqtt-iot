<?php

namespace Database\Factories;

use App\Models\Detak;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetakFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Detak::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 2,
            'bpm' => rand(60, 100),
            'oksigen' => rand(85, 100)
        ];
    }
}

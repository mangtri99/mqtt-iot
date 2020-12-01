<?php

namespace Database\Factories;

use App\Models\TekananDarah;
use Illuminate\Database\Eloquent\Factories\Factory;

class TekananDarahFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TekananDarah::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 2,
            'sistole' => rand(120, 160),
            'diastole' => rand(60, 100),
            'keterangan' => 'normal'
        ];
    }
}

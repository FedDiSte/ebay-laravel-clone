<?php

namespace Database\Factories;

use App\Models\Inserzione;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InserzioneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Inserzione::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->colorName(),
            'descrizione' => $this->faker->text(100),
            'stato' => 0,
            'prezzo' => 20.00,
            'fine_inserzione' => $this->faker->dateTimeInInterval('tomorrow', '1 year', 'UTC'),
            'id_creatore' => $this -> faker -> numberBetween(71, 171),
            'genere_id' => $this -> faker -> numberBetween(1, 6),
        ];
    }
}

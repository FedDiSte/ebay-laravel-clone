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
            'nome' => 'Test obj',
            'descrizione' => $this->faker->text(100),
            'stato' => 0,
            'prezzo' => 20.00,
            'fine_inserzione' => $this->faker->dateTime('now', 'UTC'),
            'id_creatore' => 1,
            'genere_id' => 1,
        ];
    }
}
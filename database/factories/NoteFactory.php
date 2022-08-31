<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>ucfirst($this->faker->words(2, true)),
            'body' => $this->faker->text,
            'user' => $this->faker->name,
            'button' => $this->faker->words(1, true)
        ];
    }
}

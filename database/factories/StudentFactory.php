<?php

namespace Database\Factories;

use App\Models\Classroom;
use Illuminate\Support\Str;
use PhpParser\Builder\Class_;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElements(["laki - laki", "perempuan"])[0];
        $agama = $this->faker->randomElements(["islam", "katolik", "kristen", "hindu", "buddha", "konghucu"])[0];
        return [
            "nis" => "123456",
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => \bcrypt('password'), // password
            'alamat' => $this->faker->address(),
            'agama' => $agama,
            'no_hp' => $this->faker->phoneNumber(),
            'gender' => $gender,
            'classroom_id' => $this->faker->numberBetween(1, Classroom::count()),
            'remember_token' => Str::random(10),
        ];
    }
}

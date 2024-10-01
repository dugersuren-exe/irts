<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'teacher_id' => $this->faker->numberBetween($min=20200101, $max=20200107),
            'grade' => $this->faker->numberBetween($min=1, $max=13),
            'group' => $this->faker->randomElement(['А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З']),
            'YearLesson' =>$this->faker->randomElement(['2023-2024', '2022-2023', '2021-2022', '2020-2021']),// $this->faker->sentence(1),
            'isActive' => $this->faker->boolean(),
        ];
    }
}

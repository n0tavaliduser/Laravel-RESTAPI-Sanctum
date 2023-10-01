<?php

namespace Database\Factories;

use App\Models\MCategoryTask;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user_id = fake()->randomElement(User::pluck('id')->toArray());

        return [
            'title' => fake()->sentence(2, true),
            'due_date' => Carbon::now()->addDay(random_int(2, 5)),
            'description' => fake()->paragraph(2, true),
            'm_category_task_id' => fake()->randomElement(MCategoryTask::pluck('id')->toArray()),
            'created_by' => $user_id,
            'updated_by' => $user_id,
        ];
    }
}

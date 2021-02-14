<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Statu allowed in database
     * 
     * @var array
     */
    protected $status = ['open', 'in_progress', 'close'];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, 20),
            'title' => $this->faker->sentence(1),
            'description' => $this->faker->realText(rand(20, 150)),
            'status' => Arr::random($this->status)
        ];
    }
}

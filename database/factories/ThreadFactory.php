<?php

namespace Database\Factories;

use App\Models\Thread;
use App\Models\User;
use App\Models\Channel;
use Illuminate\Database\Eloquent\Factories\Factory;

class ThreadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Thread::class;

    /**
     * Define the model's default state. 
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function(){
                return User::factory()->count(1)->create()->first()->id;
            },
            'body'  => $this->faker->paragraph(),
            'slug' => $this->faker->sentence(),
            'title' => $this->faker->sentence(),
            'channel_id' => function(){
                return Channel::factory()->count(1)->create()->first()->id;
            },
        ];
    }
}

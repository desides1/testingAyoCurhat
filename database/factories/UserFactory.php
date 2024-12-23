<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $userModel = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name,
            'password' => Hash::make('password'),
        ];
    }

    public function admin()
    {
        return $this->afterCreating(function (User $user) {
            $user->assignRole('Admin');
        });
    }
    public function tamuSatgas()
    {
        return $this->afterCreating(function (User $user) {
            $user->assignRole('Tamu Satgas');
        });
    }

    public function petugas()
    {
        return $this->afterCreating(function (User $user) {
            $user->assignRole('Petugas');
        });
    }
}

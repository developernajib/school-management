<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class ModeratorFactory extends Factory
{

    public function definition()
    {
        return [
            'name' => "Moderator",
            'email' => "Moderator@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make("123456789"), // 123456789
            'created_at' => Carbon::now(),
            'status' => 1,

        ];
    }
}

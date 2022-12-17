<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class AdminFactory extends Factory
{

    public function definition()
    {
        return [
            'name' => "Administrator",
            'email' => "admin@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make("123456789"), // 123456789
            'created_at' => Carbon::now(),
            'secret_code' => "Test",
            'status' => 1,

        ];
    }
}

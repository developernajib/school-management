<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Moderator;
use App\Models\User;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        Admin::factory(1)->create();
        Moderator::factory(1)->create();
        User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Md. Najib Islam',
            'email' => 'user@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make("123456789"), // 123456789
            'remember_token' => Str::random(10),
            'status' => 1,
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class ModeratorSeeder extends Seeder
{

    public function run()
    {
        Admin::factory(1)->create();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
       //\App\Models\User::factory(10)->create();
       \App\Models\Inserzione::factory(100)->create();
    }
}

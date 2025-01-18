<?php

namespace Database\Seeders;

use App\Models\Dojos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DojosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dojos::factory()->count(10)->create();
    }
}

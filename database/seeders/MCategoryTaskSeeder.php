<?php

namespace Database\Seeders;

use App\Models\MCategoryTask;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MCategoryTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MCategoryTask::factory()->count(5)->create();
    }
}

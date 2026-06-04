<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\matakuliah;

class matakuliahseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        matakuliah::factory()->count(20)->create();
    }
}

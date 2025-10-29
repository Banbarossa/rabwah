<?php

namespace Database\Seeders;

use App\Models\CategoryProgram;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoryProgram::create([

            'name'=>'Prioritas',
        ]);
        CategoryProgram::create([
            'name'=>'Sosial',
        ]);
    }
}

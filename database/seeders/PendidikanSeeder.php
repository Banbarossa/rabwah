<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $files=[
            database_path('seeders/data/pendidikans.sql')
        ];
        foreach ($files as $file) {
            if (file_exists($file)) {
                DB::unprepared(file_get_contents($file));
                $this->command->info("Imported: " . basename($file));
            } else {
                $this->command->warn("File not found: " . basename($file));
            }
        }
    }
}

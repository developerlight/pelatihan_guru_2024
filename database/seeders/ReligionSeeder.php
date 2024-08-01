<?php

namespace Database\Seeders;

use App\Models\Religions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $religions = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu'];

        foreach ($religions as $religion) {
            DB::table('religions')->updateOrInsert(
                ['religion' => $religion],
                ['religion' => $religion]
            );
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\GradeCriteria;
use Illuminate\Database\Seeder;

class GradeCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        foreach ([[60, 80, 100], [80, 91, 200], [91, 100, 300], [100, -1, 500]] as $d) {
            GradeCriteria::create([
                'min' => $d[0],
                'max' => $d[1],
                'val' => $d[2],
            ]);
        }
    }
}

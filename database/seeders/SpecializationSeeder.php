<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationSeeder extends Seeder
{
    public function run()
    {
        DB::table('specializations')->insert([
            'name' => 'Cardiology', // Dummy data for specialization
        ]);
    }
}

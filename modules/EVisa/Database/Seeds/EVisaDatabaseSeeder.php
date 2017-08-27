<?php

namespace Modules\EVisa\Database\Seeds;

use Illuminate\Database\Seeder;
use Modules\EVisa\Models\EntryPoint;

class EVisaDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $this->call(EntryPointsSeeder::class);
    }
}
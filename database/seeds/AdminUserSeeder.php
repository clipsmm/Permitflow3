<?php

use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::query()->firstOrCreate(['id_number' => 'XXXXXXXX'], [
            'id_type' => 'system',
            'email' => 'su@su.su',
            'first_name' => 'Dirth',
            'last_name' => 'Vader',
            'gender' => 'M',
            'dob' => '01/01/0001',
            'status' => 'active',
            'password' => 'm@nticore#1901',
            'created_at' => carbon()->now(),
            'updated_at' => carbon()->now(),
            'is_admin' => true
        ]);
    }
}

<?php
namespace Modules\EVisa\Database\Seeds;

use Illuminate\Database\Seeder;
use Modules\EVisa\Models\EntryPoint;

class EntryPointsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $entry_points = [
        ['name' => 'Eldoret International Airport', 'type' => 'air'],
        ['name' => 'Garisa Airstrip', 'type' => 'air'],
        ['name' => 'Jomo Kenyatta Airport, Nairobi', 'type' => 'air'],
        ['name' => 'Kisumu Airport', 'type' => 'air'],
        ['name' => 'Lamu Airport', 'type' => 'air'],
        ['name' => 'Lokichogio Airport', 'type' => 'air'],
        ['name' => 'Wajir International Airport', 'type' => 'air'],
        ['name' => 'Wilson Airport, Nairobi', 'type' => 'air'],
        ['name' => 'Busia', 'type' => 'road'],
        ['name' => 'Isebania', 'type' => 'road'],
        ['name' => 'Liboi', 'type' => 'road'],
        ['name' => 'Loitokitok', 'type' => 'road'],
        ['name' => 'Lungalunga', 'type' => 'road'],
        ['name' => 'Mandera', 'type' => 'road'],
        ['name' => 'Moyale', 'type' => 'road'],
        ['name' => 'Nadapal', 'type' => 'road'],
        ['name' => 'Namanga', 'type' => 'road'],
        ['name' => 'Taveta', 'type' => 'road'],
        ['name' => 'Kilindini Sea Port', 'type' => 'ship'],
        ['name' => 'Kisumu', 'type' => 'ship'],
        ['name' => 'Kuinga', 'type' => 'ship'],
        ['name' => 'Lamu', 'type' => 'ship'],
        ['name' => 'Malindi', 'type' => 'ship'],
        ['name' => 'Mbita Point', 'type' => 'ship'],
        ['name' => 'Muhuru Bay', 'type' => 'ship'],
        ['name' => 'Old Port', 'type' => 'ship'],
        ['name' => 'Shimoni', 'type' => 'ship'],
        ['name' => 'Vanga', 'type' => 'ship']

    ];

    public function run()
    {
        \DB::table('e_visa_entry_points')->truncate();
        EntryPoint::insert($this->entry_points);
    }
}

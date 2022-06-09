<?php

namespace Database\Seeders;

use App\Models\MasterClass;
use Illuminate\Database\Seeder;

class MasterClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<8;$i++){
            MasterClass::create(['name' => 'X-'.($i+1), 'wali_name' => '-']);
        }
        for($i=0;$i<3;$i++){
            MasterClass::create(['name' => 'XI MIA-'.($i+1), 'wali_name' => '-']);
            MasterClass::create(['name' => 'XI IIS-'.($i+1), 'wali_name' => '-']);
        }
        for($i=0;$i<4;$i++){
            MasterClass::create(['name' => 'XII MIA-'.($i+1), 'wali_name' => '-']);
            MasterClass::create(['name' => 'XII IIS-'.($i+1), 'wali_name' => '-']);
        }
    }
}

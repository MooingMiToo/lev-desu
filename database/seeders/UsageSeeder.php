<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class UsageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usages')->insert([
                ['usage' => '朝食後', 'others'=> null, 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
                ['usage' => '昼食後', 'others'=> null, 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
                ['usage' => '夕食後', 'others'=> null, 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
                ['usage' => '就寝前', 'others'=> null, 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
                ['usage' => '必要時', 'others'=> null, 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
                ['usage' => '1日1回', 'others'=> null, 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
                ['usage' => '1日2回', 'others'=> null, 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
                ['usage' => '1日3回', 'others'=> null, 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
                ['usage' => '1日4回', 'others'=> null, 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
                ['usage' => '1回1錠', 'others'=> null, 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
                ['usage' => '1回2錠', 'others'=> null, 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
                ['usage' => '1回3錠', 'others'=> null, 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
                ['usage' => '1回4錠', 'others'=> null, 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
                ['usage' => 'その他', 'others'=> null, 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
        ]);
    }
}

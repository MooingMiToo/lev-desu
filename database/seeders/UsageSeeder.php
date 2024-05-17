<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
                'usage' => '朝食後',
                'others'=> null,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}

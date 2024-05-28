<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usages = [
            ['usage' => '朝食後'],
            ['usage' => '昼食後'],
            ['usage' => '夕食後'],
            ['usage' => '就寝前'],
            ['usage' => '必要時'],
            ['usage' => '1日1回'],
            ['usage' => '1日2回'],
            ['usage' => '1日3回'],
            ['usage' => '1日4回'],
            ['usage' => '1回1錠'],
            ['usage' => '1回2錠'],
            ['usage' => '1回3錠'],
            ['usage' => '1回4錠'],
            ['usage' => 'その他'],
        ];

        $timestamp = Carbon::now();

        foreach ($usages as &$usage) {
            $usage['created_at'] = $timestamp;
            $usage['updated_at'] = $timestamp;
        }

        DB::table('usages')->insert($usages);
    }
}
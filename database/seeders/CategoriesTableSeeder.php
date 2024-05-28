<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use DateTime;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $categories = [
            ['name' => '錠剤'],
            ['name' => '粉剤'],
            ['name' => '液剤'],
            ['name' => '顆粒剤'],
            ['name' => 'カプセル錠'],
            ['name' => '塗り薬'],
            ['name' => '張り薬'],
            ['name' => '点眼剤'],
            ['name' => '座薬'],
            ['name' => '吸引剤'],
            ['name' => 'その他'],
            
        ];

        
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
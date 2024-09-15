<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Seed the categories table.
     *
     * @return void
     */
    public function run()
    {
        // 正しいデータを挿入
        DB::table('categories')->insert([
            ['name' => '商品のお届けについて'],
            ['name' => '商品交換について'],
            ['name' => '商品トラブル'],
            ['name' => 'ショップへのお問い合わせ'],
            ['name' => 'その他'],
        ]);
    }
}

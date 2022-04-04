<?php

use Illuminate\Database\Seeder;

class MenuGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu_group')->insert([
            ['title' => 'menu đầu trang', 'position' => 'đầu trang'],
            ['title' => 'menu cuối trang', 'position' => 'cuối trang'],
        ]);
    }
}

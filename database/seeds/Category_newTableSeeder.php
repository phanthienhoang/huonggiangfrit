<?php

use Illuminate\Database\Seeder;

class Category_newTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_new = new \App\Category_new();
        $category_new->online = '1';
        $category_new->save();

        $category_new = new \App\Category_new();
        $category_new->online = '1';
        $category_new->save();

        $category_new = new \App\Category_new();
        $category_new->online = '1';
        $category_new->save();
    }
}

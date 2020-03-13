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
        $category_new->name = 'Sự kiện nổi bật';
        $category_new->save();

        $category_new = new \App\Category_new();
        $category_new->name = 'Tin trong nghành';
        $category_new->save();

        $category_new = new \App\Category_new();
        $category_new->name = 'Tin hoạt động công ty';
        $category_new->save();
    }
}

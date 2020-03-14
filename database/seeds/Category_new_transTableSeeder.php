<?php

use Illuminate\Database\Seeder;

class Category_new_transTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_new_tran = new \App\Category_new_tran();
        $category_new_tran->name = 'Sự kiện nổi bật';
        $category_new_tran->locale = 'vi';
        $category_new_tran->category_id = 1;
        $category_new_tran->save();

        $category_new_tran = new \App\Category_new_tran();
        $category_new_tran->name = 'Big event';
        $category_new_tran->locale = 'en';
        $category_new_tran->category_id = 1;
        $category_new_tran->save();


        $category_new_tran = new \App\Category_new_tran();
        $category_new_tran->name = 'Tin trong nghành';
        $category_new_tran->locale = 'vi';
        $category_new_tran->category_id = 2;
        $category_new_tran->save();

        $category_new_tran = new \App\Category_new_tran();
        $category_new_tran->name = 'Industry news';
        $category_new_tran->locale = 'en';
        $category_new_tran->category_id = 2;
        $category_new_tran->save();


        $category_new_tran = new \App\Category_new_tran();
        $category_new_tran->name = 'Tin hoạt động công ty';
        $category_new_tran->locale = 'vi';
        $category_new_tran->category_id = 3;
        $category_new_tran->save();

        $category_new_tran = new \App\Category_new_tran();
        $category_new_tran->name = 'Company activity news';
        $category_new_tran->locale = 'en';
        $category_new_tran->category_id = 3;
        $category_new_tran->save();


    }
}

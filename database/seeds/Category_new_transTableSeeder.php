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
        $category_new_tran->name = 'SỰ KIỆN NỔI BẬT';
        $category_new_tran->locale = 'vi';
        $category_new_tran->slug = 'su-kien-noi-bat';
        $category_new_tran->category_id = 1;
        $category_new_tran->save();

        $category_new_tran = new \App\Category_new_tran();
        $category_new_tran->name = 'BIG EVENT';
        $category_new_tran->locale = 'en';
        $category_new_tran->slug ='big-event';
        $category_new_tran->category_id = 1;
        $category_new_tran->save();


        $category_new_tran = new \App\Category_new_tran();
        $category_new_tran->name = 'TIN TRONG NGHÀNH';
        $category_new_tran->locale = 'vi';
        $category_new_tran->slug = 'tin-trong-nghanh';
        $category_new_tran->category_id = 2;
        $category_new_tran->save();

        $category_new_tran = new \App\Category_new_tran();
        $category_new_tran->name = 'INDUSTRY NEWS';
        $category_new_tran->locale = 'en';
        $category_new_tran->slug = 'industry-news';
        $category_new_tran->category_id = 2;
        $category_new_tran->save();


        $category_new_tran = new \App\Category_new_tran();
        $category_new_tran->name = 'TIN HOẠT ĐỘNG CÔNG TY';
        $category_new_tran->locale = 'vi';
        $category_new_tran->slug = 'tin-hoat-dong-cong-ty';
        $category_new_tran->category_id = 3;
        $category_new_tran->save();

        $category_new_tran = new \App\Category_new_tran();
        $category_new_tran->name = 'COMPANY ACTIVITY NEWS';
        $category_new_tran->locale = 'en';
        $category_new_tran->slug = 'company-activity-news';
        $category_new_tran->category_id = 3;
        $category_new_tran->save();


    }
}

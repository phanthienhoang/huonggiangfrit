<?php

use Illuminate\Database\Seeder;

class NewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new = new \App\News();
        $new->category_id = 1;
        $new->save();

        $new = new \App\News();
        $new->category_id = 2;
        $new->save();

        $new = new \App\News();
        $new->category_id = 3;
        $new->save();


    }
}

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
        $new->name = 'Thông báo ĐHĐCĐ thường niên năm 2017';
        $new->category_id = 1;
        $new->save();

        $new = new \App\News();
        $new->name = 'Tình hình kinh tế và sản xuất gốm sứ các nước thành viên CICA';
        $new->category_id = 2;
        $new->save();

        $new = new \App\News();
        $new->name = 'Công bố thông tin thay đổi giấy CNDKDN';
        $new->category_id = 3;
        $new->save();


    }
}

<?php

use Illuminate\Database\Seeder;
use App\Category_Shareholder_Tran;
class CateShareHolderTransSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $atri = new Category_Shareholder_Tran();
        $atri->title ="Đại Hội Cổ Đông";
        $atri->locale ="vi";
        $atri->category_id ="1";
        $atri->status = 1;
        $atri->save();

        $atri = new Category_Shareholder_Tran();
        $atri->title ="Congress Shareholder";
        $atri->locale ="en";
        $atri->category_id ="1";
        $atri->status = 1;
        $atri->save();

        $atri = new Category_Shareholder_Tran();
        $atri->title ="Tin Dành Cho Cổ Đông";
        $atri->locale ="vi";
        $atri->category_id ="1";
        $atri->status = 1;
        $atri->save();

        $atri = new Category_Shareholder_Tran();
        $atri->title ="Shareholder News";
        $atri->locale ="en";
        $atri->category_id ="1";
        $atri->status = 1;
        $atri->save();

    }
}

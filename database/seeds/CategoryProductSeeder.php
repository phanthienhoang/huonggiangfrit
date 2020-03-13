<?php

use Illuminate\Database\Seeder;
use App\Category_product;
class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $atri = new Category_product();
        $atri->name ='FRIT TRONG';
        $atri->save();


        $atri = new Category_product();
        $atri->name ='FRIT ĐỤC';
        $atri->save();

        $atri = new Category_product();
        $atri->name ='FRIT BÁN ĐỤC';
        $atri->save();
        
        $atri = new Category_product();
        $atri->name ='FRIT MATT';
        $atri->save();

        
        $atri = new Category_product();
        $atri->name ='FRIT ĐIỀU CHỈNH';
        $atri->save();

        
        $atri = new Category_product();
        $atri->name ='FRIT TITAN';
        $atri->save();
    }
}

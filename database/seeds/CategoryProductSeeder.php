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
        $atri->save();

        $atri = new Category_product();
        $atri->save();

        $atri = new Category_product();
        $atri->save();
        
        $atri = new Category_product();
        $atri->save();
        
        $atri = new Category_product();
        $atri->save();
        
        $atri = new Category_product();
        $atri->save();
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Category_Shareholder;
class CateShareHolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $atri = new Category_Shareholder();
        $atri->save();

        $atri = new Category_Shareholder();
        $atri->save();
    }
}

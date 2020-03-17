<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(CategoryProductSeeder::class);
        $this->call(CategoryProductTransleteSeeder::class);
        $this->call(CateShareHolderSeeder::class);
        $this->call(CateShareHolderTransSeeder::class);

        
        // $this->call(NewTableSeeder::class);
        // $this->call(New_transTableSeeder::class);

 
        
    }
}

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

        // $this->call(Category_newTableSeeder::class);
        // $this->call(Category_new_transTableSeeder::class);
        // $this->call(NewTableSeeder::class);
        // $this->call(New_transTableSeeder::class);

        // $this->call(CategoryProductSeeder::class);

        // $this->call(CategoryProductTransleteSeeder::class);
        
    }
}

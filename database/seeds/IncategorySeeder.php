<?php

use Illuminate\Database\Seeder;

class IncategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new \App\Incategory();
        $category->name = 'salary';
        $category->save();
        $category = new \App\Incategory();
        $category->name = 'pay';
        $category->save();
    }
}

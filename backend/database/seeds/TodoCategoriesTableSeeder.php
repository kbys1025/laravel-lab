<?php

use Illuminate\Database\Seeder;
use App\TodoCategory;

class TodoCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoreis = array('プログラミング', '筋トレ', '家事', '買い物');
        foreach ($categoreis as $category) {
            $todo_category = new TodoCategory;
            $todo_category->name = $category;
            $todo_category->save();
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Todo;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $todo1 = new Todo;
        $todo1->user_id = 1;
        $todo1->todo_category_id = 1;
        $todo1->title = 'ToDo機能作成';
        $todo1->text = 'ToDoの新規登録・読み取り・更新・削除ができるシンプルな機能を作る。';
        $todo1->save();

        $todo2 = new Todo;
        $todo2->user_id = 1;
        $todo2->todo_category_id = 2;
        $todo2->title = '胸トレ';
        $todo2->text = 'プッシュアップバーを使った腕立て伏せを12回x3セット行う。';
        $todo2->save();
    }
}

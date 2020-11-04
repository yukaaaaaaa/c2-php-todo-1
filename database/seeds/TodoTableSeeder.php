<?php

use Illuminate\Database\Seeder;

class TodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * 
     */
    
    public function run()
    {
        for($i = 1; $i <= 10; $i++){
            DB::table('todos')->insert([
                'name' => "ユーザー$i",
                'email' => "hoge+$i@test.com",
                'password' => bcrypt('password'),
                
            ]);
        }

        for($i =1;$i<= 100; $i++){
            DB::table('todos')->insert([
                'user_id' => $this->createrUserIdByTaskId($i),
                'title' => "タスク$i",
                'due_date' => date('Y-m-d'),
                'status' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            ]);

        }
    }
}
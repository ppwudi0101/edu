<?php

use Illuminate\Database\Seeder;

class ProfessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //专业表
        DB::table('profession')->insert([
            [
                'profession_name'=>"PHP全栈工程师",
                'profession_desc'=>'高薪就业'
            ]
        ]);
    }
}

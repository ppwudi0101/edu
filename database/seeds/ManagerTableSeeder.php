<?php

use Illuminate\Database\Seeder;

class ManagerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //批量创建管理员数据
    	$faker= \Faker\Factory::create("zh_CN");
    	for($i=0;$i<50;$i++){
    		\Illuminate\Support\Facades\DB::table("manager")->insert([
    			"username"=>$faker->name,
    			"password"=>bcrypt("123456"),
    			"email"=>$faker->email,
    			"city"=>$faker->city,
    			"address"=>$faker->address,
    			"logo"=>$faker->imageUrl(),
    			"intro"=>$faker->catchPhrase,
    			"company"=>$faker->company,
    			"phone"=>$faker->phoneNumber,
    			"role_id"=>rand(1,3),
    		]);
    	}
    }
}

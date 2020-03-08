<?php

use Illuminate\Database\Seeder;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
         //批量创建用户数据
    	$faker= \Faker\Factory::create("zh_CN");
    	for($i=0;$i<50;$i++){
    		\Illuminate\Support\Facades\DB::table("member")->insert([
    			"username"=>$faker->name,
    			"password"=>bcrypt("123456"),
    			"email"=>$faker->email,
    			"city"=>$faker->city,
    			"address"=>$faker->address,
    			"logo"=>$faker->imageUrl(),
    			"intro"=>$faker->catchPhrase,
    			"company"=>$faker->company,
    			"phone"=>$faker->phoneNumber,
 
    		]);
    	}
    }
}

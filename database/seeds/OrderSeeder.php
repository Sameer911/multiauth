<?php

use Illuminate\Database\Seeder;
use App\DailyOrder;
use App\User;

use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 1; $i <= 10; $i++){
            $order = New DailyOrder;
            $order->order = random_int(1,10);
            $order->date = $faker->date;
            $order->city = $faker->city;
            $order->sender = $faker->name;
            $order->receiver = $faker->name;
            $order->father_name = $faker->name;
            $order->cnic = "000";
            $order->amount = "000";
            $order->status = "paid";
            $order->user_id = "1";
            $order->entry_date = $faker->date;
    
            $order->save();
        }
  
    }
}
        
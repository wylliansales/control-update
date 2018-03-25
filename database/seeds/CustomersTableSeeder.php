<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Customer::class,40)->create()->each(function ($c){
            $c->phones()->save(factory(App\Models\Phone::class,2)->make());
            $c->order()->save(factory(App\Models\Order::class)->make());
        });
    }
}

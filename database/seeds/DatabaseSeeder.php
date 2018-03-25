<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call(UsersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(UpdatesTableSeeder::class);

        for($i = 0; $i < 80; $i++){
            DB::table('update_history')->insert([
                'update_id'     => random_int(1,60),
                'order_id'      => random_int(1,40),
                'description'   => str_random(40),
                'device'        => str_random(12)
            ]);
        }
    }
}

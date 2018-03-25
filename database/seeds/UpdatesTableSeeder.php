<?php

use Illuminate\Database\Seeder;

class UpdatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Update::class,3)->create();
    }
}

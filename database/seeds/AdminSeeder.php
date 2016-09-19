<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->delete();
        DB::table('admin')->insert(array(
            array('password' => '98a3e81251d30860495fbab43e2d2cbd'),
        ));
    }
}

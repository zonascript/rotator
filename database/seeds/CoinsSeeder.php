<?php

use Illuminate\Database\Seeder;

class CoinsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coins')->delete();
        DB::table('coins')->insert(array(
            array('id' => '1','coin_name' => 'bitcoin','address' => '15VGEjmPjtDpGZ6g9qKB1QJMgcrZk2nUVh'),
            array('id' => '2','coin_name' => 'litecoin','address' => 'LM2XiXcUpv58V3axvbxfagnRM1hbRe8RZ5'),
            array('id' => '3','coin_name' => 'dogecoin','address' => 'DTyiU6QzVByAakVgwvz84PtVP4cKiDae5T'),
            array('id' => '4','coin_name' => 'peercoin','address' => 'PHU7PKYDDXUVUudkS3rLDZ2RfpmdufXzUM'),
            array('id' => '5','coin_name' => 'primecoin','address' => ''),
            array('id' => '6','coin_name' => 'dash','address' => '')
        ));
    }
}

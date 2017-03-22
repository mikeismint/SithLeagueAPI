<?php

use Illuminate\Database\Seeder;

class SeasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('seasons')->delete();

      $seasons = array(
        ['name' => 'q4-2016', 'start_date' => new DateTime('2016-10-17'), 'end_date' => new DateTime('2016-12-31'), 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ['name' => 'q1-2017', 'start_date' => new DateTime('2017-01-31'), 'end_date' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime]
      );

      DB::table('seasons')->insert($seasons);
    }
}

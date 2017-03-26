<?php

use Illuminate\Database\Seeder;

class DivisionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('divisions')->delete();

      $divisions = array(
        ['id' => 1, 'name' => 'The Great Hunt', 'slug' => 'The-Great-Hunt', 'position' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ['id' => 2, 'name' => 'The Hive', 'slug' => 'The-Hive', 'position' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ['id' => 3, 'name' => 'Scum and Villany', 'slug' => 'Scum-and-Villany', 'position' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
      );

      DB::table('divisions')->insert($divisions);
    }
}

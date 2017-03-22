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
      $this->call('SeasonsTableSeeder');
      $this->call('DivisionsTableSeeder');
      $this->call('PlayersTableSeeder');
    }
}

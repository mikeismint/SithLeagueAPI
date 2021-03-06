<?php

use Illuminate\Database\Seeder;

class ResultsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  public function run() {
    DB::table('results')->delete();

    $results = array(
      ['player_id' => 1, 'season_id' => 1, 'division_id' => 2,
      'win' => 2, 'loss' => 0, 'mov' => 350, 'points' => 4,
      'created_at' => new DateTime, 'updated_at' => new DateTime],
      
      ['player_id' => 1, 'season_id' => 2, 'division_id' => 1,
      'win' => 1, 'loss' => 1, 'mov' => 150, 'points' => 5,
      'created_at' => new DateTime, 'updated_at' => new DateTime],
      
      ['player_id' => 2, 'season_id' => 2, 'division_id' => 1,
      'win' => 0, 'loss' => 2, 'mov' => 86, 'points' => 2,
      'created_at' => new DateTime, 'updated_at' => new DateTime],
     
      ['player_id' => 3, 'season_id' => 2, 'division_id' => 1,
      'win' => 2, 'loss' => 0, 'mov' => 310, 'points' => 8,
      'created_at' => new DateTime, 'updated_at' => new DateTime],
    
      ['player_id' => 4, 'season_id' => 2, 'division_id' => 1,
      'win' => 1, 'loss' => 1, 'mov' => 174, 'points' => 5,
      'created_at' => new DateTime, 'updated_at' => new DateTime],
   
      ['player_id' => 5, 'season_id' => 2, 'division_id' => 1,
      'win' => 1, 'loss' => 1, 'mov' => 220, 'points' => 5,
      'created_at' => new DateTime, 'updated_at' => new DateTime],
    );

    DB::table('results')->insert($results);
  }

}

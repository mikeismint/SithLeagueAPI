<?php

use Illuminate\Database\Seeder;

class MatchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
      DB::table('matches')->delete();

      $matches = array(
        [ 'date_played' => new DateTime('2017-03-01'), 'season_played' => 2,
        'player_one_id' => 1, 'player_one_score' => 100,
        'player_two_id' => 2, 'player_two_score' => 50,
        'created_at' => new DateTime, 'updated_at' => new DateTime],

        [ 'date_played' => new DateTime('2017-03-01'), 'season_played' => 2,
        'player_one_id' => 2, 'player_one_score' => 36,
        'player_two_id' => 3, 'player_two_score' => 100,
        'created_at' => new DateTime, 'updated_at' => new DateTime],
        
        [ 'date_played' => new DateTime('2017-03-01'), 'season_played' => 2,
        'player_one_id' => 3, 'player_one_score' => 82,
        'player_two_id' => 4, 'player_two_score' => 36,
        'created_at' => new DateTime, 'updated_at' => new DateTime],

        [ 'date_played' => new DateTime('2017-03-01'), 'season_played' => 2,
        'player_one_id' => 4, 'player_one_score' => 100,
        'player_two_id' => 5, 'player_two_score' => 80,
        'created_at' => new DateTime, 'updated_at' => new DateTime],
      
        [ 'date_played' => new DateTime('2017-03-01'), 'season_played' => 2,
        'player_one_id' => 5, 'player_one_score' => 100,
        'player_two_id' => 1, 'player_two_score' => 0,
        'created_at' => new DateTime, 'updated_at' => new DateTime]

      );

      DB::table('matches')->insert($matches);
    }
}

<?php

use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('players')->delete();

      $players = array(
        ['name' => 'Bob Dee', 'slug' => 'Bob-Dee', 'division_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ['name' => 'Colm Browne', 'slug' => 'Colm-Browne', 'division_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ['name' => 'Tom Reed', 'slug' => 'Tom-Reed', 'division_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ['name' => 'Tim King', 'slug' => 'Tim-King', 'division_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ['name' => 'Harrison Daly', 'slug' => 'Harrison-Daly', 'division_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],

        ['name' => 'Andy Sykes', 'slug' => 'Andy-Sykes', 'division_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ['name' => 'Jacob Kalnins', 'slug' => 'Jacob-Kalnins', 'division_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ['name' => 'Dan Sellen', 'slug' => 'Dan-Sellen', 'division_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ['name' => 'Steve Thorley', 'slug' => 'Steve-thorley', 'division_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ['name' => 'Dan Slobodian', 'slug' => 'Dan-Solbodian', 'division_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
      
        ['name' => 'Glenn Coulthard', 'slug' => 'Glenn-Coulthard', 'division_id' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ['name' => 'Jack Mooney', 'slug' => 'Jack-Mooney', 'division_id' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ['name' => 'Barney Scott', 'slug' => 'Barney-Scott', 'division_id' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ['name' => 'Mike Wilson', 'slug' => 'Mike-wilson', 'division_id' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ['name' => 'Seb Brady', 'slug' => 'Seb-Brady', 'division_id' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
      );

      DB::table('players')->insert($players);
    }
}

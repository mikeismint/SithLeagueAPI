<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model {

  protected $guarded = [];

  /*
   * Define many-to-one realtionship
   */
  public function division() {
    return $this->belongsTo('App\Division');
  }

  /*
   * Define One-To-Many relationship
   */
  public function results() {
    return $this->hasMany('App\Result');
  }

  /*
   * Define Many-To-Many relationship with App\Match
   */
  //TODO: Change function to be compatible with Eloquent relationship queries
  public function hasmatches() {
    return Match::where('player_one_id', '=', $this->id)
      ->orWhere('player_two_id', '=', $this->id)
      ->get();
  }

  /*
   * Use slug as URL
   */
  public function getRouteKeyName() {
    return 'slug';
  }
}

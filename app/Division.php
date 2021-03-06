<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
  protected $guarded = [];

  /*
   * Define One-to-Many relationship with App\Player
   */
  public function players() {
    return $this->hasMany('App\Player');
  }

  /*
   * Define One-to-Many relationship with App\Match
   */
  public function matches() {
    return $this->hasMany('App\Match');
  }

  /*
   * Define One-to-Many relationship with App\Result
   */
  public function results() {
    return $this->hasMany('App\Result');
  }

  /*
   * Use slug as URL instead of id
   */
  public function getRouteKeyName() {
    return 'slug';
  }
}

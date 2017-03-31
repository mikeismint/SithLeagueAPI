<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
  protected $guarded = [];

  /*
   * Define One-To-Many relationship
   */
  public function results() {
    return $this->hasMany('App\Result');
  }

  /**
   * Define One-To-Many relationships with App\Match
   */
  public function matches() {
    return $this->hasMany('App\Match');
  }
}

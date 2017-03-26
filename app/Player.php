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
   * Use slug as URL
   */
  public function getRouteKeyName() {
    return 'slug';
  }
}

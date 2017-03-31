<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model {

  protected $guarded = [];

  public function addWin($mov) {
    $this->win++;
    $mov += 100; $this->mov += $mov;
    $this->points += 4;
    $this->save();
  }

  public function removeWin($mov) {
    $this->win--;
    $mov += 100; $this->mov -= $mov;
    $this->points -= 4;
    $this->save();
  }

  public function addLoss($mov) {
    $this->loss++;
    $mov = 100 - $mov;
    $this->mov = $this->mov + $mov;
    $this->points += 1;
    $this->save();
  }

  public function removeLoss($mov) {
    $this->loss--;
    $mov = 100 - $mov;
    $this->mov = $this->mov - $mov;
    $this->points -= 1;
    $this->save();
  }

  /*
   * Define Many-To-One relationship
   */
  public function player() {
    return $this->belongsTo('App\Player');
  }

  /*
   * Define Many-To-One relationship
   */
  public function division() {
    return $this->belongsTo('App\Division');
  }

  /*
   * Define Many-To-One relationship
   */
  public function season() {
    return $this->belongsTo('App\Season');
  }

}

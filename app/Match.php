<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Match extends Model {

  protected $guarded =[];

    /**
     * Create a new instance of Match. Overloads parent method.
     *
     * Updates player result records through Player->hasMany relationship.
     * Will create a new Result record if a matching one is not found.
     *
     * @param request array of attributes to set
     * @return \App\Match
     */
  public static function create(array $request = []) {

    /**
     * Calling parent::create doesn't work in Laravel 5.4
     * https://github.com/laravel/framework/issues/17876
     * $match = parent::create($request);
     */
    $match = static::query()->create($request);

    if($match->player_one_score > $match->player_two_score) {
      $winner = $match->playerOne;
      $loser = $match->playerTwo;
      $mov = $match->player_one_score - $match->player_two_score;
    } else {
      $winner = $match->playerTwo;
      $loser = $match->playerOne;
      $mov = $match->player_two_score - $match->player_one_score;
    }

    if(is_null($winner->results->where('season_id', $match->season_id)->first())) {
      $winner->results()->create([
        'player_id' => $winner->id,
        'division_id' => $match->division->id,
        'season_id' => $match->season->id
      ])->addWin($mov);
    } else {
      $winner->results->where('season_id', $match->season->id)->first()
        ->addWin($mov);
    }

    if(is_null($loser->results->where('season_id', $match->season_id)->first())) {
      $loser->results()->create([
        'player_id' => $loser->id,
        'division_id' => $match->division->id,
        'season_id' => $match->season->id
      ])->addLoss($mov);
    } else {
      $loser->results->where('season_id', $match->season->id)->first()
        ->addLoss($mov);
    }

    return $match;
  }

    /**
     * Removes this object from the database
     *
     * Removes the results of the match from each players results.
     *
     * @return bool | null
     */
  public function delete() {

    //TODO: Move reapeated code to spererate method
    if($this->player_one_score > $this->player_two_score) {
      $winner = $this->playerOne;
      $loser = $this->playerTwo;
      $mov = $this->player_one_score - $this->player_two_score;
    } else {
      $winner = $this->playerTwo;
      $loser = $this->playerOne;
      $mov = $this->player_two_score - $this->player_one_score;
    }

    $winner->results->where('season_id', $this->season->id)->first()
      ->removeWin($mov);

    $loser->results->where('season_id', $this->season->id)->first()
      ->removeLoss($mov);

    return parent::delete();
  }

  /**
   * Define Many-To-One relationship with $this->playerOne (App\Player)
   */
  public function playerOne() {
    return $this->belongsTo('App\Player', 'player_one_id');
  }

  /**
   * Define Many-To-One relationship with $this->playerTwo (App\Player)
   */
  public function playerTwo() {
    return $this->belongsTo('App\Player', 'player_two_id');
  }

  /**
   * Define Many-To-One relationship with App\Season
   */
  public function season() {
    return $this->belongsTo('App\Season');
  }

  /**
   * Define Many-To-One relationship with App\Division
   */
  public function division() {
    return $this->belongsTo('App\Division');
  }

}

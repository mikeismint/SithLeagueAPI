<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Division;
use App\Player;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * Lists all players with api\players
     * Lists players by division with api\division\{division}\players
     *
     * @return \Illuminate\Http\JsonResponse
     */
  public function index(Division $division) {
    try {
      if(isset($division->id)) {
        $response['players'] = Player::where('division_id', $division->id)->get();
      } else {
        $response['players'] = Player::with('division')->get();
      }
      $status = 200;

    } catch(Exception $e) {
      $response['message'] = $e->getMessage();
      $status = 400;

    } finally {
      return new JsonResponse($response, $status);
    }
  }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse returns newly created player object
     */
  public function store(Request $request) {

    try {
      $response['player'] = Player::create($request->all());
      if(!isset($response['player']->slug)) {
        $response['player']->slug = str_slug($response['player']->name, '-');
      }
      $status = 200;

    } catch(Exception $e) {
      $response['message'] = $e->getMessage();
      $status = 400;

    } finally {
      return new JsonResponse($response, $status);
    }
  }

    /**
     * Display the specified resource.
     *
     * Resolves links to App\Division, App\Results and App\Match
     *
     * @param  \App\Player    $player
     * @param  \App\Division  $division
     * @return \Illuminate\Http\JsonResponse
     */
  public function show(Division $division, Player $player){
    if(!isset($division->id) || $player->division_id == $division->id) {
      $response['player'] = $player;
      $response['player']['division'] = $player->division;
      $response['player']['matches'] = $player->hasmatches();
      $response['player']['results'] = $player->results;

      $status = 200;
    } else {
      $response['message'] = "Player " . $player->name . " is not in division " . $division->name;
      $status = 400;
    }

    return new JsonResponse($response, $status);
  }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Player    $player
     * @param  \App\Division    $division
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse returns updated player object
     */
  public function update(Request $request, Division $division, Player $player) {
    try {
      $update = $request->all();

      foreach($update as $key => $value) {
        $player[$key] = $value;
      }

      $response['updated'] = $player->save();
      $response['player'] = $player;
      $status = 200;

    } catch(Exception $e) {
      $response['message'] = $e->getMessage();
      $status = 400;

    } finally {
      return new JsonResponse($response, $status);
    }
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Player    $player
     * @param  \App\Division  $division
     * @return \Illuminate\Http\JsonResponse
     */
  public function destroy(Division $division, Player $player) {
    try {
      if(!isset($division->id) || $player->division_id == $division->id) {
        $response['deleted'] = $player->delete();
        $status = 204;

      } else {
        $response['message'] = "Player " . $player->name . " is not in division " . $division->name;
        $status = 400;
      }

    } catch(Exception $e) {
      $response['message'] = $e->getMessage();
      $status = 400;

    } finally {
      return new JsonResponse($response, $status);
    }
  }
}

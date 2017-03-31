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
     * @return \Illuminate\Http\JsonResponse
     */
  public function index(Division $division) {
    try {
      $response['Players'] = Player::where('division_id', '=', $division->id)->get();
      $status = 200;

    } catch(Exception $e) {
      $response = $e->getMessage();
      $status = 400;

    } finally {
      return new JsonResponse($response, $status);
    }
  }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
  public function store(Request $request) {

    try {
      $response = Player::create($request->all());
      $status = 200;

    } catch(Exception $e) {
      $response = $e->getMessage();
      $status = 400;

    } finally {
      return new JsonResponse($response, $status);
    }
  }

    /**
     * Display the specified resource.
     *
     * @param  \App\Player    $player
     * @param  \App\Division  $division
     * @return \Illuminate\Http\JsonResponse
     */
  public function show(Division $division, Player $player){
    if($player->division_id == $division->id) {
      $response['player'] = $player;
      $response['player']['division'] = $player->division;
      $response['player']['matches'] = $player->hasmatches();

      $status = 200;
    } else {
      $response = "Player " . $player->name . " is not in division " . $division->name;
      $status = 400;
    }

    return new JsonResponse($response, $status);
  }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Player    $player
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
  public function update(Request $request, Division $division, Player $player) {
    try {
      $update = $request->all();

      foreach($update as $key => $value) {
        $player[$key] = $value;
      }

      $player->save();

      $response = $player;
      $status = 200;

    } catch(Exception $e) {
      $response = $e->getMessage();
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
      if($player->division_id == $division->id) {
        $response = $player->delete(); 
        $status = 204;

      } else {
        $response = "Player " . $player->name . " is not in division " . $division->name;
        $status = 400;
      }

    } catch(Exception $e) {
      $response = $e->getMessage();
      $status = 400;

    } finally {
      return new JsonResponse($response, $status);
    }
  }
}

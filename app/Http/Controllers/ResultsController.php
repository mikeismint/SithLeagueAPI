<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Result;
use App\Player;
use App\Division;

class ResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Division App\Division
     * @param Player   App\Player
     * @return \Illuminate\Http\JsonResponse
     */
  public function index(Division $division, Player $player = null) {
    try {
      if(isset($player->id)) {
        $response['results'] = Result::where('player_id', '=', $player->id)->get();
      } else {
        $response['results'] = Result::where('division_id', '=', $division->id)->get();
      }

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
     * @param  \App\Result  $result
     * @return \Illuminate\Http\JsonResponse
     */
  public function show(Division $division, Player $player, Result $result) {
    try {
      $response['results'] = $result;
      $response['results']['player'] = $result->player;
      $response['results']['division'] = $result->division;
      $response['results']['season'] = $result->season;

      $status = 200;
    } catch(Exception $e) {
      $response = $e->getMessage();
      $status = 400;
    } finally {
      return new JsonResponse($response, $status);
    }
  }
}

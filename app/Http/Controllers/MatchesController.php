<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Match;

class MatchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function index() {
    try {
      $response['matches'] = Match::with('playerOne', 'playerTwo')->get();
      $status = 200;

    } catch(Exception $e) {
      $response['error'] = $e->getMessage();
      $status = 400;

    } finally {
      return new JsonResponse($response, $status);
    }
  }

    /**
     * Store a newly created App\Match resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
  public function store(Request $request) {
    try {
      $response['match'] = Match::create($request->all());
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
     * @param  \App\Match   $match
     * @return \Illuminate\Http\JsonResponse
     */
  public function show(Match $match) {
    try {
      $response['match'] = $match;
      $response['match']['division'] = $match->division;
      $response['match']['season'] = $match->season;
      $response['match']['player_one'] = $match->playerOne;
      $response['match']['player_two'] = $match->playerTwo;
      $status = 200;

    } catch(Exception $e) {
      $response = $e->getMessage();
      $status = 400;

    } finally {
      return new JsonResponse($response, $status);
    }

  }

    /**
     * Update the specified resource in storage.
     *
     * Deletes the original match and stores a new match
     * combining the original properties combined with the updates
     *
     * @param  \App\Match $match
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
  public function update(Request $request, Match $match) {
    try {
      $update = $request->all();

      // Copy $match properties to an array
      $storeMatch = $match->toArray();
      // Unset attributes which should be auto completed
      unset($storeMatch['id']);
      unset($storeMatch['created_at']);
      unset($storeMatch['updated_at']);

      // Update copied match properties
      foreach($update as $key => $value) {
        $storeMatch[$key] = $value;
      }

      // Insert new match
      $response['match'] = Match::create($storeMatch);

      // Remove original match
      $response['originalRemoved'] = $match->delete();
      $status = 200;

    } catch(Exception $e) {
      $response['error'] = $e->getMessage();
      $status = 400;
    } finally {
      return new JsonResponse($response, $status);
    }
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function destroy(Match $match) {
    try {
      $response = $match->delete();
      $status= 200;
    } catch(Exception $e) {
      $response = $e->getMessage();
      $response = 400;
    } finally {
      return new JsonResponse($response, $status);
    }
  }
}

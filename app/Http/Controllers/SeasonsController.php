<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Season;

class SeasonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function index() {

    try {
      $response['seasons'] = Season::all();
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
     * @return \Illuminate\Http\Response
     */
  public function store(Request $request){
    try {
      $response = Season::create($request->all());
      $status = 200;

    } catch (Exception $e) {
      $response = $e->getMessage();
      $status = 400;

    } finally {
      return new JsonResponse($response, $status);
    }
  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function show(Season $season) {
    $response['season'] = $season;
    return new JsonResponse($response, 200);
  }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Season   $season
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  public function update(Request $request, Season $season) {
    try {
      $update = $request->all();

      foreach($update as $key => $value) {
        $season[$key] = $value;
    }

    $season->save();

    $response = $season;
    $status = 200;

    } catch (Exception $e) {
      $response = $e->getMessage();
      $status = 400;

    } finally {
      return new JsonResponse($response, $status);
    }
  }
    /**
     * Remove the specified resource from storage.
     *
     * @param  Season   $season
     * @return \Illuminate\Http\Response
     */
  public function destroy(Season $season) {
    try {
      $season->delete();
      $response = null;
      $status = 204;

    } catch(Exception $e) {
      $response = $e->getMessage();
      $status = 400;

    } finally {
      return new JsonResponse($response, $status);
    }
  }
}

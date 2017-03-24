<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Division;

class DivisionsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function index() {
  
    try {
      $response['divisions'] = Division::all();
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
      $response = Division::create($request->all());
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
   * @param  \App\Division  $division
   * @return \Illuminate\Http\JsonResponse
   */
  public function show(Division $division) {
    $response['division'] = $division;

    return new JsonResponse($response, 200);
  }


  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Division  $division
   * @return \Illuminate\Http\JsonResponse
   */
  public function update(Request $request, Division $division) {
    try {
      $update = $request->all();

      foreach($update as $key => $value) {
        $division[$key] = $value;
      }

      $division->save();

      $response = $division;
      $status = 200;

    } catch(Exception $e) {
      $response = $e->getMessage();
      $status= 400;

    } finally {
      return new JsonResponse($response, $status);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Division  $division
   * @return \Illuminate\Http\JsonResponse
   */
  public function destroy(Division $division) {
    try {
      $division->delete();
      $response = null;
      $status = 204;
    }

    catch(Exception $e) {
      $response = $e->getMessage();
      $status = 400;
    }

    finally {
      return new JsonResponse($response, $status);
    }
  }
}

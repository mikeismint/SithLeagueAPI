<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('seasons', 'SeasonsController',
  ['except' => ['create', 'edit']]
);

Route::resource('divisions', 'DivisionsController',
  ['except' => ['create', 'edit']]
);

Route::resource('matches', 'MatchesController',
  ['except' => ['create', 'edit']]
);

Route::resource('divisions.seasons.results', 'ResultsController',
  ['except' => ['create', 'edit', 'store', 'update', 'destroy']]
);

Route::resource('divisions.players', 'PlayersController',
  ['except' => ['create', 'edit']]
);

Route::resource('divisions.players.results', 'ResultsController',
  ['except' => ['create', 'edit', 'store', 'update', 'destroy']]
);

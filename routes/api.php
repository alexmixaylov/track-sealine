<?php

use App\Modules\Common\Dto\ProviderDto;
use App\Modules\Common\ProviderHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/track', function (Request $request) {

    $provider = new ProviderDto($request->get('provider'), $request->post('container'));

    $handler = new ProviderHandler($provider);

    return response($handler->handle())->header('Content-Type', 'text/json');
});

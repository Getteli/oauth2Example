<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Address;

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

// ex de rota para pegar dados de um usuario, dentro da url: link.com/api/...
Route::middleware('auth:api')->get('/address', function (Request $request) {
  // o laravel consegue pegar pelo usuario ja logado (passando o access token pelo header
  // com Authorization = Bearer {access token})
  // entao vai retornar o array com os dados do usuario
    return Address::where('user_id', auth()->user()->id)->first();
    // return "ta aqui??";
});

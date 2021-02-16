<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('prepare-to-login', function () {
  // vai simular um cliente autorizando o client a acessar os seus dados:
  // guarda uma chave que vai confirmar a transacao
  $state = Str::random(40);

  // guarda o codigo state para verificar depois
  session([
    'state' => $state,
  ]);

  // cria uma query
  $query = http_build_query([
    'client_id' => env('CLIENT_ID'), // o id do client no nosso servidor
    'redirect_url' => env('REDIRECT_URL'), // a url q vai voltar
    'response_type' => 'code', // o tipo
    'scope' => '', // scope
    'state' => $state // a chave da transacao
  ]);

  // vai redirecionar para a url de login pelo oauth, criado pelo passport
  return redirect("http://localhost:8000/oauth/authorize?".$query);

})->name("prepare.login");

Route::get('callback', function (Request $request) {
  // ve o retorno do callback
  // dd($request->all());
  // faz a logica de retorno para autorizar o client a pegar os dados do usuario, agora com a chave Authorization Code

  // faz o acesso a url da api no caminho oauth/token, q é o caminho para pegar o access token
  $response = Http::post("http://192.168.1.40:3030/oauth/token", [
    'grant_type' => 'authorization_code',
    'client_id' => 3,
    'client_secret' => "HrdgTrDfNLJ30SerNnMJPIrw70UFXIEJZYqoIDus",
    'redirect_url' => "http://192.168.1.40:8001/callback",
    'code' => $request->code,
  ]);

  // ve o retorno depois de pedir a API, agora com o access token
  dd($response->json());
  // agora pega o access token q veio pelo response.
  // guarda no banco ?.. nao sei..
});

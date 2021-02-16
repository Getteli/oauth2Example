<?php

// exibe os erros do PHP, caso no init não esteja para exibir os erros
ini_set( 'error_reporting', E_ALL );
ini_set( 'display_errors', true );

$curl = curl_init();

curl_setopt_array($curl, array(
  // endpoint que pega o dado
  CURLOPT_URL => "http://127.0.0.1:8000/api/address",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_CUSTOMREQUEST => "GET",
  // passa o access token
  CURLOPT_HTTPHEADER => array(
    "Authorization:Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIzIiwianRpIjoiYTY3ZThjM2IyNDdlNzMzYjI0ZGE2OTIxNTI4ZGJjYWMyNTJjY2Y0ODJmMTA4NjhiYTA5YjE5MDQyNzQzNzM0MmNiYWU0ZTUxYmFhYjYzOTAiLCJpYXQiOiIxNjEyOTIyMzE0Ljc2Njc4OSIsIm5iZiI6IjE2MTI5MjIzMTQuNzY2Nzk4IiwiZXhwIjoiMTY0NDQ1ODMxMy45MTk3MTUiLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.o6Vko4CQpr5ekVoO3mDfe61aA00U5wh7FBhz-elvB02oP0uPNQGCX0nNlFVsnWJ0Q3kWMmUoyG57OFNcVibWHMm3JvC0RL6GhHLsvw3ZYz3KByIc_I-jLOgVrtlT3TEgIgtmI0kl8dLTjk-eRJI8HeenDSmjneOK4DB67noxunkoUGshlEMO-gxsMBplyCtGaOBm50XGXHHYzEETSud2wgPkJ71VTe-VKDzUbh8uQ3cUkHB7Mwub24NDx0x0yT7lCfaahkyrBDIaMl3KJyecgrHD4vDtdXUOv1r9K0zRm1a1CY5TzpQxNg22tEM29lPY2dRDkyj5YHI2ZXXQfOWnccxZN_PTrvvksJZeI3inbN8IaJx_kAaE3sLsYbJYnD_ZceZe2CDlMXhtrgTTlpO_tPesXRp3pVLIlTkpq8IOs0umTwD0ZETzgK4oAbSVXXfhFB99jtQ0E4nkXnee1Tpc-HSb3NJn_iFZ4_bpQ_PCfVjHKh5PIlEPeMFiYrkEXVrrTVpoyoRVPM1RhNHKDYF5uXO2TwJ4soll20TU0iLnj-2YZACyydav34w_I6E9ExZc_gm_45TnA3VSYgEPbxu8SXV_3HiLtd0-VJ4sf9iAIr-5aV5K6TTkree4_IU1Qcc8lq1DsmuhL1TxJq0MAiWprtVjIDK4HVXmvyWQwCVMORs",
    "Content-Type: application/x-www-form-urlencoded"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
	echo $response;
}
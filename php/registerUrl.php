<?php

    //header("Content-Type: application/json");
    $consumerKey = 'uekF8JGAozTTiDwi5FAmepkHYzHBibkg'; 
	$consumerSecret = '3UyNAMqpxzFO7elS';
	$headers = ['Content-Type:application/json; charset=utf8'];

	$url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($curl, CURLOPT_HEADER, FALSE);
	curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);
	$result = curl_exec($curl);
	$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	$result = json_decode($result);

	$access_token = $result->access_token;

	echo "access token = ".$access_token.'\n';
	
	curl_close($curl);

    $ch = curl_init('https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer '.$access_token,
        'Content-Type: application/json'
    ]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, '{
        "ShortCode": 600989,
        "ResponseType": "Completed",
        "ConfirmationURL": "https://rhon.co.ke/confirm.php",
        "ValidationURL": "https://rhon.co.ke/valid.php"
    }');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response  = curl_exec($ch);
    curl_close($ch);

    echo $response;

?>
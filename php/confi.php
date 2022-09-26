<?php
    header("Content-Type: application/json");

    $response = '{
        "ResultCode": 0, 
        "ResultDesc": "Confirmation Received Successfully"
    }';

     // DATA
    $mpesaResponse = file_get_contents('php://input');

    // log the response
    $logFile = "M_PESAConfirmationResponse.json";

    // write to file
    $log = fopen($logFile, "w");
    //var_dump($_POST['array']);
    fwrite($log, $mpesaResponse);
    fclose($log);

    $data = json_decode($mpesaResponse);

    echo $response;
    
    
?>
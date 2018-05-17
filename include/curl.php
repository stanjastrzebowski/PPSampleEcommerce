<?php

function curl_call_api($endpoint, $payload, $access_token_ready)
    {
        global $client;
        global $secret;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_POST, 1);
        // remove this option for production use as this is making the connection insecure
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $headers = array();

        if ($access_token_ready == "") {
            curl_setopt($ch, CURLOPT_USERPWD, $client . ":" . $secret);

            $headers[] = "Accept: application/json";
            $headers[] = "Accept-Language: en_US";
            $headers[] = "Content-Type: application/x-www-form-urlencoded";
        
        } else {

            $headers[] = "Content-Type: application/json";
            $headers[] = "Authorization: Bearer ".$access_token_ready;
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        //print_r($result);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
            curl_close ($ch);
            exit(1);
        }
        
        curl_close ($ch);

        $res = "";

        try {
            $res = json_decode($result, true);
        } catch (Exception $e) {
            throw new Exception('HipShop: ' .$e->getMessage());
        }
        
        return $res;
    }

?>
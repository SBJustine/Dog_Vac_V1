<?php

class Textbee{

    public function sendMessage($numbers,$message){

        $BASE_URL = 'https://api.textbee.dev/api/v1';
        $API_KEY = '83846e35-6abc-44bc-af98-8715b0bc5436';
        $DEVICE_ID = '6603d458cd9c707875ac2d74';

        $receivers = $numbers;
        $smsBody = $message ;

$url = $BASE_URL . "/gateway/devices/{$DEVICE_ID}/sendSMS?apiKey={$API_KEY}";

$data = [
    'receivers' => $receivers,
    'smsBody' => $smsBody
];

$data_string = json_encode($data);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string))
);

$result = curl_exec($ch);

curl_close($ch);

return $result;


    }
}

?>

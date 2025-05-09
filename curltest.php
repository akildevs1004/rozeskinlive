<?php



$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://aquhrsys.alqasimia.ac.ae/HRENDPointAtt/api/login',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => '{

  "userName": "attendanceuser",

  "password": "AQU@Password123",

  "key": "7112484a-e08b-11ea-87d0-0242ac130003"

}',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Cookie: NotYourIssue=1047016108.20480.0000; TS01a4805b=01bb5a9646200ec1b33db635ccd762fc3458629787452b9139a5f230e228ddc9603eb1164f155510dc56743cad818972cecc1ddc653f1ea3584961fb41c0ae548cd74a32b9; TS6e037783029=080e82acd2ab280065c39fdad955f143c18c978f1b2d181e9008c9ec85657507e80021a224d4cfdb68cdfa003e972eee'
    ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

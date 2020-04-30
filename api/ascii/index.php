<?php

$_SERVER['SERVER_PORT'] = 23456;

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    exit('API running on port '.$_SERVER['SERVER_PORT']);
}

function str_rot($message, $shift) {
    $min_ALPHA = 65;
    $max_ALPHA = 91;
    $min_alpha = 97;
    $max_alpha = 123;
    $finalString = '';
    $currentString = str_split($message);

    foreach ($currentString as $letter) {
        $currentLetter = ord($letter);
        // ord() returns the ASCII value of the first character of a string
        $value = $currentLetter + $shift;

        if(ctype_upper($currentLetter)){
            if ($value >= $max_ALPHA) {
                $value -= $max_ALPHA;
            }
    
            if ($value <= $min_ALPHA) {
                $value += $min_ALPHA;
            }
        } else {
        if ($value >= $max_alpha) {
            $value -= $max_alpha;
        }

        if ($value <= $min_alpha) {
            $value += $min_alpha;
        }
    }
        if ($currentLetter === 32){
            $currentLetter = 32;
        } else {
        $currentLetter = $value;
        };
        $finalString .= chr($currentLetter);
        // chr() converts ASCII value to character
    }
    return $finalString;
}

    if ($_SERVER["CONTENT_TYPE"] != 'application/json') {
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
        exit();
    }

    $content = trim(file_get_contents('php://input'));
    $decoded = json_decode($content, true);
    $decodedShift = $decoded['Shift'];
    $decodedMessage = $decoded['Message'];
    if ($decodedShift && $decodedMessage && is_int($decodedShift) && is_string($decodedMessage)){
        $data = str_rot($decodedMessage, $decodedShift);
        $newFile = fopen("code".uniqid().".txt", "w");
        $textContent = json_encode($data);
        fwrite($newFile, str_replace('"', '', $textContent));
    } else {
        http_response_code(500);
        exit();
    }

    header('Content-Type: application/json');
    $array = array('EncodedMessage' => $data);
    echo json_encode($array);

<?php

$_SERVER['SERVER_PORT'] = 23456;

function str_rot($message, $shift = 13) {
    static $letters = 'AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz';
    $shift = (int)$shift % 26;
    if (!$shift) return $message;
    if ($shift < 0) $shift += 26;
    if ($shift == 13) return str_rot13($message);
    $rep = substr($letters, $shift * 2) . substr($letters, 0, $shift * 2);
    return strtr($message, $letters, $rep);
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
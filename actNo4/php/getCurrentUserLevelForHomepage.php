<?php
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $xml = simplexml_load_file('../users.xml');
    if ($xml === false) {
        http_response_code(500); 
        exit('Error: Unable to load user data');
    }

    $userNode = $xml->xpath("//user[username='$username']")[0];
    if (!$userNode) {
        // User not found
        http_response_code(404); 
        exit('Error: User not found');
    }

    $currentLevel = isset($userNode->currentLevel) ? (string)$userNode->currentLevel : "N/A";

    $levelNumber = preg_replace('/[^0-9]/', '', $currentLevel);

    header('Content-Type: application/json');
    echo json_encode(['currentLevel' => $levelNumber, 'username' => $username]);
} else {
    http_response_code(401); 
    exit('Error: User not authenticated');
}
?>

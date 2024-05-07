<?php
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $userData = [];

    $xml = simplexml_load_file('../users.xml');
    if ($xml === false) {
        http_response_code(500); 
        exit('Error: Unable to load user data');
    }

    $userNode = $xml->xpath("//user[username='$username']")[0];
    if (!$userNode) {
        http_response_code(404);
        exit('Error: User not found');
    }

    $userData['username'] = (string) $userNode->username;
    $userData['email'] = (string) $userNode->email;
    $userData['password'] = (string) $userNode->password; 

    if (isset($userNode->currentLevel)) {
        $userData['currentLevel'] = (string) $userNode->currentLevel;
    } else {
        $userData['currentLevel'] = "N/A";
    }

    if (isset($userNode->longerTimeLeft)) {
        $userData['longerTimeLeft'] = (string) $userNode->longerTimeLeft;
    } else {
        $userData['longerTimeLeft'] = "N/A";
    }

    header('Content-Type: application/json');
    echo json_encode($userData);
} else {
    http_response_code(401); 
    exit('Error: User not authenticated');
}
?>


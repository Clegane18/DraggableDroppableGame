<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $postData = file_get_contents("php://input");
    $postData = json_decode($postData, true);

    if (!isset($postData['newUsername']) || !isset($postData['newEmail']) || !isset($postData['newPassword'])) {
        http_response_code(400); 
        exit('Error: Invalid request data');
    }

    $newUsername = $postData['newUsername'];
    $newEmail = $postData['newEmail'];
    $newPassword = $postData['newPassword'];

    $xml = simplexml_load_file("../users.xml");
    if ($xml === false) {
        http_response_code(500); 
        exit('Error: Unable to load user data');
    }

    $sessionUsername = $_SESSION['username'];
    $userNode = $xml->xpath("//user[username='{$sessionUsername}']")[0];
    if (!$userNode) {
        http_response_code(404); 
        exit('Error: User not found');
    }

    if (!empty($newUsername)) {
        $userNode->username = $newUsername;
        $_SESSION['username'] = $newUsername; 
    }
    if (!empty($newEmail)) {
        $userNode->email = $newEmail;
    }
    if (!empty($newPassword)) {
        $userNode->password = $newPassword;
    }

    if ($xml->asXML("../users.xml")) {
        echo "User information updated successfully.";
    } else {
        http_response_code(500); 
        exit('Error: Failed to save user data');
    }
} else {
    http_response_code(400); 
    exit('Error: Invalid request method.');
}
?>

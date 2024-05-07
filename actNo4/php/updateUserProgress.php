<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_SESSION['username']; 
    $newCurrentLevel = $_POST['new-current-level'];
    $newLongerTimeLeft = $_POST['new-longer-time-left'];

    $xml = simplexml_load_file("../users.xml");

    $userNode = $xml->xpath("//user[username='{$username}']")[0];

    if ($userNode) {
        if (!isset($userNode->currentLevel)) {
            $userNode->addChild('currentLevel', $newCurrentLevel);
        } else {
            $userNode->currentLevel = $newCurrentLevel;
        }

        if (!isset($userNode->longerTimeLeft)) {
            $userNode->addChild('longerTimeLeft', $newLongerTimeLeft);
        } else {
            $existingTime = (int) $userNode->longerTimeLeft;
            if ($newLongerTimeLeft > $existingTime) {
                $userNode->longerTimeLeft = $newLongerTimeLeft;
            }
        }

        $xml->asXML("../users.xml");

        echo "User information updated successfully.";
    } else {
        echo "User not found.";
    }
} else {
    echo "Invalid request method.";
}
?>

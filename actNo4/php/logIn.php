<?php
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $xml = new DOMDocument();
    $xml->load('../users.xml');

    $users = $xml->getElementsByTagName('user');
    foreach ($users as $user) {
        $xmlUsername = $user->getElementsByTagName('username')->item(0)->nodeValue;
        $xmlPassword = $user->getElementsByTagName('password')->item(0)->nodeValue;
        if ($xmlUsername == $username && $xmlPassword == $password) {
            $_SESSION['username'] = $username;
            echo "true";
            exit(); 
        } elseif ($xmlUsername == $username) {
            echo "password";
            exit(); 
        }
    }

    echo "username";
    exit();
}

?>

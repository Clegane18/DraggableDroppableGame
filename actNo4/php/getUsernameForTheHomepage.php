<?php
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    
    header('Content-Type: application/json');
    echo json_encode(['username' => $username]);
} else {
    http_response_code(401); 
    exit('Error: User not authenticated');
}
?>

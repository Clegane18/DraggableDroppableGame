<?php
session_start(); 
if (isset($_SESSION['username'])) {
    $_SESSION = array();

    session_destroy();

    echo "Session destroyed successfully.";
} else {
    echo "Session does not exist.";
}
?>

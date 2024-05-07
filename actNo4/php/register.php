<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    

    $xml = new DOMDocument();
    $xml->load('../users.xml');



    $user = $xml->createElement('user');
    $user->appendChild($xml->createElement('username', $username));
    $user->appendChild($xml->createElement('email', $email)); 
    $user->appendChild($xml->createElement('password', $password));

    $xml->documentElement->appendChild($user);
    $xml->save('../users.xml');


    $xmlString = $xml->saveXML();
    $dom = new DOMDocument();
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->loadXML($xmlString);
    $formattedXml = $dom->saveXML();

    file_put_contents('../users.xml', $formattedXml);
  

    header("Location: ../html/logIn.html");
    exit(); 
}
?>

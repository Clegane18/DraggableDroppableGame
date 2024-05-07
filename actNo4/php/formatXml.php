<?php
$xml = new DOMDocument();
$xml->load('../users.xml');

$xml->preserveWhiteSpace = false;
$xml->formatOutput = true;

$xml->save('../users.xml');

echo "XML file formatted successfully.";
?>

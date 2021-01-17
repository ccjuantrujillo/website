<?php
$str = "A 'quote' is <b>bold</b>";
$a = htmlentities(htmlentities($str));
echo $a."<br>";
echo html_entity_decode($a);
?>
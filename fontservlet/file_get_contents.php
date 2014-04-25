<?php
$a = file_get_contents('a2.html');
var_dump($a);
echo htmlspecialchars($a);
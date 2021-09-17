<?php

define('DB_SCHEME', 'mysql');
define('DB_HOST', 'db');
define('DB_NAME', 'db');
define('DB_USER', 'db');
define('DB_PWD', 'db');
define('DB_PORT', '3306');

include_once "PDOPlusPlus.php";
require_once "hanoi.class.php";

$hanoi = new HanoiClass();
$GameID = $hanoi->initGame(3);

print("<pre>".print_r($hanoi->setState(0,2, $GameID),true)."</pre>");

print("<pre>".print_r($hanoi->setState(0,1, $GameID),true)."</pre>");

print("<pre>".print_r($hanoi->setState(2,1, $GameID),true)."</pre>");

print("<pre>".print_r($hanoi->setState(0,2, $GameID),true)."</pre>");

print("<pre>".print_r($hanoi->setState(1,0, $GameID),true)."</pre>");

print("<pre>".print_r($hanoi->setState(1,2, $GameID),true)."</pre>");

print("<pre>".print_r($hanoi->setState(0,2, $GameID),true)."</pre>");

?>

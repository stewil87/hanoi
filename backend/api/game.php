<?php
require_once "hanoi.class.php";

session_start();
$output = [0 => ''];

if(isset($_POST['newgame']) && $_POST['newgame'] === 1){
  $_SESSION['hanoi'] = new HanoiClass();
  $_SESSION['gameid'] = $_SESSION['hanoi']->initGame(3);
  $_SESSION['gamedata'] = $_SESSION['hanoi']->getGamedata();
  $output = $_SESSION['gamedata'];

} elseif (isset($_SESSION['gameid']) && $_SESSION['gameid']!==''){
  if(isset($_SESSION['hanoi'])
    && isset($_POST['src']) && is_numeric($_POST['src']) && ($_POST['src'] >=1 && $_POST['src'] <=2)
    && isset($_POST['trg']) && is_numeric($_POST['trg']) && ($_POST['trg'] >=1 && $_POST['trg'] <=2)){
    $output = $_SESSION['hanoi']->setState($_POST['src'], $_POST['trg'], $_SESSION['gameid']);
  }
}

echo json_encode($output);
exit;

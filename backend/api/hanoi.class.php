<?php
/**
 *
 */
class HanoiClass {

  private $tiles = 3;
  private $gameID;
  private $gamestarted = false;
  private $gamedata = array();
  private $towerNumber = array();

  public function __construct($uTiles = 3) {
   $this->setTiles($uTiles);
   $this->setGamestarted(false);
  }

  public function initGame($uTiles = 3) {
    $this->setTiles($uTiles);
    $this->setGamestarted(true);
    $this->generateGameData();

    return $this->getGameID();
  }

  public function winState() {
    $towerNumber = $this->getTowerNumber();
    return ($towerNumber[0] === 0 && $towerNumber[2] === 3 * $this->getTiles());
  }

  public function setState($source, $target, $GameID) {

    if($GameID !== $this->getGameID()){
      return [0 => 'Critical error. Abort.'];
    }

    $towerNumber = $this->getTowerNumber();
    $gameField = $this->getGamedata();
    $tmpTower = array();
    $saveNumber = 0;
    $saveSource = 0;

    if($towerNumber[$source] !== 0 && $towerNumber[$target] < ( 3 * $this->getTiles())){

      for ($xSource=0; $xSource<=$this->getTiles() -1; $xSource++){
        if($gameField[$source][$xSource] !== 0){
          $saveNumber = $gameField[$source][$xSource];
          $saveSource = $xSource;
          break;
        }
      }

      for ($xTarget=$this->getTiles() -1; $xTarget>=0; $xTarget--){
        if($gameField[$target][$xTarget] === 0){
          if($xTarget === $this->getTiles() -1){
            $gameField[$target][$xTarget] = $saveNumber;
            $gameField[$source][$saveSource] = 0;
            break;
          } else if($gameField[$target][$xTarget + 1] > $saveNumber) {
            $gameField[$target][$xTarget] = $saveNumber;
            $gameField[$source][$saveSource] = 0;
            break;
          }
        }
      }

      for ($i=0; $i<=2; $i++){
        $tmpTower[$i] = 0;
        for($x=0; $x<=($this->getTiles() -1); $x++){
          $tmpTower[$i] += $gameField[$i][$x];
        }
      }

      $this->setGamedata($gameField);
      $this->setTowerNumber($tmpTower);

      return $this->getGamedata();
    }
  }

  private function generateGameData() {
    $tmpArray = array();
    $tmpTower = array();

    for ($i=0; $i<=2; $i++){
      $tmpTower[$i] = 0;

      for($x=0; $x<=($this->getTiles() -1); $x++){
        if($i === 0){
          $tmpArray[$i][$x] = $x + 1;
        } else{
          $tmpArray[$i][$x] = 0;
        }
        $tmpTower[$i] += $tmpArray[$i][$x];
      }
    }

    $this->setGameID(md5('SALT' . $_SERVER['REMOTE_ADDR'] . time()));
    $this->setGamedata($tmpArray);
    $this->setTowerNumber($tmpTower);
  }

  /**
   * @return mixed
   */
  public function getGameID()
  {
    return $this->gameID;
  }

  /**
   * @param mixed $gameID
   */
  public function setGameID($gameID)
  {
    $this->gameID = $gameID;
  }

  /**
   * @return array
   */
  public function getTowerNumber()
  {
    return $this->towerNumber;
  }

  /**
   * @param array $towerNumber
   */
  public function setTowerNumber($towerNumber)
  {
    $this->towerNumber = $towerNumber;
  }

  /**
   * @return array
   */
  public function getGamedata()
  {
    return $this->gamedata;
  }

  /**
   * @param array $gamedata
   */
  public function setGamedata($gamedata)
  {
    $this->gamedata = $gamedata;
  }

  /**
   * @return mixed
   */
  public function getGamestarted()
  {
    return $this->gamestarted;
  }

  /**
   * @param mixed $gamestarted
   */
  public function setGamestarted($gamestarted)
  {
    $this->gamestarted = $gamestarted;
  }

  /**
   * @return mixed
   */
  public function getTiles()
  {
    return $this->tiles;
  }

  /**
   * @param mixed $tiles
   */
  public function setTiles($tiles)
  {
    $this->tiles = $tiles;
  }
}

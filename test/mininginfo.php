<?php
  require_once("../lib/CasinoCoinMiningInfo/casinocoinmininginfo.php");
  
  /*
   * Output JSON format:

Array
(
    [version] => 1000004
    [difficulty] => 1.97454052
    [blocks] => 197448
    [networkhashps] => 59232316
)
   */
  echo json_encode(@CasinoCoinMiningInfo::get());
  
?>
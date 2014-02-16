<?php
  require_once("../lib/jsonrpcphp/includes/jsonRPCClient.php");
  require_once("inc-settings.php");
  require_once("inc-memcache.php");
  
  
  class CasinoCoinMiningInfo
  {
    public static function get($pNumBlocks=-1)
    {
/*
 * Format returned in JSON format

Array
(
    [version] => 1000004
    [difficulty] => 1.97454052
    [blocks] => 197448
    [networkhashps] => 59232316
)
 */
      global $cacheConnected;
      global $memcache;      

      $array_values = array();
      
      if($cacheConnected)
      {
        $cacheStr = md5("CASINOCOIN_MININGINFO");
        $mc_result = $memcache->get($cacheStr);
        
        if($mc_result)
        {
          $array_values = json_decode($mc_result);
        }
        else
        {
          $array_values = self::determineMiningInfo($pNumBlocks);
          $valuesStr = json_encode($array_values);
          $memcache->set($cacheStr, $valuesStr, false, _MEMCACHE_INTERVAL_CASINOCOINAPI_MININGINFO);          
        }          
      }
      else
      {
        $array_values = self::determineRates();        
      }
      
      return $array_values;
    }
    
    private static function determineMiningInfo($pNumBlocks=-1)
    {
      $array_values = array();
      
      try
      {
        $casinocoin = new jsonRPCClient(
          "http://" . 
          _CASINOCOIN_RPC_USERNAME . ":" . 
          _CASINOCOIN_RPC_PASSWORD . "@" .
          _CASINOCOIN_RPC_HOST . ":" .
          _CASINOCOIN_RPC_PORT
          );
        
        $array_info = $casinocoin->getinfo();
        $hashps = $casinocoin->getnetworkhashps($pNumBlocks);
        
        $array_values["version"] = $array_info["version"];
        $array_values["difficulty"] = $array_info["difficulty"];
        $array_values["blocks"] = $array_info["blocks"];
        $array_values["networkhashps"] = $hashps;
      } catch (Exception $e) {}
      
      return $array_values;
    }
    
  }
?>
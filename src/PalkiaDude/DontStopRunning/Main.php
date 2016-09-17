<?php
namespace PalkiaDude\DontStopRunning;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\math\Vector3;
use pocketmine\block\Block;
use pocketmine\Player;
class Main extends PluginBase{
     
     public function PluginEnable(){
          $this->getLogger()->info("DontStopRunning v1 by DazAdam");
     }
}

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
     
     public function onEnable(){
          $this->getLogger()->info("DontStopRunning v1 by DazAdam");
   
     }
     
     public function onCommand(CommandSender $sender, Command $command, $label, array $args){
    if(strtolower($command->getName()) === "DSR"){
         $sender->teleport(//to set spawn coordinates of lobby);
        return true;
    }

    return false;
}
    public function PlayerMove($event PlayerMoveEvent){
         $player = $event->getPlayer();
         if($player->getLevel()->getName() === $this->getServer()->getLevelbyName("DSRArena")){
            \//to be done
         }
    }
    public function DeathSystem($event PlayerDeathEvent){
         $lives = 5;
         $player = $event->getPlayer();
         if($player->getLevel()->getName() === $this->getServer()->getLevelbyName("DSRArena")){
          if ($lives = 5){
              $event->$lives--;
              $player->sendMessage("You have 4 lives left!");
          }
          if ($lives = 4){
              $event->$lives--;
              $player->sendMessage("You have 3 lives left!");
          }
          if ($lives = 3){
              $event->$lives--;
              $player->sendMessage("You have 2 lives left!");
              
          }
          if ($lives = 2){
              $event->$lives--;
              $player->sendMessage("This is your final life. What are last your words?");
          }
          if($lives = 1){
              $event->$lives--;
              $player->teleport(//spawn but I'm too lazy right now);
              $player->sendMessage("You have lost the game. Better luck next time.");
          }
         }
    }
     
}

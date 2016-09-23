<?php

// YOU NEED TO HAVE A WORLD NAMED DSRWORLD AND DSRLOBBY.

namespace PalkiaDude\DontStopRunning;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\math\Vector3;
use pocketmine\block\Block;
use pocketmine\Player;
use pocketmine\level\Level;
use pocketmine\command\Command;
class Main extends PluginBase{
     
     public function onEnable(){
          $this->getLogger()->info("DontStopRunning v2 by DazAdam");
   
     }
     
     public function onCommand(CommandSender $sender, Command $command, $label, array $args){
    if(strtolower($command->getName()) === "DSR"){
         $lobby = getServer()->getLevelbyName("DSRLobby");
         $lobbyspawn = $lobby->getSpawnLocation();
         $sender->teleport($lobby, $lobbyspawn);
        return true;
    }

    return false;
}
    public function PlayerCount(PlayerJoinEvent $event){
         $level = getServer()->getLevelByName("DSRLobby");
         $playercount = $event->$level->getOnlinePlayers();
         $arenaspawn = getServer()->getLevelByName("DSRArena")->getSpawnLocation();
         if($playercount === 1){
              $playercount->sendMessage("Countdown to game starts when 3 more players have joined.");
         }
         if($playercount === 2){
              $playercount->sendMessage("Countdown to game starts when 2 more players have joined.");
         }
         if($playercount === 3){
              $playercount->sendMessage("Countdown to game starts when 1 more player has joined.");
         }
         if($playercount === 4){
              $playercount->sendMessage("50 seconds to game!");
              
         }
         if($playercount === 5){
              
         }
         if($playercount === 6){
              $playercount->teleport($arenaspawn);
         }
    }
    public function onCompletion(Server $server){
         
    }
    public function PlayerMove(PlayerMoveEvent $event)){
         $player = $event->getPlayer();
         if($player->getLevel()->getName() === $this->getServer()->getLevelbyName("DSRArena")){
            $block = getId(0);  
        $pos = new Vector3($player->getFloorX(), $player->getFloorY() - 1, $player->getFloorZ());
        if($this->isPlayer($player)){
            $event->setBlock($pos, $block);
         }
    }
    }
    public function DeathSystem(PlayerDeathEvent $event){
         $lives = 5;
         $player = $event->getPlayer();
         $spawn = getServer()->getLevelByName("Spawn");
         $spawnlocation = $spawn->getSpawnLocation();
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
              $player->teleport($spawn, $spawnlocation);
              $player->sendMessage("You have lost the game. Better luck next time.");
          }
         }
    }
     
}

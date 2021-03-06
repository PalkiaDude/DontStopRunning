<?php

// YOU NEED TO HAVE A WORLD NAMED DSRARENA AND DSRLOBBY.

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
     public $seconds;
     
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
         $player = $event->getPlayer();
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
              $playercount->teleport($arenaspawn);
               $task = new Task($this);
               $this->$seconds = 0;
               $h = $this->getServer()->getScheduler()->scheduleRepeatingTask($task, 1000);
               $task->setHandler($h);
               
         }
    }
    public function onRun($tick){
         $this->$seconds++;
         $level = getServer()->getLevelByName("DSRArena");
         $playercount = $level->getOnlinePlayers();
         if($seconds === 10){
            $playercount->sendMessage("40 seconds left to game start");
         }
         if($seconds === 20){
              $playercount->sendMessage("30 seconds left to game start");
         }
         if($seconds === 30){
              $playercount->sendMessage("20 seconds left to game start");
         }
         if($seconds === 40){
              $playercount->sendMessage("10 seconds left to game start");
         }
         if($seconds === 45){
              $playercount->sendMessage("5 seconds left to game start");
         }
         if($seconds === 46){
              $playercount->sendMessage("4 seconds left to game start");
         }
         if($seconds === 47){
              $playercount->sendMessage("3 seconds left to game start");
         }
         if($seconds === 48){
              $playercount->sendMessage("2 seconds left to game start");
         }
         if($seconds === 49){
              $playercount->sendMessage("1 second left to game start");
         }
         if($seconds === 50){
              $playercount->sendMessage("GAME HAS STARTED! RUUUUUNNNN"!);
         }
    }
    
    public function PlayerMove(PlayerMoveEvent $event)){
         $player = $event->getPlayer();
         $x = $player->getFloorX();
         $y = $player->getFloorY() -1;
         $z = $player->getFloorZ();
         if($player->getLevel()->getName() === $this->getServer()->getLevelbyName("DSRArena")){
            $block = getId(0);
            $goldblock = getId(41);
            if($y->getblockId($goldblock)){
          $event->setblock($x, $y, $z, $block);
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

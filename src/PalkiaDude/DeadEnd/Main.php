<?php
namespace PalkiaDude\DeadEnd;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\math\Vector3;
use pocketmine\block\Block;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\Player;
use pocketmine\plugin\Plugin;
use pocketmine\level\Position;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
class Main extends PluginBase implements Listener{
public $timer = [];
     public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN . "Dead-End Minigame by PalkiaDude!");
$this->saveDefaultConfig();    
}
public function onLobbyJoin(PlayerJoinEvent $event){
  $lobby = $this->getWorlds()->get("DeadEnd-lobby");
  $arena = $this->getWorlds()->get("DeadEndArena");
  $targetlevel = $event->getTarget();
  $players = count($this->getServer()->getLevelByName($lobby)->getPlayers());
  $timer = new Timer($this);
  $x = 240;
  $done = $this->getServer()->getScheduler()->scheduleRepeatingTask($timer, 300);
  if($targetlevel->$players > 10){  
   $timer = new Timer($this);
   $h = $this->getServer()->getScheduler()->scheduleRepeatingTask($timer, 20);
   $this->timer[$timer->getTaskId] = $timer->getTaskId();
   for($x; ; $x--){
    $this->getServer()->broadcastMessage("Game starting in" . $x);
   }
  }
  elseif($targetlevel->$players > 5){
   $this->getServer()->broadcastMessage("Waiting for more people");
  }
  elseif($targetlevel->$players > 11){
   $this->getServer()->broadcastMessage("Too many players in lobby");
  }
}
public function FullLobby(PlayerJoinEvent $event){
    $lobby = $this->getWorlds()->get("DeadEnd-lobby");
  $targetlevel = $event->getTarget();
  $players = count($this->getServer()->getLevelByName($lobby)->getPlayers());
   if($targetlevel->$players > 10){
      $sign = getBlock()->getId() == 63 or getBlock()->getId() == 68;
            if($sign instanceof Sign) {
                $signtext = $sign->getText();
       if(TextFormat::clean($signtext[0]) === "[DeadEnd]") {  
     $event->setLine(1,"GAME IS FULL!");
            }
      }
   }
}
      
public function LobbyTimer(PlayerJoinEvent $event){
$lobby = $this->getWorlds()->get("DeadEnd-lobby");
  $arena = $this->getWorlds()->get("DeadEndArena");
  $players = count($this->getServer()->getLevelByName($lobby)->getPlayers());
  $done = $this->getServer()->getScheduler()->scheduleRepeatingTask($timer, 300);
$timer = new Timer($this);
  if($timer >= $done){
    $players->teleport(140.4,9,118.4,$arena);
 $this->getServer()->broadcastMessage("The Game has started!");
}
}
public function onInteract(PlayerInteractEvent $event) {
        $player = $event->getPlayer();
        $sign = $event->getPlayer()->getLevel()->getTile($event->getBlock());
        if($event->getBlock()->getId() == 63 or $event->getBlock()->getId() == 68) {
            if($sign instanceof Sign) {
                $signtext = $sign->getText();
                if(TextFormat::clean($signtext[0]) === "[DeadEnd]") {
    $player->teleport(126.3,5,128.3,DeadEnd-l0bby);
    $player->sendMessage(TextFormat::GOLD."You entered DeadEnd!");               
                }
            }
        }
    }    public function addPlayer(Player $player){
        $this->players[$player->getName()] = $player->getName();
    }
    public function isPlayer(Player $player){
        return in_array($player->getName(), $this->players);
    }
    public function removePlayer(Player $player){
        unset($this->players[$player->getName()]);
    }
    public function onPlayerMove(PlayerMoveEvent $event){
        $player = $event->getPlayer();
        $level = $player->getLevel();
        $pos = new Vector3($player->getFloorX(), $player->getFloorY() - 1, $player->getFloorZ());
        $block = $ev->getPlayer()->getLevel()->getBlock($ev->getPlayer()->floor()->subtract(0, 1));
  if($block->getId() === Block::GOLD_BLOCK){
 $player->$pos->setBlock = $ev->getPlayer()->getLevel()->getBlock($ev->getPlayer()->floor()->subtract(0, 1));
}
  if($block->getId() === Block::GOLD_BLOCK){
  $event->$player->$pos->setBlock(new Vector3($x, $y, $z), Block::get(0)) ;
     }
}

   public function onArenaJoin(PlayerJoinEvent $event){
    $arena = $this->getServer()->getLevelByName("DeadEndArena");
    $players = count($this->getServer()->getLevelByName("DeadEndArena")->getPlayers());    
    $event->$players->addPlayer();
}
   public function getWinner(PlayerDeathEvent $event){
   $targetlevel = $event->getTarget();
    $players = count($this->getServer()->getLevelByName("DeadEndArena")->getPlayers());
   if($targetlevel->$players > 10){
    $event->$players->broadcastMessage("10 runners are alive and running!");
   }
   if($targetlevel->$players > 1){
    $event->$players->broadcastMessage("We have a winner!");
    $event->$players->teleport(260.4,5,19.3,Spawn);
   }
   }


    
   public function onDeath(PlayerDeathEvent $event){
    $player = $event->getPlayer();   
    $event->$player->removePlayer();
   $player->sendMessage(TextFormat::RED."You are out of the game!");                             
           }
}
   


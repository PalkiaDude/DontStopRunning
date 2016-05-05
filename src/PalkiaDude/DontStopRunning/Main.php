<?php
namespace PalkiaDude\DontStopRunning;
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
        $this->getLogger()->info(TextFormat::GREEN . "DontStopRunning had officially been loaded!");
$this->saveDefaultConfig();    
$this->getServer()->loadLevel("DSRArena");
$this->getServer()->loadLevel("DSRLobby");
}
public function onLobbyJoin(PlayerJoinEvent $event){
  $server = $this->getServer();
  $lobby = $this->$server->getLevelByName("DSRLobby");
  $arena = $this->$server->getLevelByName("DSRArena");
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
     $server = $this->getServer();
    $lobby = $this->$server->DSR;
  $targetlevel = $event->getTarget();
  $players = count($this->getServer()->getLevelByName($lobby)->getPlayers());
   if($targetlevel->$players > 10){
      $sign = getBlock()->getId() == 63 or getBlock()->getId() == 68;
            if($sign instanceof Sign) {
                $signtext = $sign->getText();
       if(TextFormat::clean($signtext[0]) === "[DSR]") {  
     $event->setLine(1,"FULL!");
            }
      }
   }
}
      
public function LobbyTimer(PlayerJoinEvent $event){
$server = $this->getServer();
$lobby = $this->$server->getLevelByName("DSRLobby")
  $arena = $this->$server->getLevelByName("DSRArena")
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
        $arena = $event->getServer()->getLevelByName("DSRArena");
        if($event->getBlock()->getId() == 63 or $event->getBlock()->getId() == 68) {
            if($sign instanceof Sign) {
                $signtext = $sign->getText();
                if(TextFormat::clean($signtext[0]) === "[DSR]")) {
                     if(TextFormat::clean($signtext[1] === "Join!")
    $player->teleport(126.3,5,128.3,$arena);
    $player->sendMessage(TextFormat::GOLD."You joined the mayhem that is, DontStopRunning!");               
                }
            }
        }
    }  
    public function onPlayerMove(PlayerMoveEvent $event){
        $player = $event->getPlayer();
        $level = $player->getLevel();
        $pos = new Vector3($player->getFloorX(), $player->getFloorY() - 1, $player->getFloorZ());
       $arena = $this->getServer()->getLevelByName("DSRArena");
  if($level === $arena){
 $player->$pos->setBlock = $ev->getPlayer()->getLevel()->getBlock($ev->getPlayer()->floor()->subtract(0, 1));
}
  if($level === $arena){
  $event->$player->$pos->setBlock(new Vector3($x, $y, $z), Block::get(0)) ;
     }
}

   public function onArenaJoin(PlayerJoinEvent $event){
    $arena = $this->getServer()->getLevelByName("DeadEndArena");
    $players = count($this->getServer()->getLevelByName("DeadEndArena")->getPlayers());    

}
   public function getWinner(PlayerDeathEvent $event){
   $targetlevel = $event->getTarget();
    $players = count($this->getServer()->getLevelByName("DSRArena)->getPlayers());
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
   $player->sendMessage(TextFormat::RED."You are out of the game!");  
   $player->teleport(260.4,5,19.3,Spawn);
           }
}
   


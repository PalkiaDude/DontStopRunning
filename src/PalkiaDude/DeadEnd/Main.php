<?php
namespace PalkiaDude\DeadEnd;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\math\Vector3;
use pocketmine\block\Block;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\Player;
use pocketmine\plugin\Plugin;
use pocketmine\level\Position;
class Main extends PluginBase implements Listener{

     public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN . "Dead-End Minigame by PalkiaDude!");
     }
    public function onCommand(CommandSender $sender, Command $cmd, $label,array $args){
        if(strtolower($cmd->getName()) === "footblock"){
            if($sender instanceof Player){
                if($this->isPlayer($sender)){
                    $this->removePlayer($sender);
                    $sender->sendMessage(TextFormat::GOLD . "You have left DeadEnd.");
                    return true;
                }
                else{
                    $this->addPlayer($sender);
                    $sender->sendMessage(TextFormat::GREEN . "You have joined DeadEnd.");
                    return true;
                }
            }
            else{
                $sender->sendMessage(TextFormat::RED . "Please use this command in-game.");
                return true;
            }
        }
    }
    public function addPlayer(Player $player){
        $this->players[$player->getName()] = $player->getName();
    }
    public function isPlayer(Player $player){
        return in_array($player->getName(), $this->players);
    }
    public function removePlayer(Player $player){
        unset($this->players[$player->getName()]);
    }
}     public function onPlayerMove(PlayerMoveEvent $event){
        $player = $event->getPlayer();
        $level = $player->getLevel();
        $pos = new Vector3($player->getFloorX(), $player->getFloorY() - 1, $player->getFloorZ());
        if($this->isPlayer($player)){
            $level->setBlock($pos, 0);
     public function setGame(PlayerInteractEvent $event){
$player=$event->getPlayer();
$username=$player->getName();
$block=$event->getBlock();
$levelname=$player->getLevel()->getFolderName();
if(isset($this->SetStatus[$username]))
{
switch ($this->SetStatus[$username])
{
case 0:
if($event->getBlock()->getID() != 63 && $event->getBlock()->getID() != 68) 
{
$player->sendMessage(TextFormat::GREEN."please choose a sign to click on");
return; 
}
$this->sign=array(
"x" =>$block->getX(),
"y" =>$block->getY(),
"z" =>$block->getZ(),
"level" =>$levelname);
$this->config->set("sign",$this->sign);
$this->config->save();
$this->SetStatus[$username]++;
$player->sendMessage(TextFormat::GREEN."sign has been created!");
$player->sendMessage(TextFormat::GREEN."please click on the 1st spawnpoint");
$this->signlevel=$this->getServer()->getLevelByName($this->config->get("sign")["level"]);
$this->sign=new Vector3($this->sign["x"],$this->sign["y"],$this->sign["z"]);
$this->changeStatusSign();
break;
case 1:
$this->pos1=array(
"x" =>$block->x,
"y" =>$block->y,
"z" =>$block->z,
"level" =>$levelname);
$this->config->set("pos1",$this->pos1);
$this->config->save();
$this->SetStatus[$username]++;
$player->sendMessage(TextFormat::GREEN."Spawnpoint blue created");
$player->sendMessage(TextFormat::GREEN."Please click on the red spawnpoint");
$this->pos1=new Vector3($this->pos1["x"]+0.5,$this->pos1["y"],$this->pos1["z"]+0.5);
break;
case 2:
 $this->pos2=array(
"x" =>$block->x,
"y" =>$block->y,
"z" =>$block->z,
"level" =>$levelname);
$this->config->set("pos2",$this->pos2);
$this->config->save();
$this->pos2=new Vector3($this->pos2["x"]+0.5,$this->pos2["y"],$this->pos2["z"]+0.5);
$player->sendMessage(TextFormat::GREEN."Spawnpoint red created");
$player->sendMessage(TextFormat::GREEN."All settings completed, you can start a game now.");
 $player->sendMessage(TextFormat::RED."REMINDER: MAKE SURE YOU DO /DE SETROOM AND TAP A REDSTONE BLOCK FOR WAITROOM!");
  $player->sendMessage(TextFormat::RED."REMINDER: ALSO IT IS RECOMMENED THAT YOU RESTART THE SERVER");
  unset($this->SetStatus[$username]);
$this->level=$this->getServer()->getLevelByName($this->config->get("pos1")["level"]);
break;
}
}
}
   public function onDeath(PlayerDeathEvent $event){
   $event->getPlayer()->removePlayer
}

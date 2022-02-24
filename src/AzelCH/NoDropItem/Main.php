<?php

namespace AzelCH\NoDropItem;

use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDropItemEvent;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener{
  
  public function onEnable(): void{
    $this->saveResource("config.yml");
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
  }
  
  public function onDropItem(PlayerDropItemEvent $event){
    $player = $event->getPlayer();
    if($this->getConfig()->get("enable") === true){
      if($this->getConfig()->get("enable-msg") === true){
        $event->cancel();
        $player->sendMessage($this->getConfig()->get("dropitem-msg"));
      }
    }
    if($this->getConfig()->get("enable") === true){
      if($this->getConfig()->get("enable-msg") === false){
        $event->cancel();
      }
    }
  }
}

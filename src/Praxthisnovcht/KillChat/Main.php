<?php
// Addon for CustomChat
namespace Praxthisnovcht\KillChat;

use pocketmine\IPlayer;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;


use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\Listener;

class KillChat extends PluginBase implements Listener{

    public function onEnable()
    {
		$Name = $user->getPlayer()->getName();		
		if(!(file_exists($this->plugin->getDataFolder() . "Counter/" . strtolower($Name) . ".yml")))
		{
			return new Config($this->plugin->getDataFolder() . "Counter/" . strtolower($Name) . ".yml", Config::YAML, array(
				"Name" => $Name,
				
				
				"Kills" => $this->plugin->getMurderDone()->getName(),
				
				
				"Deaths" => $this->plugin->getDeathsDone()->getName(),
				
				
				),
			));
		}
		else
		{
			return new Config($this->plugin->getDataFolder() . "Counter/" . strtolower($Name) . ".yml", Config::YAML, array(
			));
		}
	         $this->saveDefaultConfig();
		 $this->getLogger()->info("KillChat has been enabled.");
	
	}		


           

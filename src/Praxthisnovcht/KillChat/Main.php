<?php
// Addon for CustomChat
namespace Praxthisnovcht\KillChat;

use pocketmine\IPlayer;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\Listener;
use Praxthisnovcht\CustomChat;

class KillChat extends PluginBase implements Listener
{

    public function onEnable()
    {
        $Name = $user->getPlayer()->getName();
        if (!(file_exists($this->plugin->getDataFolder() . "Counter/" . strtolower($Name) . ".yml"))) {
            return new Config($this->plugin->getDataFolder() . "Counter/" . strtolower($Name) . ".yml", Config::YAML, array(
                "Name" => $Name,


                "Kills" => $this->plugin->getMurderDone()->getName(),


                "Deaths" => $this->plugin->getDeathsDone()->getName(),

            ));
        } else {
            return new Config($this->plugin->getDataFolder() . "Counter/" . strtolower($Name) . ".yml", Config::YAML, array());
        }
        $this->saveDefaultConfig();
        $this->getLogger()->info("KillChat has been enabled.");
    }

    public function onDisable()
    {
    	$this->config->save ();
        $this->getLogger()->info("KillChat has been disable.");
    }
	public function onJoin(PlayerJoinEvent $event) {
		if (! isset ( $this->users [$event->getPlayer ()->getName ()] )) {
		}
		if (! isset ( $this->Config::YAML [$event->getPlayer ()->getName ()] )) {
		    // $this->Config::YAML may be fals 
			$this->Config::YAML [$event->getPlayer ()->getName ()] ["kills"] = 0;
			// solution for CustomChat departure 0
			$this->Config::YAML [$event->getPlayer ()->getName ()] ["deaths"] = 0;
		}
	}
    public function onPlayerDeath(EntityDeathEvent $event)
    {
        $entity = $event->getEntity();
        $cause = $entity->getLastDamageCause();
        $killer = $cause->getDamager();
        if ($killer instanceof Player) {
            $killer->sendMessage("You Have KILLED " . $cause . "");
            $this->Config::YAML [$Kills->getName ()] ["kills"] ++; // check
            //add Kill point here
        }
        if ($cause instanceof Player) {
            $cause->sendMessage("You have been KILLED by " . $killer . "")
            //add Death point here
        }
        else {
            $this->getLogger()->info(TextFormat::BLUE . "KillChat Error");
        }
    }
}


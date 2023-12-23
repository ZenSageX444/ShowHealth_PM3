<?php



namespace ShowHealth;



use pocketmine\Server;

use pocketmine\plugin\PluginBase;



class Main extends PluginBase{

    

    public $perfix = "[ShowHealth] ";

    

    public function onEnable(){

        $this->getServer()->getScheduler()->scheduleRepeatingTask(new thisTask($this), 0);

        $this->getServer()->getLogger()->info($this->perfix . "Plugin Enable ...");

    }

}



use ShowHealth\Main;

use pocketmine\scheduler\Task;



class thisTask extends Task{

    

    private $main;

    

    public function __construct(Main $main){

        $this->main = $main;

    }

    

    public function getMain(){

        return $this->main;

    }

    

    public function onRun($args){

        $pOnline = $this->getMain()->getServer()->getOnlinePlayers();

        foreach($pOnline as $player){

            $health = $player->getHealth();

            $maxhealth = $player->getMaxHealth();

            $food = $player->getFood();

            $maxfood = $player->getMaxFood();

            $player->sendPopup("เลือด $health/$maxhealth อาหาร $food/$maxfood");

        }

    }

}

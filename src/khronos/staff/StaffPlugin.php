<?php

declare(strict_types=1);

namespace khronos\staff;

use khronos\staff\common\Message;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

final class StaffPlugin extends PluginBase {

    public function onEnable() {
        $startTime = microtime(true);

        $this->saveDefaultConfig();

        $this->saveResource('messages.yml');

        Message::loadMessagesFromConfig(new Config($this->getDataFolder() . 'messages.yml'));

        $this->getLogger()->info(Message::STAFF_PLUGIN_STARTED()->build(strval(microtime(true) - $startTime)));
    }

}

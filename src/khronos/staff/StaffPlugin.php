<?php

declare(strict_types=1);

namespace khronos\staff;

use pocketmine\plugin\PluginBase;

final class StaffPlugin extends PluginBase {

    public function onEnable() {
        $this->saveDefaultConfig();
    }

}

<?php

declare(strict_types=1);

namespace khronos\staff\command\impl;

use khronos\staff\command\Command;
use khronos\staff\common\Message;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\Player;

final class StaffCommand extends Command {

    public function __construct() {
        parent::__construct('staff', 'Get custom items to moderate the server.', '/staff');
    }

    public function onPlayerExecute(Player $player, string $commandLabel, array $args) {
        // TODO: Implement onPlayerExecute() method.
    }

    public function onConsoleExecute(ConsoleCommandSender $sender, string $commandLabel, array $args) {
        $sender->sendMessage(Message::RUN_THIS_COMMAND_IN_GAME()->build());
    }

}

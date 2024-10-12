<?php

declare(strict_types=1);

namespace khronos\staff\command;

use khronos\staff\common\Message;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\Player;

abstract class Command extends \pocketmine\command\Command {

    public function execute(CommandSender $sender, $commandLabel, array $args) {
        if ($sender instanceof Player) {
            $this->onPlayerExecute($sender, $commandLabel, $args);
            return;
        }

        if ($sender instanceof ConsoleCommandSender) {
            $this->onConsoleExecute($sender, $commandLabel, $args);
            return;
        }

        $sender->sendMessage(Message::UNKNOWN_SENDER_TYPE()->build());
    }

    public abstract function onPlayerExecute(Player $player, string $commandLabel, array $args);

    public abstract function onConsoleExecute(ConsoleCommandSender $sender, string $commandLabel, array $args);

}

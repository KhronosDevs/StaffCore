<?php

declare(strict_types=1);

namespace khronos\staff\common;

use pocketmine\utils\Config;
use pocketmine\utils\EnumTrait;
use pocketmine\utils\TextFormat;

/**
 * @method static Message STAFF_PLUGIN_STARTED()
 * @method static Message UNKNOWN_SENDER_TYPE()
 * @method static Message RUN_THIS_COMMAND_IN_GAME()
 */
final class Message {
    use EnumTrait;

    /** @var array<string, string> */
    private static $messages = [];

    public static function loadMessagesFromConfig(Config $config) {
        self::$messages = $config->getAll();
    }

    public function build(string ...$args): string {
        $text = self::$messages[$this->enumValue] ?? $this->enumValue;

        if (is_array($text)) {
            $text = implode("\n", $text);
        }

        foreach ($args as $i => $arg) {
            $text = str_replace('{%' . $i . '}', $arg, $text);
        }

        return TextFormat::colorize($text);
    }

}

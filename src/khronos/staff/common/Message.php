<?php

declare(strict_types=1);

namespace khronos\staff\common;

use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

/**
 * @method static Message STAFF_PLUGIN_STARTED()
 */
final class Message extends Enum {

    /** @var array<string, string> */
    private static $messages = [];

    public static function loadMessagesFromConfig(Config $config) {
        self::$messages = $config->getAll();
    }

    public function build(string ...$args): string {
        $text = self::$messages[$this->m_valueName] ?? $this->m_valueName;

        if (is_array($text)) {
            $text = implode("\n", $text);
        }

        foreach ($args as $i => $arg) {
            $text = str_replace('{%' . $i . '}', $arg, $text);
        }

        return TextFormat::colorize($text);
    }

}

<?php

declare(strict_types=1);

namespace khronos\staff\common;

abstract class Enum {

    protected $m_valueName;

    private function __construct($valueName){
        $this->m_valueName = $valueName;
    }

    public static function __callStatic($methodName, $arguments){
        $className = get_called_class();
        return new $className($methodName);
    }

    public function __toString(){
        return $this->m_valueName;
    }

}

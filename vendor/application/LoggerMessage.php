<?php
/**
 * Created by IntelliJ IDEA.
 * User: suver
 * Date: 02.10.16
 * Time: 8:42
 */

namespace vendor\application;

class LoggerMessage {

    public $type;
    public $string;

    public function __construct($type, $string) {
        $this->type = $type;
        $this->string = $string;
    }

    public function getOfString() {
        if(is_string($this->string)) {
            return $this->string;
        }
        else if(is_array($this->string)) {
            return implode("\n", $this->string);
        }
        else {
            throw new \Exception("Incorect loger string type");
        }
    }

}
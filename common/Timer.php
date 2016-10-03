<?php
/**
 * Created by IntelliJ IDEA.
 * User: suver
 * Date: 02.10.16
 * Time: 6:13
 */
namespace common;


class Timer {

    public $start = 0;
    public $stop = 0;

    public function start() {
        $this->start = microtime(true);
        $this->stop  = 0;
    }

    public function stop() {
        $this->stop = microtime(true);
    }

    public function reset() {
        $this->start   = 0;
        $this->stop    = 0;
    }

    function compare() {
        return round($this->stop - $this->start, 5);
    }
}
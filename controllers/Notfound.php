<?php
/**
 * Created by IntelliJ IDEA.
 * User: suver
 * Date: 02.10.16
 * Time: 15:30
 */

namespace controllers;

use vendor\web\Logger;

class Notfound {

    public function index() {
        return Logger::error('Page Not Found')->show();
    }

}
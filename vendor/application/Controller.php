<?php
/**
 * Created by IntelliJ IDEA.
 * User: suver
 * Date: 02.10.16
 * Time: 11:32
 */

namespace vendor\application;

use vendor\web\Applicaton;
use vendor\views\Render;

class Controller extends Applicaton {

    public $layout = 'main';

    public function render($path, $params=[]) {

        $render = Render::getInstanse();
        $content = $render->partial('@views/' . $path . '.php', $params);
        $layout = $render->partial('@layouts/' . $this->layout . '.php', ['content' => $content]);
        return $layout;

    }

    public function refresh() {
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit;
    }

    public function redirect($url) {
        header('Location: ' . $url);
        exit;
    }

}
<?php
/**
 * Created by IntelliJ IDEA.
 * User: suver
 * Date: 02.10.16
 * Time: 15:29
 */

namespace vendor\views;

use vendor\web\Applicaton;

class Render {

    protected static $instance;


    public function getInstanse() {
        if(!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function partial($path, $param=[]) {
        ob_start();

            extract($param, EXTR_SKIP);
            if(strncmp($path, '@', 1) === 0) {
                if(file_exists(Applicaton::getAlias($path))) {
                    include_once Applicaton::getAlias($path);
                }
                else {
                    throw new \Exception('Partial alias views "'.Applicaton::getAlias($path) . '" not found');
                }
            }
            else {
                if (file_exists(Applicaton::getAlias('@views/' . $path))) {
                    include_once Applicaton::getAlias('@views/' . $path);
                }
                else {
                    throw new \Exception('Partial views "'.Applicaton::getAlias('@views/' . $path) . '" not found');
                }
            }
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

}
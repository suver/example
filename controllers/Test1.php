<?php
/**
 * Created by IntelliJ IDEA.
 * User: suver
 * Date: 02.10.16
 * Time: 15:30
 */

namespace controllers;

use vendor\application\Controller;
use vendor\web\Applicaton;

class Test1 extends Controller {

    public function index() {

        $errors = [];
        if(!empty($_POST['col'])) {
            foreach ($_POST['col'] as $key=>$value) {
                if(!empty($value)) {
                    list($y, $x) = explode('x', $key);

                    if (!is_numeric($value) || $value < 1 || $value > 99999) {
                        $errors[$key] = "Ячейка с координатами $y, $x не является числом в диапазоне от 1 до 99999";
                    }
                }
            }
        }


        $data = [];
        $sql = 'SELECT * FROM matrix';
        foreach (Applicaton::$app->db->query($sql) as $row) {
            $data[$row['y']][$row['x']] = $row['value'];
        }

        if(!empty($_POST['col']) && !$errors) {
            foreach ($_POST['col'] as $key=>$value) {
                list($y, $x) = explode('x', $key);

                if (!empty($value) && empty($data[$y][$x])) {
                    $sql = "INSERT INTO `matrix` SET `x`=$x, `y`=$y, `value`=$value";
                    Applicaton::$app->db->query($sql);
                }
                else if (!empty($value) && isset($data[$y]) && isset($data[$y][$x]) && $data[$y][$x] != $value) {
                    $sql = "UPDATE FROM `matrix` SET `value`=$value WHERE `x`=$x AND `y`=$y";
                    Applicaton::$app->db->query($sql);
                }
                else if (isset($data[$y]) && isset($data[$y][$x]) && !empty($data[$y][$x]) && empty($value)) {
                    $sql = "DELETE FROM `matrix` WHERE `x`=$x AND`y`=$y\n";
                    Applicaton::$app->db->query($sql);
                }
            }

            $this->refresh();
        }

        return $this->render('test1/index', ['data' => $data, 'errors' => $errors]);
    }

}
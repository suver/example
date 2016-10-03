<?php
/**
 * Created by IntelliJ IDEA.
 * User: suver
 * Date: 02.10.16
 * Time: 15:30
 */

namespace controllers;

use common\Example1;
use common\Example2;
use common\Example3;
use common\Example4;
use common\Timer;
use vendor\application\Controller;

class Test2 extends Controller {

    public function index() {

        return $this->render('test2/index', ['data' => 'Проверка']);
    }

    public function example1($render=true) {

        set_time_limit (120);

        $data = [];

        $timer = new Timer();
        $timer->start();

        /** Алгоритм 1 */
        $crop = $this->generator();
        $data['crop_count'] = count($crop);

        List($d1_index, $d2_index, $d_value) = Example1::run($crop);

        $timer->stop();
        $compare = $timer->compare();
        $data['compare'] = $compare;
        $data['dublicate_index'] = $d1_index;
        $data['dublicate_value'] = $d_value;
        $data['dublicate2_index'] = $d2_index;

        if($render) {
            return $this->render('test2/example1', $data);
        }
        else {
            return $data;
        }
    }

    public function example2($render=true)
    {

        set_time_limit(120);

        $data = [];

        $timer = new Timer();
        $timer->start();

        /** Алгоритм 1 */
        $crop = $this->generator();
        $data['crop_count'] = count($crop);

        List($d1_index, $d2_index, $d_value) = Example2::run($crop);

        $timer->stop();
        $compare = $timer->compare();
        $data['compare'] = $compare;
        $data['dublicate_index'] = $d1_index;
        $data['dublicate_value'] = $d_value;
        $data['dublicate2_index'] = $d2_index;

        if ($render) {
            return $this->render('test2/example2', $data);
        } else {
            return $data;
        }
    }

    public function example3($render=true) {

        set_time_limit (500);

        $data = [];

        $timer = new Timer();
        $timer->start();

        /** Алгоритм 1 */
        $crop = $this->generator();
        $data['crop_count'] = count($crop);

        /**
         *  УЖАСНО ДОЛГО
         */
        List($d1_index, $d2_index, $d_value) = Example3::run($crop);

        $timer->stop();
        $compare = $timer->compare();
        $data['compare'] = $compare;
        $data['dublicate_index'] = $d1_index;
        $data['dublicate_value'] = $d_value;
        $data['dublicate2_index'] = $d2_index;

        if($render) {
            return $this->render('test2/example3', $data);
        }
        else {
            return $data;
        }
    }


    public function example4($render=true) {

        set_time_limit (500);

        $data = [];

        $timer = new Timer();
        $timer->start();

        /** Алгоритм 1 */
        $crop = $this->generator();
        $data['crop_count'] = count($crop);

        List($d1_index, $d2_index, $d_value) = Example4::run($crop);

        $timer->stop();
        $compare = $timer->compare();
        $data['compare'] = $compare;
        $data['dublicate_index'] = $d1_index;
        $data['dublicate_value'] = $d_value;
        $data['dublicate2_index'] = $d2_index;

        if($render) {
            return $this->render('test2/example4', $data);
        }
        else {
            return $data;
        }
    }


    /**
     * Генерируем массив даннных
     * @return array
     */
    protected function generator() {
        $maxElemt = 1000000;

        $more = true;
        $data = [];
        $i = 0;
        do {
            $number = rand(0, 4294967296);
            $data[$number] = $i++;
            if(count($data) >= $maxElemt) {
                $more = false;
            }
        } while($more);
        $data = array_flip($data);

        $k1 = rand(0, $maxElemt);
        $k2 = rand(0, $maxElemt);

        $data[$k1] = $data[$k2];

        return $data;
    }

}
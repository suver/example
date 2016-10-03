<?php
/**
 * Created by IntelliJ IDEA.
 * User: suver
 * Date: 02.10.16
 * Time: 11:01
 */

namespace vendor\db;


class Db extends \PDO
{
    public function __construct($config)
    {
        $dns = $config['driver'] .
            ':host=' . $config['host'] .
            ((!empty($config['port'])) ? (';port=' . $config['port']) : '') .
            ';dbname=' . $config['schema'];

        parent::__construct($dns, $config['username'], $config['password']);
    }
}
<?php
ini_set('display_errors', 'on');

try {
    $mysql = new mysqli('dnmp.mysql', 'root', '123456', 'mysql');
    if ($mysql->connect_error) {
        die('Connect Error (' . $db->connect_errno . ') ' . $mysqli->connect_error);
    }
    $mysql->close();
    echo "hello docker mysql！<br/>";
} catch (Exception $exception) {
    echo $exception->getMessage()."<br/>";
}

try {
    $redis = new Redis();
    $redis->connect('dnmp.redis', 6379);
    $redis->set('test', 'hello docker redis！');
    echo $redis->get('test')."<br/>";
} catch (Exception $exception) {
    echo $exception->getMessage()."<br/>";
}

try {
    $memcached = new Memcached('mc');
    $memcached->addServer('dnmp.memcached', '11211');
    $redis->set('test', 'hello docker memcached！');
    echo $redis->get('test')."<br/>";
} catch (Exception $exception) {
    echo $exception->getMessage()."<br/>";
}
<?php
ini_set('display_errors', 'on');

$redis = new Redis();
$redis->connect('dnmp.redis', 6379);
$redis->set('test', 'hello docker redis');
echo $redis->get('test');
$redis->set('test', 'hello docker redis1111111111111');
echo $redis->get('test');
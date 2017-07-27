<?php
$serv->on('WorkerExit', function (swoole_server $serv, $worker_id) {
    $redisState = $serv->redis->getState();
    if ($redisState == Swoole\Redis::STATE_READY or $redisState == Swoole\Redis::STATE_SUBSCRIBE) {
        $serv->redis->close();
    }
});

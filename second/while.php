<?php
$serv = new swoole_server("127.0.0.1", 9501);
$serv->on('receive', function ($serv, $fd, $from_id, $data) {
    while(1)
    {
        $i++;
    }
    $serv->send($fd, 'swoole: ' . $data);
});
$serv->start();

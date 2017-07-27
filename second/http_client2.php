<?php
$cli = new swoole_http_client('127.0.0.1', 80);
$cli->setHeaders(['User-Agent' => "swoole"]);

$cli->post('/dump.php', array("test" => 'abc'), function ($cli) {
    echo $cli->body;
});

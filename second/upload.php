<?php
$cli = new swoole_http_client('127.0.0.1', 80);

$cli->addFile(__DIR__.'/post.data', 'post');
$cli->addFile(dirname(__DIR__).'/test.jpg', 'debug');

$cli->post('/dump2.php', array("xxx" => 'abc', 'x2' => 'rango'), function ($cli) {
    echo $cli->body;
    $cli->close();
});

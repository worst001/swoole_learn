<?php
$cli = new Swoole\Http\Client('127.0.0.1', 80);
$cli->set(array(
    "timeout" => 3.0, //设置连接和请求的超时时间为3秒
));
$cli->setHeaders(array('User-Agent' => 'swoole-http-client'));
$cli->setCookies(array('test' => 'value'));

$cli->post('/dump.php', array("test" => 'abc'), function ($cli) {
    if (empty($cli->body)) {
        if ($cli->statusCode == -1) {
            echo "连接服务器超时\n";
        } else if ($cli->statusCode == -2) {
            echo "服务器响应超时\n";
        }
    } else {
        echo "请求成功：HTML=".$cli->body;
    }
});

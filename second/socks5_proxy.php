<?php
$cli = new swoole_http_client('127.0.0.1', 80);

$cli->set(array(
    'socks5_host'     =>  '192.168.1.100',
    'socks5_port'     =>  1080,
    'socks5_username' => 'username', //用户名和密码为可选项
    'socks5_password' => 'password',
));

$cli->setHeaders(['User-Agent' => "swoole"]);

$cli->get('/index.php', function ($cli) {
    file_put_contents(__DIR__.'/t.html', $cli->body);
});

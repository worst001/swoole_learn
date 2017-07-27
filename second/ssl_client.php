<?php
$cli = new swoole_http_client('127.0.0.1', 80, true);
//如果服务器需要提供SSL证书
$cli->set(array(
    'ssl_cert_file' => $certFile,
    'ssl_key_file' => $keyFile,
));

$cli->setHeaders(['User-Agent' => "swoole"]);

$cli->get('/index.php', function ($cli) {
    file_put_contents(__DIR__.'/t.html', $cli->body);
});

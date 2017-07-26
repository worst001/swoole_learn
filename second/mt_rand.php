<?php
mt_rand(0, 1);
//开始
$worker_num = 16;

// fork 进程
for ($i = 0; $i < $worker_num; $i++) {
    $process = new swoole_process('child_async', false, 2);
    $pid = $process->start();
}

//异步执行进程
function child_async(swoole_process $worker)
{
    mt_srand();
    echo mt_rand(0, 100).PHP_EOL;
    $worker->exit();
}

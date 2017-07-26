<?php
if (ENV == 'php') {
    exit();
} else {
    throw new Swoole\ExitException();
}

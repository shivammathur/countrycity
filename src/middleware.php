<?php
// Application middleware

use Slim\HttpCache\Cache;
$app->add(new Cache('public', 86400));

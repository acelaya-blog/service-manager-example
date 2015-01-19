<?php
use League\Flysystem\Adapter\Local;

return [
    'dir' => __DIR__ . '/../var/log',
    'filename' => 'activity.log',
    'adapter' => Local::class
];

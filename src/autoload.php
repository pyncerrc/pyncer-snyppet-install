<?php
use Pyncer\Snyppet\SnyppetManager;
use Pyncer\Snyppet\Snyppet;

SnyppetManager::register(new Snyppet(
    'install',
    dirname(__DIR__),
    [
        'initialize' => ['Initialize']
    ],
));

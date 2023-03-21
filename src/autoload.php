<?php
use Pyncer\Snyppet\Snyppet;
use Pyncer\Snyppet\SnyppetManager;

SnyppetManager::register(new Snyppet(
    'install',
    dirname(__DIR__),
    [
        'initialize' => ['Initialize']
    ],
));

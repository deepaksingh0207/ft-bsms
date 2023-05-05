<?php
$baseDir = dirname(dirname(__FILE__));

return [
    'plugins' => [
        'Acl' => $baseDir . '/vendor/cakephp/acl/',
        'Api' => $baseDir . '/plugins/Api/',
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'BootstrapUI' => $baseDir . '/vendor/friendsofcake/bootstrap-ui/',
        'CakeLte' => $baseDir . '/vendor/arodu/cakelte/',
        'Cake/TwigView' => $baseDir . '/vendor/cakephp/twig-view/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/',
    ],
];

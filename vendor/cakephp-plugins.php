<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'Cake/Localized' => $baseDir . '/vendor/cakephp/localized/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/'
    ]
];
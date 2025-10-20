<?php

defined('MOODLE_INTERNAL') || die();

$addons = [
    'block_gumilar' => [
        'handlers' => [
            'gumilar' => [
                'delegate' => 'CoreBlockDelegate',
                'method' => 'view_gumilar',
                'displaydata' => [
                    'title' => 'Gumilar Block',
                    'icon' => 'home',
                ],
            ],
        ],
        'lang' => [
            ['hello', 'block_gumilar'],
            ['welcome_message', 'block_gumilar'],
            ['pluginname', 'block_gumilar'],
        ],
    ],
];

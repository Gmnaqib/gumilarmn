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
            ['welcome_message', 'block_gumilar'],
            ['pluginname', 'block_gumilar'],
            ['data_list', 'block_gumilar'],
            ['view_data', 'block_gumilar'],
            ['item_title', 'block_gumilar'],
            ['item_description', 'block_gumilar'],
            ['back_to_main', 'block_gumilar'],
        ],
    ],
];

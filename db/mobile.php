<?php

defined('MOODLE_INTERNAL') || die();

$addons = [
    'block_gumilar' => [
        'handlers' => [
            'gumilar' => [
                'delegate' => 'CoreBlockDelegate',
                'method' => 'view_gumilar',
                'displaydata' => [
                    'title' => 'gumilar',
                    'icon' => 'fas-home', // Icon untuk dashboard
                    'class' => 'block_gumilar',
                ],
                'priority' => 100,
                'fallback' => true, // Support fallback untuk web view
            ],
        ],
        'lang' => [
            ['hello', 'block_gumilar'],
            ['welcome_message', 'block_gumilar'],
            ['pluginname', 'block_gumilar'],
        ],
        'styles' => [
            [
                'url' => 'mobile.css',
                'version' => '1.0'
            ]
        ]
    ],
];

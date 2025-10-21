<?php

defined('MOODLE_INTERNAL') || die();

$addons = array(
    "block_gumilar" => array(
        "handlers" => array(
            'blockcontent' => array(
                'displaydata' => array(
                    'title' => 'pluginname',
                    'icon' => 'home',
                    'class' => ''
                ),
                'delegate' => 'CoreBlockDelegate',
                'method' => 'mobile_block_view'
            )
        ),
        'lang' => array(
            array('pluginname', 'block_gumilar')
        )
    )
);

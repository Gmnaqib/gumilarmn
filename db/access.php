<?php

defined('MOODLE_INTERNAL') || die();

$capabilities = array(
    'block/gumilar:addinstance' => array(
        'riskbitmask' => RISK_SPAM | RISK_XSS,
        'captype' => 'write',
        'contextlevel' => CONTEXT_BLOCK,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW,
            'admin' => CAP_ALLOW,
            'user' => CAP_ALLOW
        ),
        'clonepermissionsfrom' => 'moodle/site:manageblocks'
    ),

    'block/gumilar:myaddinstance' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'user' => CAP_ALLOW
        ),
        'clonepermissionsfrom' => 'moodle/my:manageblocks'
    ),
);

<?php

namespace block_gumilar\output;

defined('MOODLE_INTERNAL') || die();

class mobile
{
    /**
     * Render block untuk Moodle Mobile App
     */
    public static function view_gumilar($args)
    {
        global $OUTPUT, $USER;

        $data = [
            'username' => fullname($USER),
            'hello' => get_string('hello', 'block_gumilar'),
            'welcome' => get_string('welcome_message', 'block_gumilar'),
        ];

        return [
            'templates' => [
                [
                    'id' => 'main',
                    'html' => '
                        <ion-card>
                            <ion-card-header>
                                <ion-card-title>{{ "plugin.block_gumilar.hello" | translate }}</ion-card-title>
                            </ion-card-header>
                            <ion-card-content>
                                <p>{{ "plugin.block_gumilar.welcome_message" | translate }}</p>
                                <p><strong>User: {{ username }}</strong></p>
                            </ion-card-content>
                        </ion-card>
                    ',
                ],
            ],
            'javascript' => '',
            'otherdata' => $data,
            'files' => []
        ];
    }
}

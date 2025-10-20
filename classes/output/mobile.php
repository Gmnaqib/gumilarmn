<?php

namespace block_gumilar\output;

defined('MOODLE_INTERNAL') || die();

class mobile
{
    /**
     * Render block untuk Moodle Mobile App
     */
    public static function view_gumilar()
    {
        return [
            'templates' => [
                [
                    'id' => 'main',
                    'html' => '
                        <div class="block-gumilar">
                            <p>{{ "plugin.block_gumilar.welcome_message" | translate }}</p>
                        </div>
                    ',
                ],
            ],
        ];
    }
}

<?php

namespace block_gumilar\output;

defined('MOODLE_INTERNAL') || die();

class mobile
{

    public static function mobile_block_view($args)
    {

        $html = '<ion-card>';
        $html .= '<ion-card-header>';
        $html .= '<ion-card-title>Gumilar Data List</ion-card-title>';
        $html .= '</ion-card-header>';
        $html .= '<ion-card-content>';

        for ($i = 1; $i <= 10; $i++) {
            $html .= '<ion-item>';
            $html .= '<ion-label>';
            $html .= '<h2>Data Item ' . $i . '</h2>';
            $html .= '<p>This is dummy data content number ' . $i . ' for Gumilar block.</p>';
            $html .= '</ion-label>';
            $html .= '</ion-item>';
        }

        $html .= '</ion-card-content>';
        $html .= '</ion-card>';

        return array(
            'templates' => array(
                array(
                    'id' => 'main',
                    'html' => $html
                )
            ),
            'javascript' => '',
            'otherdata' => '',
            'files' => array()
        );
    }
}

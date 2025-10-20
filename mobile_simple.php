<?php

namespace block_gumilar\output;

defined('MOODLE_INTERNAL') || die();

class mobile
{
    /**
     * Render block untuk Moodle Mobile App - Simple Version
     */
    public static function view_gumilar()
    {
        // Simple HTML without complex JavaScript or templating
        $html = '<div style="padding:15px;border:1px solid #ddd;border-radius:8px;margin:10px;">';
        $html .= '<h4 style="text-align:center;color:#333;">Gumilar Block</h4>';
        $html .= '<p style="text-align:center;margin:10px 0;">Selamat datang di Block Gumilar!</p>';

        $html .= '<div style="background:#f0f0f0;padding:10px;border-radius:5px;margin:10px 0;">';
        $html .= '<h5 style="margin:5px 0;color:#333;">Daftar Data:</h5>';

        // Static data list
        for ($i = 1; $i <= 10; $i++) {
            $status = ($i % 2 == 0) ? 'Active' : 'Inactive';
            $date = date('d M Y', strtotime('-' . $i . ' days'));

            $html .= '<div style="background:white;border:1px solid #ccc;border-radius:4px;padding:10px;margin:5px 0;">';
            $html .= '<strong>Data Item ' . $i . '</strong><br>';
            $html .= '<small>ID: ' . $i . ' | ' . $date . ' | ' . $status . '</small><br>';
            $html .= 'Deskripsi untuk item nomor ' . $i;
            $html .= '</div>';
        }

        $html .= '</div>';
        $html .= '</div>';

        return [
            'templates' => [
                [
                    'id' => 'main',
                    'html' => $html,
                ],
            ],
        ];
    }
}

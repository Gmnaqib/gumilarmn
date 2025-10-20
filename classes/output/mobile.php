<?php

namespace block_gumilar\output;

defined('MOODLE_INTERNAL') || die();

class mobile
{
    /**
     * Render block untuk Moodle Mobile App - Block View
     */
    public static function view_gumilar()
    {
        // Generate 10 dummy data items
        $dummyData = [];
        for ($i = 1; $i <= 10; $i++) {
            $dummyData[] = [
                'id' => $i,
                'title' => 'Data Item ' . $i,
                'description' => 'Deskripsi untuk item nomor ' . $i,
                'date' => date('d M Y', strtotime('-' . $i . ' days')),
                'status' => ($i % 2 == 0) ? 'Active' : 'Inactive',
            ];
        }

        $html = '<div class="block-gumilar" style="padding:15px;border:1px solid #ddd;border-radius:8px;margin:10px;">';
        $html .= '<h4 style="text-align:center;margin:0 0 10px 0;color:#333;">{{ "plugin.block_gumilar.pluginname" | translate }}</h4>';
        $html .= '<p style="text-align:center;margin:0 0 15px 0;">{{ "plugin.block_gumilar.welcome_message" | translate }}</p>';

        $html .= '<button onclick="toggleData()" style="width:100%;padding:10px;background:#007cba;color:white;border:none;border-radius:4px;margin-bottom:15px;">{{ "plugin.block_gumilar.view_data" | translate }}</button>';

        $html .= '<div id="dataList" style="display:none;">';
        $html .= '<h5 style="margin:10px 0;color:#333;">{{ "plugin.block_gumilar.data_list" | translate }}</h5>';

        foreach ($dummyData as $item) {
            $html .= '<div style="background:#f8f9fa;border:1px solid #dee2e6;border-radius:6px;padding:12px;margin-bottom:10px;">';
            $html .= '<div style="font-weight:bold;color:#333;margin-bottom:5px;">' . htmlspecialchars($item['title']) . '</div>';
            $html .= '<div style="font-size:0.85em;color:#666;margin-bottom:8px;">ID: ' . $item['id'] . ' | ' . $item['date'] . ' | ' . $item['status'] . '</div>';
            $html .= '<div style="font-size:0.9em;line-height:1.4;color:#555;">' . htmlspecialchars($item['description']) . '</div>';
            $html .= '</div>';
        }

        $html .= '<button onclick="toggleData()" style="width:100%;padding:8px;background:#6c757d;color:white;border:none;border-radius:4px;">{{ "plugin.block_gumilar.back_to_main" | translate }}</button>';
        $html .= '</div>';
        $html .= '</div>';

        return [
            'templates' => [
                [
                    'id' => 'main',
                    'html' => $html,
                ],
            ],
            'javascript' => 'function toggleData(){var d=document.getElementById("dataList");d.style.display=d.style.display=="none"?"block":"none";}',
        ];
    }
}

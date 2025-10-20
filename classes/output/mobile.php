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
        // Generate 10 dummy data items for display within the block
        $dummyData = [];
        for ($i = 1; $i <= 10; $i++) {
            $dummyData[] = [
                'id' => $i,
                'title' => 'Data Item ' . $i,
                'description' => 'Ini adalah deskripsi untuk item data nomor ' . $i . '. Data ini berisi informasi dummy untuk testing mobile app.',
                'date' => date('d M Y', strtotime('-' . $i . ' days')),
                'status' => ($i % 2 == 0) ? 'Active' : 'Inactive',
            ];
        }

        return [
            'templates' => [
                [
                    'id' => 'main',
                    'html' => '
                        <div class="block-gumilar" style="padding: 15px; border: 1px solid #ddd; border-radius: 8px; margin: 10px;">
                            <h4 style="margin: 0 0 10px 0; color: #333; text-align: center;">{{ "plugin.block_gumilar.pluginname" | translate }}</h4>
                            <p style="margin: 0 0 15px 0; text-align: center;">{{ "plugin.block_gumilar.welcome_message" | translate }}</p>
                            
                            <button id="showDataBtn" 
                                    style="width: 100%; padding: 10px; background: #007cba; color: white; border: none; border-radius: 4px; margin-bottom: 15px; cursor: pointer;">
                                {{ "plugin.block_gumilar.view_data" | translate }}
                            </button>
                            
                            <div id="dataListContainer" style="display: none;">
                                <h5 style="margin: 0 0 10px 0; color: #333;">{{ "plugin.block_gumilar.data_list" | translate }}</h5>
                                {{#dummyData}}
                                <div style="background: #f8f9fa; border: 1px solid #dee2e6; border-radius: 6px; padding: 12px; margin-bottom: 10px;">
                                    <div style="font-weight: bold; color: #333; margin-bottom: 5px;">{{title}}</div>
                                    <div style="font-size: 0.85em; color: #666; margin-bottom: 8px;">ID: {{id}} | {{date}} | Status: {{status}}</div>
                                    <div style="font-size: 0.9em; line-height: 1.4; color: #555;">{{description}}</div>
                                </div>
                                {{/dummyData}}
                                <button id="hideDataBtn" 
                                        style="width: 100%; padding: 8px; background: #6c757d; color: white; border: none; border-radius: 4px; margin-top: 10px;">
                                    {{ "plugin.block_gumilar.back_to_main" | translate }}
                                </button>
                            </div>
                        </div>
                    ',
                ],
            ],
            'javascript' => '
                document.addEventListener("DOMContentLoaded", function() {
                    const showBtn = document.getElementById("showDataBtn");
                    const hideBtn = document.getElementById("hideDataBtn");
                    const dataContainer = document.getElementById("dataListContainer");
                    
                    if (showBtn && hideBtn && dataContainer) {
                        showBtn.addEventListener("click", function() {
                            showBtn.style.display = "none";
                            dataContainer.style.display = "block";
                        });
                        
                        hideBtn.addEventListener("click", function() {
                            dataContainer.style.display = "none";
                            showBtn.style.display = "block";
                        });
                    }
                });
            ',
            'otherdata' => [
                'dummyData' => $dummyData,
            ],
        ];
}

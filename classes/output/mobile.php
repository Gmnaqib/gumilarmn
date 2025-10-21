<?php

namespace block_gumilar\output;

defined('MOODLE_INTERNAL') || die();

class mobile
{
    /**
     * Render block sederhana dengan toggle data - no navigation
     */
    public static function view_gumilar()
    {
        // Generate 10 dummy data items
        $dummyData = [];
        for ($i = 1; $i <= 10; $i++) {
            $dummyData[] = [
                'id' => $i,
                'title' => 'Data Item ' . $i,
                'description' => 'Ini adalah deskripsi untuk item data nomor ' . $i . '. Data ini berisi informasi dummy untuk testing mobile app.',
                'date' => date('d M Y', strtotime('-' . $i . ' days')),
                'status' => ($i % 2 == 0) ? 'Active' : 'Inactive',
                'statusColor' => ($i % 2 == 0) ? '#28a745' : '#ffc107',
            ];
        }

        return [
            'templates' => [
                [
                    'id' => 'main',
                    'html' => '
                        <div style="background: #fff; border: 1px solid #ddd; border-radius: 8px; margin: 10px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                            <div id="blockHeader" onclick="toggleDataView()" style="padding: 15px; cursor: pointer; display: flex; align-items: center; justify-content: space-between;">
                                <div style="display: flex; align-items: center;">
                                    <div style="width: 40px; height: 40px; background: #007cba; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                                        <span style="color: white; font-size: 18px;">📋</span>
                                    </div>
                                    <div>
                                        <h3 style="margin: 0; color: #333; font-size: 16px; font-weight: 600;">{{ "plugin.block_gumilar.pluginname" | translate }}</h3>
                                        <p style="margin: 2px 0 0 0; color: #666; font-size: 13px;">{{ "plugin.block_gumilar.welcome_message" | translate }}</p>
                                    </div>
                                </div>
                                <div id="arrowIcon" style="color: #ccc; font-size: 18px;">❯</div>
                            </div>
                            
                            <div id="dataListContainer" style="display: none; padding: 0 15px 15px 15px; border-top: 1px solid #eee; background: #f8f9fa;">
                                <div style="padding: 15px 0 10px 0;">
                                    <h4 style="margin: 0; color: #333; font-size: 16px;">{{ "plugin.block_gumilar.data_list" | translate }}</h4>
                                    <p style="margin: 5px 0 0 0; color: #666; font-size: 12px;">Total: {{dataCount}} items</p>
                                </div>
                                
                                {{#dummyData}}
                                <div style="background: #fff; border-radius: 6px; padding: 12px; margin-bottom: 10px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                                    <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 6px;">
                                        <h5 style="margin: 0; color: #333; font-size: 14px; font-weight: 600;">{{title}}</h5>
                                        <span style="background: {{statusColor}}; color: white; padding: 2px 6px; border-radius: 10px; font-size: 10px;">{{status}}</span>
                                    </div>
                                    <p style="margin: 0 0 6px 0; color: #666; font-size: 11px;">ID: {{id}} | {{date}}</p>
                                    <p style="margin: 0; color: #888; font-size: 12px; line-height: 1.3;">{{description}}</p>
                                </div>
                                {{/dummyData}}
                                
                                <div style="text-align: center; padding: 10px 0;">
                                    <button onclick="toggleDataView()" style="background: #6c757d; color: white; border: none; padding: 8px 16px; border-radius: 4px; font-size: 12px;">
                                        {{ "plugin.block_gumilar.back_to_main" | translate }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    ',
                ],
            ],
            'javascript' => '
                var isDataVisible = false;
                
                function toggleDataView() {
                    var container = document.getElementById("dataListContainer");
                    var arrow = document.getElementById("arrowIcon");
                    
                    if (container && arrow) {
                        if (isDataVisible) {
                            container.style.display = "none";
                            arrow.innerHTML = "❯";
                            arrow.style.transform = "rotate(0deg)";
                            isDataVisible = false;
                        } else {
                            container.style.display = "block";
                            arrow.innerHTML = "❮";
                            arrow.style.transform = "rotate(90deg)";
                            isDataVisible = true;
                        }
                    }
                }
                
                // Auto-execute when loaded
                document.addEventListener("DOMContentLoaded", function() {
                    console.log("Gumilar Block loaded successfully");
                });
            ',
            'otherdata' => [
                'dummyData' => $dummyData,
                'dataCount' => count($dummyData),
            ],
        ];
    }

    /**
     * Halaman data list yang akan dibuka setelah klik block
     */
    public static function view_gumilar_data()
    {
        // Generate 10 dummy data items
        $dummyData = [];
        for ($i = 1; $i <= 10; $i++) {
            $dummyData[] = [
                'id' => $i,
                'title' => 'Data Item ' . $i,
                'description' => 'Ini adalah deskripsi untuk item data nomor ' . $i . '. Data ini berisi informasi dummy untuk testing mobile app.',
                'date' => date('d M Y', strtotime('-' . $i . ' days')),
                'status' => ($i % 2 == 0) ? 'Active' : 'Inactive',
                'icon' => ($i % 3 == 0) ? 'document-text' : (($i % 2 == 0) ? 'checkmark-circle' : 'time'),
                'color' => ($i % 3 == 0) ? '#28a745' : (($i % 2 == 0) ? '#007cba' : '#ffc107'),
            ];
        }

        return [
            'templates' => [
                [
                    'id' => 'main',
                    'html' => '
                        <ion-header>
                            <ion-toolbar color="primary">
                                <ion-buttons slot="start">
                                    <ion-back-button></ion-back-button>
                                </ion-buttons>
                                <ion-title>{{ "plugin.block_gumilar.data_list" | translate }}</ion-title>
                            </ion-toolbar>
                        </ion-header>

                        <ion-content class="ion-padding">
                            <div style="text-align: center; margin-bottom: 20px;">
                                <ion-icon name="list" style="font-size: 48px; color: #007cba; margin-bottom: 10px;"></ion-icon>
                                <h2 style="margin: 0; color: #333;">{{ "plugin.block_gumilar.data_list" | translate }}</h2>
                                <p style="color: #666; margin: 5px 0 0 0;">Total: {{dataCount}} items</p>
                            </div>

                            <ion-list style="background: transparent;">
                                {{#dummyData}}
                                <ion-item style="--background: #fff; --border-radius: 12px; margin-bottom: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                                    <ion-icon name="{{icon}}" slot="start" style="color: {{color}}; font-size: 24px;"></ion-icon>
                                    <ion-label>
                                        <h2 style="color: #333; font-weight: 600; margin: 0 0 5px 0;">{{title}}</h2>
                                        <p style="color: #666; margin: 0 0 5px 0; font-size: 0.85em;">ID: {{id}} | {{date}} | Status: {{status}}</p>
                                        <p style="color: #888; margin: 0; font-size: 0.8em; line-height: 1.3;">{{description}}</p>
                                    </ion-label>
                                    <ion-badge slot="end" color="{{status}}" style="--background: {{color}};">{{status}}</ion-badge>
                                </ion-item>
                                {{/dummyData}}
                            </ion-list>

                            <div style="text-align: center; margin-top: 30px; padding: 20px;">
                                <ion-icon name="checkmark-circle" style="color: #28a745; font-size: 32px; margin-bottom: 10px;"></ion-icon>
                                <p style="color: #666; margin: 0;">Data berhasil dimuat</p>
                            </div>
                        </ion-content>
                    ',
                ],
            ],
            'otherdata' => [
                'dummyData' => $dummyData,
                'dataCount' => count($dummyData),
            ],
        ];
    }
}

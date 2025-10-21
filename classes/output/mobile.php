<?php

namespace block_gumilar\output;

defined('MOODLE_INTERNAL') || die();

class mobile
{
    /**
     * Render block seperti Komentar - clickable untuk ke halaman data
     */
    public static function view_gumilar()
    {
        return [
            'templates' => [
                [
                    'id' => 'main',
                    'html' => '
                        <core-dynamic-component [component]="componentName" [data]="data">
                            <ion-item button (click)="openDataPage()" style="--background: #fff; --border-radius: 8px; margin: 10px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                                <ion-icon name="list-outline" slot="start" style="color: #007cba; font-size: 24px;"></ion-icon>
                                <ion-label>
                                    <h2 style="color: #333; font-weight: 600; margin: 0;">{{ "plugin.block_gumilar.pluginname" | translate }}</h2>
                                    <p style="color: #666; margin: 5px 0 0 0; font-size: 0.9em;">{{ "plugin.block_gumilar.welcome_message" | translate }}</p>
                                </ion-label>
                                <ion-icon name="chevron-forward" slot="end" style="color: #ccc;"></ion-icon>
                            </ion-item>
                        </core-dynamic-component>
                    ',
                ],
            ],
            'javascript' => '
                function openDataPage() {
                    // Navigate ke halaman data
                    CoreNavigator.navigateToSitePath("/main/gumilardata");
                }
            ',
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

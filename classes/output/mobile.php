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
        return [
            'templates' => [
                [
                    'id' => 'main',
                    'html' => '
                        <div class="block-gumilar" style="padding: 15px; border: 1px solid #ddd; border-radius: 8px; margin: 10px; text-align: center;">
                            <h4 style="margin: 0 0 10px 0; color: #333;">{{ "plugin.block_gumilar.pluginname" | translate }}</h4>
                            <p style="margin: 0 0 15px 0;">{{ "plugin.block_gumilar.welcome_message" | translate }}</p>
                            <core-site-plugins-new-content 
                                component="block_gumilar" 
                                method="view_gumilar_list"
                                class="btn btn-primary"
                                style="width: 100%; padding: 10px; background: #007cba; color: white; border: none; border-radius: 4px; cursor: pointer; display: inline-block; text-decoration: none;">
                                {{ "plugin.block_gumilar.view_data" | translate }}
                            </core-site-plugins-new-content>
                        </div>
                    ',
                ],
            ],
        ];
    }

    /**
     * Render halaman data list untuk Moodle Mobile App
     */
    public static function view_gumilar_list()
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
            ];
        }

        return [
            'templates' => [
                [
                    'id' => 'main',
                    'html' => '
                        <ion-header>
                            <ion-toolbar>
                                <ion-buttons slot="start">
                                    <ion-back-button></ion-back-button>
                                </ion-buttons>
                                <ion-title>{{ "plugin.block_gumilar.data_list" | translate }}</ion-title>
                            </ion-toolbar>
                        </ion-header>

                        <ion-content class="ion-padding">
                            <div class="data-list">
                                {{#dummyData}}
                                <ion-card style="margin-bottom: 15px;">
                                    <ion-card-header>
                                        <ion-card-title style="font-size: 1.1em; color: #333;">{{title}}</ion-card-title>
                                        <ion-card-subtitle style="color: #666;">ID: {{id}} | {{date}} | Status: {{status}}</ion-card-subtitle>
                                    </ion-card-header>
                                    <ion-card-content>
                                        <p style="margin: 0; line-height: 1.4;">{{description}}</p>
                                    </ion-card-content>
                                </ion-card>
                                {{/dummyData}}
                            </div>
                        </ion-content>
                    ',
                ],
            ],
            'otherdata' => [
                'dummyData' => $dummyData,
            ],
        ];
    }
}

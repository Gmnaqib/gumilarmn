<?php

namespace block_gumilar\output;

defined('MOODLE_INTERNAL') || die();

class mobile
{
    /**
     * Versi paling sederhana - langsung tampilkan semua data
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
                            <!-- Header Block -->
                            <div style="padding: 15px; border-bottom: 1px solid #eee;">
                                <div style="display: flex; align-items: center;">
                                    <div style="width: 40px; height: 40px; background: #007cba; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                                        <span style="color: white; font-size: 18px;">📋</span>
                                    </div>
                                    <div>
                                        <h3 style="margin: 0; color: #333; font-size: 16px; font-weight: 600;">{{ "plugin.block_gumilar.pluginname" | translate }}</h3>
                                        <p style="margin: 2px 0 0 0; color: #666; font-size: 13px;">{{ "plugin.block_gumilar.welcome_message" | translate }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Data List -->
                            <div style="padding: 15px; background: #f8f9fa;">
                                <h4 style="margin: 0 0 15px 0; color: #333; font-size: 16px;">{{ "plugin.block_gumilar.data_list" | translate }} ({{dataCount}} items)</h4>
                                
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
                                
                                <div style="text-align: center; padding: 15px 0 5px 0; border-top: 1px solid #ddd; margin-top: 10px;">
                                    <p style="margin: 0; color: #28a745; font-size: 12px;">✓ Data berhasil dimuat</p>
                                </div>
                            </div>
                        </div>
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

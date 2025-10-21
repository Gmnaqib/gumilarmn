<?php

namespace block_gumilar\output;

defined('MOODLE_INTERNAL') || die();

class mobile
{
    /**
     * Render block seperti Komentar - simple clickable version
     */
    public static function view_gumilar()
    {
        return [
            'templates' => [
                [
                    'id' => 'main',
                    'html' => '
                        <div onclick="showDataList()" style="background: #fff; border: 1px solid #ddd; border-radius: 8px; margin: 10px; padding: 15px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); cursor: pointer;">
                            <div style="display: flex; align-items: center; justify-content: space-between;">
                                <div style="display: flex; align-items: center;">
                                    <div style="width: 40px; height: 40px; background: #007cba; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                                        <span style="color: white; font-size: 18px;">📋</span>
                                    </div>
                                    <div>
                                        <h3 style="margin: 0; color: #333; font-size: 16px; font-weight: 600;">{{ "plugin.block_gumilar.pluginname" | translate }}</h3>
                                        <p style="margin: 2px 0 0 0; color: #666; font-size: 13px;">{{ "plugin.block_gumilar.welcome_message" | translate }}</p>
                                    </div>
                                </div>
                                <div style="color: #ccc; font-size: 18px;">❯</div>
                            </div>
                        </div>
                        
                        <div id="dataListPage" style="display: none; background: #f5f5f5; min-height: 100vh; padding: 20px;">
                            <div style="background: #007cba; color: white; padding: 15px; margin: -20px -20px 20px -20px; display: flex; align-items: center;">
                                <span onclick="hideDataList()" style="margin-right: 15px; font-size: 18px; cursor: pointer;">‹</span>
                                <h2 style="margin: 0; font-size: 18px;">{{ "plugin.block_gumilar.data_list" | translate }}</h2>
                            </div>
                            
                            <div id="dataItems"></div>
                        </div>
                    ',
                ],
            ],
            'javascript' => '
                function showDataList() {
                    const mainView = document.querySelector("[id*=main]").parentElement;
                    const dataPage = document.getElementById("dataListPage");
                    const dataItems = document.getElementById("dataItems");
                    
                    // Generate dummy data
                    let html = "";
                    for (let i = 1; i <= 10; i++) {
                        const status = i % 2 === 0 ? "Active" : "Inactive";
                        const statusColor = i % 2 === 0 ? "#28a745" : "#ffc107";
                        const date = new Date();
                        date.setDate(date.getDate() - i);
                        const dateStr = date.toLocaleDateString("id-ID");
                        
                        html += `
                            <div style="background: #fff; border-radius: 8px; padding: 15px; margin-bottom: 12px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                                <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 8px;">
                                    <h4 style="margin: 0; color: #333; font-size: 16px;">Data Item ${i}</h4>
                                    <span style="background: ${statusColor}; color: white; padding: 4px 8px; border-radius: 12px; font-size: 11px;">${status}</span>
                                </div>
                                <p style="margin: 0 0 8px 0; color: #666; font-size: 13px;">ID: ${i} | ${dateStr}</p>
                                <p style="margin: 0; color: #888; font-size: 14px; line-height: 1.4;">Ini adalah deskripsi untuk item data nomor ${i}. Data ini berisi informasi dummy untuk testing mobile app.</p>
                            </div>
                        `;
                    }
                    
                    dataItems.innerHTML = html;
                    mainView.style.display = "none";
                    dataPage.style.display = "block";
                }
                
                function hideDataList() {
                    const mainView = document.querySelector("[id*=main]").parentElement;
                    const dataPage = document.getElementById("dataListPage");
                    
                    dataPage.style.display = "none";
                    mainView.style.display = "block";
                }
            ',
        ];
    }
}

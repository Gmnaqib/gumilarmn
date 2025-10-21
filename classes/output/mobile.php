<?php

namespace block_gumilar\output;

defined('MOODLE_INTERNAL') || die();

class mobile
{

    public static function mobile_block_view($args)
    {
        // Main container with toggle functionality
        $html = '<div class="gumilar-container">';

        // Header with toggle button (like course cards)
        $html .= '<ion-card class="gumilar-main-card" (click)="toggleDataList()">';
        $html .= '<ion-card-content>';
        $html .= '<div class="gumilar-header">';
        $html .= '<div class="gumilar-icon">';
        $html .= '<ion-icon name="list-outline" color="primary"></ion-icon>';
        $html .= '</div>';
        $html .= '<div class="gumilar-info">';
        $html .= '<h2>Data Gumilar</h2>';
        $html .= '<p>Klik untuk melihat 10 data dummy</p>';
        $html .= '</div>';
        $html .= '<div class="gumilar-action">';
        $html .= '<ion-button fill="clear" size="small" color="primary">';
        $html .= '<ion-icon name="chevron-forward-outline"></ion-icon>';
        $html .= '</ion-button>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</ion-card-content>';
        $html .= '</ion-card>';

        // Hidden data list (similar to course list format)
        $html .= '<div id="dataListContainer" class="data-list-container" style="display: none;">';

        for ($i = 1; $i <= 10; $i++) {
            $statusColor = ($i % 2 == 0) ? 'success' : 'warning';
            $statusText = ($i % 2 == 0) ? 'Aktif' : 'Pending';

            $html .= '<ion-card class="data-item-card">';
            $html .= '<ion-card-content>';
            $html .= '<div class="data-item-header">';
            $html .= '<div class="data-item-icon">';
            $html .= '<ion-icon name="document-text-outline" color="medium"></ion-icon>';
            $html .= '</div>';
            $html .= '<div class="data-item-info">';
            $html .= '<h3>Data Item ' . $i . '</h3>';
            $html .= '<p>Deskripsi untuk data nomor ' . $i . '</p>';
            $html .= '<p class="data-meta">Dibuat: ' . date('d M Y', strtotime('-' . $i . ' days')) . '</p>';
            $html .= '</div>';
            $html .= '<div class="data-item-status">';
            $html .= '<ion-badge color="' . $statusColor . '">' . $statusText . '</ion-badge>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</ion-card-content>';
            $html .= '</ion-card>';
        }

        $html .= '</div>';
        $html .= '</div>';

        $javascript = '
        var dataListVisible = false;
        
        function toggleDataList() {
            var container = document.getElementById("dataListContainer");
            var button = document.querySelector(".gumilar-action ion-button ion-icon");
            
            if (dataListVisible) {
                container.style.display = "none";
                button.setAttribute("name", "chevron-forward-outline");
                dataListVisible = false;
            } else {
                container.style.display = "block";
                button.setAttribute("name", "chevron-down-outline");
                dataListVisible = true;
            }
        }
        
        // Add click event listener
        document.addEventListener("DOMContentLoaded", function() {
            var mainCard = document.querySelector(".gumilar-main-card");
            if (mainCard) {
                mainCard.addEventListener("click", toggleDataList);
            }
        });
        ';

        return array(
            'templates' => array(
                array(
                    'id' => 'main',
                    'html' => $html
                )
            ),
            'javascript' => $javascript,
            'otherdata' => '',
            'files' => array()
        );
    }
}

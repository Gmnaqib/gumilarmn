<?php

namespace block_gumilar\output;

defined('MOODLE_INTERNAL') || die();

class mobile
{

    public static function mobile_block_view($args)
    {
        // Main container with toggle functionality
        $html = '<div class="gumilar-container">';

        // Header with toggle button (using onclick instead of Angular syntax)
        $html .= '<ion-card class="gumilar-main-card" onclick="toggleGumilarData()">';
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
        $html .= '<ion-icon id="gumilarToggleIcon" name="chevron-forward-outline"></ion-icon>';
        $html .= '</ion-button>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</ion-card-content>';
        $html .= '</ion-card>';

        // Data list container (initially hidden)
        $html .= '<div id="gumilarDataContainer" class="data-list-container" style="display: none; opacity: 0; transition: all 0.3s ease;">';

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

        // Improved JavaScript with better mobile compatibility
        $javascript = '
        window.gumilarDataVisible = false;
        
        function toggleGumilarData() {
            console.log("Toggle function called"); // Debug log
            
            var container = document.getElementById("gumilarDataContainer");
            var icon = document.getElementById("gumilarToggleIcon");
            
            if (!container || !icon) {
                console.log("Elements not found"); // Debug log
                return;
            }
            
            if (window.gumilarDataVisible) {
                // Hide data
                container.style.opacity = "0";
                setTimeout(function() {
                    container.style.display = "none";
                }, 300);
                icon.setAttribute("name", "chevron-forward-outline");
                window.gumilarDataVisible = false;
                console.log("Data hidden"); // Debug log
            } else {
                // Show data
                container.style.display = "block";
                setTimeout(function() {
                    container.style.opacity = "1";
                }, 50);
                icon.setAttribute("name", "chevron-down-outline");
                window.gumilarDataVisible = true;
                console.log("Data shown"); // Debug log
            }
        }
        
        // Alternative initialization
        setTimeout(function() {
            var mainCard = document.querySelector(".gumilar-main-card");
            if (mainCard) {
                console.log("Card found, adding click listener");
                mainCard.style.cursor = "pointer";
                // Backup event listener in case onclick doesnt work
                mainCard.addEventListener("click", function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    toggleGumilarData();
                });
            }
        }, 1000);
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

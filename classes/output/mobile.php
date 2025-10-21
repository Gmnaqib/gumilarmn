<?php

namespace block_gumilar\output;

defined('MOODLE_INTERNAL') || die();

class mobile
{

    public static function mobile_block_view($args)
    {
        // Main card that will show data in modal/page
        $html = '<div class="gumilar-container">';
        $html .= '<ion-card class="gumilar-main-card" onclick="showGumilarData()">';
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

        // Hidden data list that will be shown in modal/page
        $html .= '<div id="gumilarDataList" style="display: none;">';
        for ($i = 1; $i <= 10; $i++) {
            $statusColor = ($i % 2 == 0) ? 'success' : 'warning';
            $statusText = ($i % 2 == 0) ? 'Aktif' : 'Pending';
            $category = (($i % 3 == 0) ? 'Penting' : (($i % 2 == 0) ? 'Normal' : 'Rendah'));

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
            $html .= '<p class="data-detail">ID: GML' . str_pad($i, 3, '0', STR_PAD_LEFT) . '</p>';
            $html .= '<p class="data-detail">Kategori: ' . $category . '</p>';
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

        // JavaScript to show data in a new view/modal
        $javascript = '
        function showGumilarData() {
            console.log("Opening Gumilar data"); // Debug log
            
            try {
                // Get the data list HTML
                var dataList = document.getElementById("gumilarDataList");
                if (!dataList) {
                    console.log("Data list not found");
                    return;
                }
                
                var dataHTML = dataList.innerHTML;
                
                // Create modal-like page
                var modalHTML = `
                    <ion-header>
                        <ion-toolbar>
                            <ion-title>Data Gumilar</ion-title>
                            <ion-buttons slot="end">
                                <ion-button onclick="closeGumilarModal()">
                                    <ion-icon name="close"></ion-icon>
                                </ion-button>
                            </ion-buttons>
                        </ion-toolbar>
                    </ion-header>
                    <ion-content class="ion-padding" id="gumilarModalContent">
                        ${dataHTML}
                    </ion-content>
                `;
                
                // Try to use Ionic modal
                if (window.modalController) {
                    window.modalController.create({
                        component: "core-iframe",
                        componentProps: {
                            src: "data:text/html;charset=utf-8," + encodeURIComponent(modalHTML)
                        }
                    }).then(function(modal) {
                        modal.present();
                    });
                } else {
                    // Fallback: Create overlay div
                    createDataOverlay(modalHTML);
                }
                
            } catch (error) {
                console.log("Error showing data:", error);
                // Simple fallback - just alert the data count
                alert("Data Gumilar berisi 10 item data dummy");
            }
        }
        
        function createDataOverlay(content) {
            // Remove existing overlay
            var existingOverlay = document.getElementById("gumilarOverlay");
            if (existingOverlay) {
                existingOverlay.remove();
            }
            
            // Create overlay
            var overlay = document.createElement("div");
            overlay.id = "gumilarOverlay";
            overlay.style.cssText = `
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: white;
                z-index: 9999;
                overflow-y: auto;
                padding: 20px;
                box-sizing: border-box;
            `;
            
            // Add header with back button and content  
            var backButtonHTML = "<button type=\"button\" onclick=\"closeGumilarModal(); return false;\" class=\"gumilar-back-btn\" style=\"display: flex; align-items: center; justify-content: center; padding: 8px 12px; background: #1976d2; color: white; border: none; border-radius: 20px; cursor: pointer; font-size: 14px; margin-right: 12px; box-shadow: 0 2px 4px rgba(25, 118, 210, 0.3); transition: all 0.2s ease;\"><span style=\"margin-right: 6px;\">&larr;</span> Kembali</button>";
            
            overlay.innerHTML = 
                "<div class=\"gumilar-modal-header\" style=\"position: sticky; top: 0; background: white; padding: 15px 20px; border-bottom: 1px solid #ddd; margin: -20px -20px 20px -20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);\">" +
                    "<div style=\"display: flex; justify-content: space-between; align-items: center;\">" +
                        "<div style=\"display: flex; align-items: center;\">" +
                            backButtonHTML +
                            "<h2 style=\"margin: 0; color: #333; font-size: 20px;\">Data Gumilar</h2>" +
                        "</div>" +
                        "<button type=\"button\" onclick=\"closeGumilarModal(); return false;\" style=\"width: 32px; height: 32px; padding: 0; background: #f5f5f5; border: 1px solid #ddd; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 18px; color: #666; transition: all 0.2s ease;\">" +
                            "&times;" +
                        "</button>" +
                    "</div>" +
                    "<p style=\"margin: 8px 0 0 0; color: #666; font-size: 14px;\">Total: 10 data items</p>" +
                "</div>" +
                "<div class=\"data-overlay-content\">" +
                    document.getElementById("gumilarDataList").innerHTML +
                "</div>";
            
            document.body.appendChild(overlay);
            
            // Add direct event listeners to buttons for better compatibility
            setTimeout(function() {
                var backBtn = overlay.querySelector(".gumilar-back-btn");
                var closeBtn = overlay.querySelector("button[onclick*=\"closeGumilarModal\"]");
                
                if (backBtn) {
                    console.log("Adding event listener to back button");
                    backBtn.addEventListener("click", function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        closeGumilarModal();
                    });
                }
                
                if (closeBtn && closeBtn !== backBtn) {
                    console.log("Adding event listener to close button");
                    closeBtn.addEventListener("click", function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        closeGumilarModal();
                    });
                }
            }, 100);
            
            // Add keyboard listener for ESC key
            document.addEventListener("keydown", handleKeyPress);
            
            // Add fade in animation
            overlay.style.opacity = "0";
            overlay.style.transition = "opacity 0.3s ease";
            setTimeout(function() {
                overlay.style.opacity = "1";
            }, 50);
            
            // Add touch/click outside to close functionality
            overlay.addEventListener("click", function(e) {
                if (e.target === overlay) {
                    closeGumilarModal();
                }
            });
        }
        
        function closeGumilarModal() {
            console.log("closeGumilarModal() called"); // Debug log
            
            try {
                var overlay = document.getElementById("gumilarOverlay");
                console.log("Overlay found:", overlay); // Debug log
                
                if (overlay) {
                    console.log("Removing overlay..."); // Debug log
                    
                    // Remove event listeners to prevent memory leaks
                    document.removeEventListener("keydown", handleKeyPress);
                    
                    // Simple immediate removal for better compatibility
                    overlay.style.display = "none";
                    
                    // Remove from DOM
                    if (overlay.parentNode) {
                        overlay.parentNode.removeChild(overlay);
                        console.log("Overlay removed successfully"); // Debug log
                    }
                } else {
                    console.log("No overlay found to remove"); // Debug log
                }
            } catch (error) {
                console.error("Error closing modal:", error); // Debug log
                
                // Fallback: try to remove all possible overlays
                var overlays = document.querySelectorAll("#gumilarOverlay");
                overlays.forEach(function(ol) {
                    if (ol.parentNode) {
                        ol.parentNode.removeChild(ol);
                    }
                });
            }
        }
        
        // Add keyboard support for closing modal
        function handleKeyPress(event) {
            console.log("Key pressed:", event.key); // Debug log
            if (event.key === "Escape" || event.keyCode === 27) {
                var overlay = document.getElementById("gumilarOverlay");
                if (overlay) {
                    console.log("ESC pressed, closing modal"); // Debug log
                    closeGumilarModal();
                }
            }
        }
        
        // Global function to test closing modal
        window.testCloseModal = function() {
            console.log("Test close modal called");
            closeGumilarModal();
        };
        
        // Make closeGumilarModal globally accessible
        window.closeGumilarModal = closeGumilarModal;
        
        // Initialize click handler
        setTimeout(function() {
            var mainCard = document.querySelector(".gumilar-main-card");
            if (mainCard) {
                console.log("Card found, adding click listener for data view");
                mainCard.style.cursor = "pointer";
                mainCard.addEventListener("click", function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    showGumilarData();
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

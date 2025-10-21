<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Block Gumilar - Similar to comments block with custom data display
 *
 * @package    block_gumilar
 * @copyright  2025 Your Name
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();



class block_gumilar extends block_base
{

    public function init()
    {
        $this->title = get_string('pluginname', 'block_gumilar');
    }



    public function get_content()
    {
        if ($this->content !== null) {
            return $this->content;
        }

        $this->content = new stdClass();
        $this->content->footer = '';

        // Create dummy data list (10 items) - this will work in both web and mobile
        $dummydata = '<div class="gumilar-datalist">';
        $dummydata .= '<h4>' . get_string('datalist', 'block_gumilar') . '</h4>';

        for ($i = 1; $i <= 10; $i++) {
            $dummydata .= '<div class="gumilar-item">';
            $dummydata .= '<strong>Data Item ' . $i . '</strong>';
            $dummydata .= '<p>This is dummy data content number ' . $i . ' for Gumilar block.</p>';
            $dummydata .= '</div>';
        }

        $dummydata .= '</div>';

        $this->content->text = $dummydata;

        return $this->content;
    }

    public function applicable_formats()
    {
        return array('all' => true);
    }



    public function instance_allow_multiple()
    {
        return false;
    }

    public function has_config()
    {
        return false;
    }
}

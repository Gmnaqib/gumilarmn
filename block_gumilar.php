<?php

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

        $this->content = new stdClass;
        $this->content->text .= '<p>' . get_string('welcome_message', 'block_gumilar') . '</p>';
        $this->content->footer = '';

        return $this->content;
    }

    // Menentukan format halaman mana saja block ini bisa ditampilkan
    public function applicable_formats()
    {
        return array(
            'all' => false,
            'site' => true,
            'site-index' => true,
            'course-view' => true,
            'course-view-social' => false,
            'mod' => false,
            'mod-quiz' => false,
            'my' => true
        );
    }

    // Apakah block bisa memiliki multiple instances
    public function instance_allow_multiple()
    {
        return true;
    }

    // Apakah block memiliki global config
    public function has_config()
    {
        return false;
    }
}

<?php

namespace App\Services;

class View {
    protected $template_dir = __DIR__ . '/../../App/Views';
    protected $vars = array();
    public function __construct($template_dir = null) {
        if ($template_dir !== null) {
            // Check here whether this directory really exists
            $this->template_dir = $template_dir;
        }
    }
    public function render($template_file, $data) {
        extract($data);
        if (file_exists(__DIR__ . "/../../App/Views/$template_file")) {
            require_once __DIR__ . "/../../App/Views/$template_file";
        } else {
            throw new Exception('View:  [' . $template_file . '] not found,  present in directory ' . $this->template_dir);
        }
    }
    public function __set($name, $value) {
        $this->vars[$name] = $value;
    }
    public function __get($name) {
        return $this->vars[$name];
    }
}
?>
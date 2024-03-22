<?php
namespace BeaverCSS\Dashboard\Controls;

use BeaverCSS\Dashboard\Control;

class ControlColor extends Control {

    public $type = 'color';

    public $defaults = [
        "id" => "",
        "label" => "",
        "value" => "green",
        "class" => null,
        "dashboard" => null,
        "tab" => null,
        "section" => null,
        "priority" => 10,
    ];

    public function enqueue_css() {
        \wp_enqueue_style( 'coloris', BEAVERCSS_URL . 'css/coloris.min.css', null, BEAVERCSS_VERSION, 'all' );
    }

    public function enqueue_js() {
        \wp_enqueue_script( 'coloris', BEAVERCSS_URL . 'js/coloris.min.js', null, BEAVERCSS_VERSION, false );
    }


    public function __( $output = '' ) {
        $settings = $this->settings;

        return  
        <<<EOL
        <div class="control-field color" data-control-type="color">
        <input 
        type="text" 
        class="{$settings['class']}"
        id="{$settings['id']}" 
        name="{$settings['id']}"
        value="{$settings['value']}" 
        data-coloris>
        </div>
        EOL;

    }

}
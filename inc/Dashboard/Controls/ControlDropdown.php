<?php
namespace BeaverCSS\Dashboard\Controls;

use BeaverCSS\Dashboard\Control;

class ControlDropdown extends Control {

    public $type = 'dropdown';

    public $defaults = [
        "id" => "",
        "label" => "",
        "options" => [],
        "selected_value" => "",
        "class" => null,
        "dashboard" => null,
        "tab" => null,
        "section" => null,
        "priority" => 10,
    ];

    public function __( $output = '' ) {
        $settings = $this->settings;

        $class = $this->outputIf( $settings[ 'class' ] );
        $state = $settings[ "state" ] ? "checked" : "";

        $options = '';

        foreach ($settings[ "options" ] as $option ): 
            $options .= "<option value=" . $option[ 'value' ] . "\"" .
                selected( $option[ 'value' ] , $settings[ "selected_value" ] ) .">" .
                $option['label'] .
                "</option>";
        endforeach;


        return $output .= $this->controlwrapper(
        <<<EOL
        <div class="control-field dropdown{$class}"  data-control-type="dropdown">
            <select name="{$settings[ "id" ]}" id="{$settings[ "id" ]}">
                {$options}
            </select>
        </div>
        EOL
    );

    }

}
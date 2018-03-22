<?php

require_once( config_get( 'class_path' ) . 'MantisFormattingPlugin.class.php' );

class TagMarkerPlugin extends MantisFormattingPlugin
{

    public function register()
    {
        $this->name             = plugin_lang_get("title");
        $this->description      = plugin_lang_get("description");
        $this->page             = "config_page";   # Default
        $this->version          = "1.0.0";
        $this->requires         = array(
            "MantisCore"        => "1.2.0"
        );

        $this->uses         = array(
            "MantisCoreFormatting"      => "1.0a"
        );

        $this->author           = "Riccardo Campisano";
        $this->contact          = "riccardo.campisano [at] gmail";
        $this->url              = "http://www.campisano.org/";
    }

    function config()
    {
        return array(
            "TagMarker_tag_enabled"     => OFF,
            "TagMarker_tag_char"        => "|",
            "TagMarker_tag_link"        => "search.php?tag_string="
        );
    }

    public function formatted( $p_event, $p_string, $p_multiline = TRUE )
    {
        if (ON == plugin_config_get("TagMarker_tag_enabled"))
        {
            $c = plugin_config_get("TagMarker_tag_char");
            $p_string = preg_replace( "/\s\\" . $c . "([a-zA-Z0-9]+)/", " <a href=\"" . plugin_config_get("TagMarker_tag_link") . "$1\">\$1</a>", $p_string);
        }

        return $p_string;
    }
}

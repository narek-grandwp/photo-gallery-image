<?php

namespace GDGallery\Models;

use GDGallery\Debug;
use GDGallery\GDGallery;
use GDGallery\Models\Gallery;

class Settings
{

    private $tableName;

    private $individualOptionsListTable;

    /**
     * @var []
     */
    private $options = array();

    public function __construct()
    {
        global $wpdb;
        $this->tableName = $wpdb->prefix . 'gdgallerysettings';
        $this->individualOptionsListTable = $wpdb->prefix . 'gdgalleryindividualsettingslist';

        $dbResults = $wpdb->get_results("SELECT * FROM `" . $this->tableName . "`", ARRAY_A);

        if (!empty($dbResults)) {
            foreach ($dbResults as $r) {

                $unserialized_value = @unserialize($r['option_value']);

                if (false !== $unserialized_value || 'b:0;' === $r['option_value']) {
                    $r['option_value'] = $unserialized_value;
                }

                $this->options[$r['option_key']] = $r['option_value'];
            }
        }
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    public function getDefaultOptions()
    {
        return $this->defaultOptions;
    }

    private $defaultOptions = array(

        'RemoveTablesUninstall' => 'off',

        /************* Justified ***********/
        'lightbox_type_justified' => 'wide',
        'title_position_justified' => 'center',
        'title_vertical_position_justified' => 'inside_bottom',
        'title_size_justified' => '16',
        'title_color_justified' => 'FFFFFF',
        'title_background_color_justified' => '333333',
        'title_background_opacity_justified' => '70',
        'border_color_justified' => '333333',
        'border_radius_justified' => '0',
        'show_icons_justified' => 'b:1;',
        'show_link_icon_justified' => 'b:1;',
        'item_as_link_justified' => 'b:0;',
        'link_new_tab_justified' => 'b:1;',
        'image_hover_effect_reverse_justified' => 'b:0;',
        'load_more_text_justified' => 'Load More',
        'load_more_position_justified' => 'center',
        'load_more_font_size_justified' => '15',

        'load_more_vertical_padding_justified' => '8',
        'load_more_horisontal_padding_justified' => '13',
        'load_more_border_width_justified' => '1',
        'load_more_border_radius_justified' => '0',
        'load_more_color_justified' => 'FFFFFF',
        'load_more_background_color_justified' => '333333',
        'load_more_border_color_justified' => '333333',
        'load_more_font_family_justified' => 'monospace',
        'load_more_hover_color_justified' => '333333',
        'load_more_hover_background_color_justified' => 'FFFFFF',
        'load_more_hover_border_color_justified' => '333333',
        'load_more_loader_justified' => 'b:1;',
        'load_more_loader_color_justified' => '333333',

        'pagination_position_justified' => 'center',
        'pagination_font_size_justified' => '15',
        'pagination_vertical_padding_justified' => '8',
        'pagination_horisontal_padding_justified' => '13',
        'pagination_margin_justified' => '3',
        'pagination_border_width_justified' => '1',
        'pagination_border_radius_justified' => '0',
        'pagination_border_color_justified' => '333333',
        'pagination_color_justified' => '333333',
        'pagination_background_color_justified' => 'FFFFFF',
        'pagination_font_family_justified' => 'monospace',
        'pagination_hover_border_color_justified' => '333333',
        'pagination_hover_color_justified' => 'FFFFFF',
        'pagination_hover_background_color_justified' => '333333',
        'pagination_nav_type_justified' => '0',
        'pagination_nav_text_justified' => 'first,prev,next,last',
        'pagination_nearby_pages_justified' => '2',

        /************* Tiles ***********/
        'lightbox_type_tiles' => 'wide',
        'title_position_tiles' => 'center',
        'title_vertical_position_tiles' => 'inside_bottom',

        'title_size_tiles' => '16',
        'title_color_tiles' => 'FFFFFF',
        'title_background_color_tiles' => '333333',
        'title_background_opacity_tiles' => '70',
        'min_col_tiles' => '2',
        'border_color_tiles' => '333333',
        'border_radius_tiles' => '0',
        'show_icons_tiles' => 'b:1;',
        'show_link_icon_tiles' => 'b:1;',
        'item_as_link_tiles' => 'b:0;',
        'link_new_tab_tiles' => 'b:1;',
        'image_hover_effect_reverse_tiles' => 'b:0;',

        'load_more_text_tiles' => 'Load More',
        'load_more_position_tiles' => 'center',
        'load_more_font_size_tiles' => '15',
        'load_more_vertical_padding_tiles' => '8',
        'load_more_horisontal_padding_tiles' => '13',
        'load_more_border_width_tiles' => '1',
        'load_more_border_radius_tiles' => '0',
        'load_more_color_tiles' => 'FFFFFF',
        'load_more_background_color_tiles' => '333333',
        'load_more_border_color_tiles' => '333333',
        'load_more_font_family_tiles' => 'monospace',
        'load_more_hover_color_tiles' => '333333',
        'load_more_hover_background_color_tiles' => 'FFFFFF',
        'load_more_hover_border_color_tiles' => '333333',
        'load_more_loader_tiles' => 'b:1;',
        'load_more_loader_color_tiles' => '333333',

        'pagination_position_tiles' => 'center',
        'pagination_font_size_tiles' => '15',
        'pagination_vertical_padding_tiles' => '8',
        'pagination_horisontal_padding_tiles' => '13',
        'pagination_margin_tiles' => '3',
        'pagination_border_width_tiles' => '1',
        'pagination_border_radius_tiles' => '0',
        'pagination_border_color_tiles' => '333333',
        'pagination_color_tiles' => '333333',
        'pagination_background_color_tiles' => 'FFFFFF',
        'pagination_font_family_tiles' => 'monospace',
        'pagination_hover_border_color_tiles' => '333333',
        'pagination_hover_color_tiles' => 'FFFFFF',
        'pagination_hover_background_color_tiles' => '333333',
        'pagination_nav_type_tiles' => '0',
        'pagination_nav_text_tiles' => 'first,prev,next,last',
        'pagination_nearby_pages_tiles' => '2',

        /************* Carousel ***********/
        'lightbox_type_carousel' => 'wide',
        'title_position_carousel' => 'center',
        'title_vertical_position_carousel' => 'inside_bottom',

        'title_size_carousel' => '16',
        'title_color_carousel' => 'FFFFFF',
        'title_background_color_carousel' => '333333',
        'title_background_opacity_carousel' => '70',
        'position_carousel' => 'center',
        'show_background_carousel' => 'b:0;',
        'background_color_carousel' => 'FFFFFF',
        'border_color_carousel' => '333333',
        'border_radius_carousel' => '0',
        'show_icons_carousel' => 'b:1;',
        'show_link_icon_carousel' => 'b:1;',
        'item_as_link_carousel' => 'b:0;',
        'link_new_tab_carousel' => 'b:1;',
        'image_hover_effect_reverse_carousel' => 'b:0;',

        'nav_num_carousel' => '1',
        'scroll_duration_carousel' => '500',
        'autoplay_carousel' => 'b:1;',
        'autoplay_timeout_carousel' => '3000',
        'autoplay_direction_carousel' => 'right',
        'autoplay_pause_hover_carousel' => 'b:1;',
        'enable_nav_carousel' => 'b:1;',
        'nav_vertical_position_carousel' => 'bottom',
        'nav_horisontal_position_carousel' => 'center',
        'play_icon_carousel' => 'b:1;',
        'icon_space_carousel' => '20',


        /************* Grid ***********/
        'lightbox_type_grid' => 'wide',
        'space_rows_grid' => '20',
        'gallery_width_grid' => '100',
        'gallery_bg_grid' => 'b:1;',
        'gallery_bg_color_grid' => 'FFFFFF',
        'num_rows_grid' => '3',
        'title_position_grid' => 'left',
        'title_vertical_position_grid' => 'bottom',
        'title_size_grid' => '16',
        'title_color_grid' => 'FFFFFF',
        'title_background_color_grid' => '333333',
        'title_background_opacity_grid' => '70',
        'border_color_grid' => '333333',
        'border_radius_grid' => '3',
        'show_icons_grid' => 'b:1;',
        'show_link_icon_grid' => 'b:1;',
        'item_as_link_grid' => 'b:0;',
        'link_new_tab_grid' => 'b:1;',
        'image_hover_effect_reverse_grid' => 'b:0;',
        'nav_type_grid' => 'bullets',
        'bullets_margin_grid' => '50',
        'bullets_color_grid' => 'gray',
        'bullets_space_between_grid' => '15',
        'arrows_margin_grid' => '50',
        'arrows_space_between_grid' => '20',
        'nav_position_grid' => 'center',
        'nav_offset_grid' => '0',

        /************* Slider ***********/
        'pause_on_hover_slider' => 'b:1;',
        'scale_mode_slider' => 'fill',
        'zoom_slider' => 'b:1;',
        'loader_type_slider' => '1',
        'loader_color_slider' => 'white',
        'bullets_slider' => 'b:1;',
        'bullets_horisontal_position_slider' => 'center',
        'bullets_vertical_position_slider' => 'bottom',
        'arrows_slider' => 'b:1;',
        'progress_indicator_slider' => 'b:1;',
        'progress_indicator_type_slider' => 'pie',
        'progress_indicator_horisontal_position_slider' => 'right',
        'progress_indicator_vertical_position_slider' => 'top',
        'play_slider' => 'b:0;',
        'play_horizontal_position_slider' => 'left',
        'play_vertical_position_slider' => 'top',
        'fullscreen_slider' => 'b:0;',
        'fullscreen_horisontal_position_slider' => 'left',
        'fullscreen_vertical_position_slider' => 'top',
        'zoom_panel_slider' => 'b:0;',
        'zoom_horisontal_panel_position_slider' => 'left',
        'zoom_vertical_panel_position_slider' => 'top',
        'controls_always_on_slider' => 'b:0;',
        'video_play_type_slider' => 'round',
        'text_panel_slider' => 'b:1;',
        'text_panel_always_on_slider' => 'b:0;',
        'text_title_slider' => 'b:1;',
        'text_description_slider' => 'b:1;',
        'text_panel_bg_slider' => 'b:1;',
        'carousel_slider' => 'b:1;',
        'text_panel_bg_color_slider' => '000000',
        'text_panel_bg_opacity_slider' => '70',
        'text_panel_title_size_slider' => '17',
        'text_panel_title_color_slider' => 'FFFFFF',
        'text_panel_desc_size_slider' => '14',
        'text_panel_desc_color_slider' => 'FFFFFF',
        'thumb_width_slider' => '88',
        'thumb_height_slider' => '50',
        'playlist_bg_slider' => '000000',

        /********  Lightbox *****/
        /********  wide *****/

        'arrows_offset_wide' => '0',
        'overlay_color_wide' => '000000',
        'overlay_opacity_wide' => '100',
        'top_panel_bg_color_wide' => '000000',
        'top_panel_opacity_wide' => '100',
        'show_numbers_wide' => 'b:1;',
        'number_size_wide' => '15',
        'number_color_wide' => 'FFFFFF',
        'image_border_width_wide' => '0',
        'image_border_color_wide' => 'FFFFFF',
        'image_border_radius_wide' => '0',
        'image_shadow_wide' => 'b:1;',
        'swipe_control_wide' => 'b:1;',
        'zoom_control_wide' => 'b:1;',

        'show_text_panel_wide' => 'b:1;',
        'enable_title_wide' => 'b:1;',
        'enable_desc_wide' => 'b:0;',
        'texpanel_paddind_vert_wide' => '5',
        'texpanel_paddind_hor_wide' => '5',
        'text_position_wide' => 'center',
        'title_color_wide' => 'FFFFFF',
        'title_font_size_wide' => '16',
        'desc_color_wide' => 'FFFFFF',
        'desc_font_size_wide' => '14',

        /********  compact *****/
        'arrows_offset_compact' => '0',
        'overlay_color_compact' => '000000',
        'overlay_opacity_compact' => '50',
        'show_numbers_compact' => 'b:1;',
        'number_size_compact' => '15',
        'number_color_compact' => 'FFFFFF',
        'image_border_width_compact' => '0',
        'image_border_color_compact' => 'FFFFFF',
        'image_border_radius_compact' => '0',
        'image_shadow_compact' => 'b:1;',
        'swipe_control_compact' => 'b:1;',
        'zoom_control_compact' => 'b:1;',

        'show_text_panel_compact' => 'b:1;',
        'enable_title_compact' => 'b:1;',
        'enable_desc_compact' => 'b:0;',
        'texpanel_paddind_vert_compact' => '5',
        'texpanel_paddind_hor_compact' => '5',
        'text_position_compact' => 'left',
        'title_color_compact' => '333333',
        'title_font_size_compact' => '16',
        'desc_color_compact' => '333333',
        'desc_font_size_compact' => '14',


    );


    private $individualOptions = array(
        "show_title_justified" => array("1", "Element Title Option", "select", "0,1,2", "Always on,On hover,Disable"),
        "title_appear_type_justified" => array("slide", "Title On Hover Type", "select", "slide,fade", "Slide,Fade"),
        "on_hover_overlay_justified" => array("b:0;", "On Hover Overlay", "checkbox", null, null),
        "image_hover_effect_justified" => array("blur", "Image Hover Effect", "select", "blur,bw,sepia", "None,Black and White,Sepia"),
        "margin_justified" => array("10", "Image Margin", "number", null, null),
        "border_width_justified" => array("1", "Image Border Width", 'number', null, null),
        "shadow_justified" => array("b:0;", "Image Element Shadow", "checkbox", null, null),

        "show_title_tiles" => array("1", "Element Title Option", "select", "0,1,2", "Always on,On hover,Disable"),
        "title_appear_type_tiles" => array("slide", "Title On Hover Type", "select", "slide,fade", "Slide,Fade"),
        "on_hover_overlay_tiles" => array("b:0;", "On Hover Overlay", "checkbox", null, null),
        "image_hover_effect_tiles" => array("blur", "Image Hover Effect", "select", "blur,bw,sepia", "None,Black and White,Sepia"),
        "margin_tiles" => array("10", "Image Margin", "number", null, null),
        "border_width_tiles" => array("1", "Image Border Width", 'number', null, null),
        "shadow_tiles" => array("b:0;", "Image Element Shadow", "checkbox", null, null),
        "col_width_tiles" => array("250", "Image Width", "number", null, null),

        "show_title_carousel" => array("1", "Element Title Option", "select", "0,1,2", "Always on,On hover,Disable"),
        "title_appear_type_carousel" => array("slide", "Title On Hover Type", "select", "slide,fade", "Slide,Fade"),
        "on_hover_overlay_carousel" => array("b:0;", "On Hover Overlay", "checkbox", null, null),
        "image_hover_effect_carousel" => array("blur", "Image Hover Effect", "select", "blur,bw,sepia", "None,Black and White,Sepia"),
        "margin_carousel" => array("10", "Image Margin", "number", null, null),
        "border_width_carousel" => array("1", "Image Border Width", 'number', null, null),
        "shadow_carousel" => array("b:0;", "Image Element Shadow", "checkbox", null, null),
        "width_carousel" => array("250", "Image Width", "number", null, null),
        "height_carousel" => array("250", "Image Height", "number", null, null),

        "show_title_grid" => array("1", "Element Title Option", "select", "0,1,2", "Always on,On hover,Disable"),
        "title_appear_type_grid" => array("slide", "Title On Hover Type", "select", "slide,fade", "Slide,Fade"),
        "on_hover_overlay_grid" => array("b:0;", "On Hover Overlay", "checkbox", null, null),
        "image_hover_effect_grid" => array("blur", "Image Hover Effect", "select", "blur,bw,sepia", "None,Black and White,Sepia"),
        "space_cols_grid" => array("10", "Image Margin", "number", null, null),
        "border_width_grid" => array("1", "Image Border Width", 'number', null, null),
        "shadow_grid" => array("b:0;", "Image Element Shadow", "checkbox", null, null),
        "width_grid" => array("250", "Image Width", "number", null, null),
        "height_grid" => array("250", "Image Height", "number", null, null),

        "width_slider" => array("900", "Image Width", "number", null, null),
        "height_slider" => array("500", "Image Height", "number", null, null),
        "autoplay_slider" => array("b:0;", "Autoplay", "checkbox", null, null),
        "play_interval_slider" => array("5000", "Autoplay Timeout (ms)", "number", null, null),
        "transition_speed_slider" => array("1000", "Transition Speed (ms)", "number", null, null),
        "transition_slider" => array("slide", "Effects", "select", "slide,fade", "Slide,Fade"),
        "playlist_slider" => array("b:0;", "Playlist", "checkbox", null, null),
        "playlist_pos_slider" => array("right", "Playlist Position", "select", "right,left,bottom,top", "Right,Left,Bottom,Top", null, null)
    );

    public function getIndividualOptions()
    {
        return $this->individualOptions;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function getOption($key)
    {
        if (!isset($this->options[$key])) {
            return null;
        }
        return $this->options[$key];
    }

    public function setOption($key, $value)
    {
        global $wpdb;

        $key = sanitize_text_field($key);

        if (is_array($value) || is_object($value) || is_bool($value)) {
            $value = serialize($value);
        }

        if ($value === 'true') {
            $value = 'b:1;';
        } elseif ($value === 'false') {
            $value = 'b:0;';
        }

        $saved = $wpdb->query($wpdb->prepare('INSERT INTO ' . $this->tableName . ' (option_key,option_value) VALUES(%s,%s) ON DUPLICATE KEY UPDATE option_value=%s', $key, $value, $value));


        if (false !== $saved) {
            $this->options[$key] = $value;
        }

        return true;

    }

    public function setIndividualOptionFields($option_name, $option_value, $id_gallery, $id)
    {
        global $wpdb;

        $option_name = sanitize_text_field($option_name);

        $saved = $wpdb->query(
            $wpdb->prepare(
                'INSERT IGNORE INTO ' . $this->individualOptionsListTable . ' (id,option_key,option_title,option_type,select_options_val,select_options_title) VALUES(%s,%s,%s,%s,%s,%s)',
                $id, $option_name, $option_value[1], $option_value[2], $option_value[3], $option_value[4]
            )
        );

        /* $wpdb->insert($this->individualOptionsListTable, array(
             "id" => $id,
             "option_key" => $option_name,
             "option_title" => $option_value[1],
             "option_type" => $option_value[2],
             "select_options_val" => $option_value[3],
             "select_options_title" => $option_value[4],
         ));*/


        $this->setIndividualOptionValues($id_gallery, $id, $option_value[0]);


    }

    public function setIndividualOptionValues($id_gallery, $id_option, $option_value)
    {
        global $wpdb;


        $option_value = sanitize_text_field($option_value);

        $saved = $wpdb->query(
            $wpdb->prepare(
                'INSERT IGNORE INTO ' . Gallery::getIndividualSettingsTableName() . ' (id_gallery,id_option,option_value) VALUES(%s,%s,%s)', $id_gallery, $id_option, $option_value
            )
        );

        /* $saved = $wpdb->insert(Gallery::getIndividualSettingsTableName(), array(
             "id_gallery" => $id_gallery,
             "id_option" => $id_option,
             "option_value" => $option_value
         ));*/

        if ($saved !== false) {
            return true;
        }
        return false;
    }


    public function getOptionsByGalleryView($id_gallery, $view)
    {
        global $wpdb;

        $query = $wpdb->prepare("SELECT * FROM " . Gallery::getIndividualSettingsTableName() . " AS t1 LEFT JOIN " . $this->individualOptionsListTable . "  AS t2
        ON (t1.id_option = t2.id) 
        WHERE t1.id_gallery = %d AND t2.option_key LIKE '%s'", $id_gallery, "%" . $view . "%");

        $gallery_options = $wpdb->get_results($query);


        if (empty($gallery_options)) {
            return array();
        }

        foreach ($gallery_options as $key => $val) {
            switch ($val->option_value) {
                case "b:0;":
                    $gallery_options[$key]->option_value = 0;
                    break;
                case "b:1;":
                    $gallery_options[$key]->option_value = 1;
                    break;
            }
        }

        return $gallery_options;
    }

    public function getOptionsByKeyValue($arr)
    {
        $options = array();
        foreach ($arr as $val) {
            $options[$val->option_key] = $val->option_value;
        }

        return $options;
    }

    public function indOptions($id_gallery, $view)
    {
        $gallery_options = array();
        $options_arr = $this->getOptionsByGalleryView($id_gallery, $view);
        $options = $this->getOptionsByKeyValue($options_arr);

        if ($view != "slider") {
            if ($options["show_title_" . $view] == 0) {
                $gallery_options["tile_enable_textpanel"] = true;
                $gallery_options["tile_textpanel_always_on"] = true;
            } elseif ($options["show_title_" . $view] == 1) {
                $gallery_options["tile_enable_textpanel"] = true;
            }
            $gallery_options["tile_textpanel_appear_type"] = $options["title_appear_type_" . $view];
            $gallery_options["tile_enable_overlay"] = $options["on_hover_overlay_" . $view];
            $gallery_options["tile_image_effect_type"] = $options["image_hover_effect_" . $view];
            $gallery_options["tile_border_width"] = $options["border_width_" . $view];
            $gallery_options["tile_enable_shadow"] = $options["shadow_" . $view];


            switch ($view) {
                case "justified":
                    $gallery_options["tiles_justified_space_between"] = (int)$options["margin_justified"];
                    break;
                case "tiles":
                    $gallery_options["tiles_space_between_cols"] = (int)$options["margin_tiles"];
                    $gallery_options["tiles_col_width"] = (int)$options["col_width_tiles"];
                    break;
                case "carousel":
                    $gallery_options["carousel_space_between_tiles"] = (int)$options["margin_carousel"];
                    $gallery_options["tile_width"] = (int)$options["width_carousel"];
                    $gallery_options["tile_height"] = $options["height_carousel"];
                    break;
                case "grid":
                    $gallery_options["grid_space_between_cols"] = (int)$options["space_cols_grid"];
                    $gallery_options["tile_width"] = (int)$options["width_grid"];
                    $gallery_options["tile_height"] = $options["height_grid"];
                    break;

            }
        } elseif ($view == "slider") {
            $gallery_options["gallery_width"] = $options["width_slider"];
            $gallery_options["gallery_height"] = $options["height_slider"];
            $gallery_options["gallery_autoplay"] = $options["autoplay_slider"];
            $gallery_options["gallery_play_interval"] = $options["play_interval_slider"];
            $gallery_options["slider_transition_speed"] = (int)$options["transition_speed_slider"];
            $gallery_options["slider_transition"] = $options["transition_slider"];
            $gallery_options["theme_panel_position"] = $options["playlist_pos_slider"];
            $gallery_options["playlist_slider"] = $options["playlist_slider"];
        }


        return $gallery_options;
    }


    public function getMatchedOptions($view)
    {
        /* if ($this->options["show_title_" . $view] == 0) {
             $gallery_options["tile_enable_textpanel"] = true;
             $gallery_options["tile_textpanel_always_on"] = true;
         } elseif ($this->options["show_title_" . $view] == 1) {
             $gallery_options["tile_enable_textpanel"] = true;
         }*/
        $gallery_options["tile_textpanel_title_text_align"] = $this->options["title_position_" . $view];
        $gallery_options["tile_textpanel_title_font_size"] = $this->options["title_size_" . $view];
        $gallery_options["tile_textpanel_title_color"] = "#" . $this->options["title_color_" . $view];
        $gallery_options["tile_textpanel_bg_color"] = "#" . $this->options["title_background_color_" . $view];
        $gallery_options["tile_textpanel_bg_opacity"] = $this->options["title_background_opacity_" . $view] / 100;
        $gallery_options["tile_enable_border"] = true;
//        $gallery_options["tile_border_width"] = $this->options["border_width_" . $view];
        $gallery_options["tile_border_color"] = "#" . $this->options["border_color_" . $view];
        $gallery_options["tile_border_radius"] = $this->options["border_radius_" . $view];
        //  $gallery_options["tile_enable_overlay"] = $this->options["on_hover_overlay_" . $view];
        $gallery_options["tile_enable_image_effect"] = true;
        // $gallery_options["tile_image_effect_type"] = $this->options["image_hover_effect_" . $view];
        $gallery_options["tile_image_effect_reverse"] = ($this->options["image_hover_effect_reverse_" . $view] === true) ? false : true;
//        $gallery_options["tile_enable_shadow"] = $this->options["shadow_" . $view];

        if ($this->options["item_as_link_" . $view] == true) {
            $gallery_options["tile_as_link"] = 1;
            $gallery_options["tile_enable_icons"] = ($this->options["show_link_icon_" . $view] == true) ? true : false;
        } else {
            $gallery_options["tile_as_link"] = 0;
            $gallery_options["tile_enable_icons"] = $this->options["show_icons_" . $view];
            $gallery_options["tile_show_link_icon"] = $this->options["show_link_icon_" . $view];
        }

        //$gallery_options["tile_textpanel_appear_type"] = $this->options["title_appear_type_" . $view];
        $gallery_options["tile_textpanel_position"] = $this->options["title_vertical_position_" . $view];
        $gallery_options["tile_link_newpage"] = $this->options["link_new_tab_" . $view];

        return $gallery_options;
    }

    public function getLightboxOptions($lt)
    {
        $gallery_options["lightbox_type"] = $lt;
        $gallery_options["lightbox_arrows_offset"] = (int)$this->options["arrows_offset_" . $lt];
        $gallery_options["lightbox_overlay_color"] = "#" . $this->options["overlay_color_" . $lt];
        $gallery_options["lightbox_overlay_opacity"] = $this->options["overlay_opacity_" . $lt] / 100;
        if ($lt != "compact") {
            $gallery_options["lightbox_top_panel_opacity"] = $this->options["top_panel_opacity_" . $lt] / 100;
        }
        $gallery_options["lightbox_show_numbers"] = $this->options["show_numbers_" . $lt];
        $gallery_options["lightbox_numbers_size"] = $this->options["number_size_" . $lt];
        $gallery_options["lightbox_numbers_color"] = "#" . $this->options["number_color_" . $lt];
        $gallery_options["lightbox_slider_image_border_width"] = $this->options["image_border_width_" . $lt];
        $gallery_options["lightbox_slider_image_border_color"] = "#" . $this->options["image_border_color_" . $lt];
        $gallery_options["lightbox_slider_image_border_radius"] = (int)$this->options["image_border_radius_" . $lt];
        $gallery_options["lightbox_slider_image_shadow"] = $this->options["image_shadow_" . $lt];
        $gallery_options["lightbox_slider_control_swipe"] = $this->options["swipe_control_" . $lt];
        $gallery_options["lightbox_slider_control_zoom"] = $this->options["zoom_control_" . $lt];
        $gallery_options["lightbox_slider_image_border"] = true;

        $gallery_options["lightbox_show_textpanel"] = $this->options["show_text_panel_" . $lt];
        $gallery_options["lightbox_textpanel_enable_title"] = $this->options["enable_title_" . $lt];
        $gallery_options["lightbox_textpanel_enable_description"] = $this->options["enable_desc_" . $lt];
        $gallery_options["lightbox_textpanel_padding_top"] = (int)$this->options["texpanel_paddind_vert_" . $lt];
        $gallery_options["lightbox_textpanel_padding_bottom"] = (int)$this->options["texpanel_paddind_vert_" . $lt];
        $gallery_options["lightbox_textpanel_padding_right"] = (int)$this->options["texpanel_paddind_hor_" . $lt];
        $gallery_options["lightbox_textpanel_padding_left"] = (int)$this->options["texpanel_paddind_hor_" . $lt];
        $gallery_options["lightbox_textpanel_title_color"] = "#" . $this->options["title_color_" . $lt];
        $gallery_options["lightbox_textpanel_title_text_align"] = $this->options["text_position_" . $lt];
        $gallery_options["lightbox_textpanel_title_font_size"] = $this->options["title_font_size_" . $lt];
        $gallery_options["lightbox_textpanel_desc_color"] = "#" . $this->options["desc_color_" . $lt];
        $gallery_options["lightbox_textpanel_desc_text_align"] = $this->options["text_position_" . $lt];
        $gallery_options["lightbox_textpanel_desc_font_size"] = $this->options["desc_font_size_" . $lt];

        return $gallery_options;
    }


    /*
     * Unique options for Justified View
     * */

    public function getOptionsJustified()
    {
        $gallery_options["tiles_type"] = 'justified';
        //  $gallery_options["tiles_justified_space_between"] = (int)$this->options["margin_justified"];

        return $gallery_options;
    }


    /*
     * Unique options for Tiles View
     * */

    public function getOptionsTiles()
    {
//        $gallery_options["tiles_space_between_cols"] = (int)$this->options["margin_tiles"];
//        $gallery_options["tiles_col_width"] = (int)$this->options["col_width_tiles"];
        $gallery_options["tiles_min_columns"] = $this->options["min_col_tiles"];

        return $gallery_options;
    }


    /*
     * Unique options for Carousel View
     * */

    public function getOptionsCarousel()
    {
        if ($this->options["show_background_carousel"] == 1) {
            $gallery_options["gallery_background_color"] = "#" . $this->options["background_color_carousel"];
        }

//        $gallery_options["carousel_space_between_tiles"] = (int)$this->options["margin_carousel"];
//        $gallery_options["tile_width"] = (int)$this->options["width_carousel"];
//        $gallery_options["tile_height"] = $this->options["height_carousel"];
        $gallery_options["tile_enable_outline"] = false;
        $gallery_options["theme_carousel_align"] = $this->options["position_carousel"];
        $gallery_options["carousel_navigation_numtiles"] = (int)$this->options["nav_num_carousel"];
        $gallery_options["carousel_scroll_duration"] = (int)$this->options["scroll_duration_carousel"];
        $gallery_options["carousel_autoplay"] = $this->options["autoplay_carousel"];
        $gallery_options["carousel_autoplay_timeout"] = $this->options["autoplay_timeout_carousel"];
        $gallery_options["carousel_autoplay_direction"] = $this->options["autoplay_direction_carousel"];
        $gallery_options["carousel_autoplay_pause_onhover"] = $this->options["autoplay_pause_hover_carousel"];
        $gallery_options["theme_enable_navigation"] = $this->options["enable_nav_carousel"];
        $gallery_options["theme_navigation_position"] = $this->options["nav_vertical_position_carousel"];
        $gallery_options["theme_navigation_align"] = $this->options["nav_horisontal_position_carousel"];
        $gallery_options["theme_navigation_enable_play"] = $this->options["play_icon_carousel"];
        $gallery_options["theme_space_between_arrows"] = $this->options["icon_space_carousel"];

        return $gallery_options;
    }


    /*
     * Unique options for Grid View
     * */

    public function getOptionsGrid()
    {
//        $gallery_options["tile_width"] = (int)$this->options["width_grid"];
//        $gallery_options["tile_height"] = (int)$this->options["height_grid"];
//        $gallery_options["grid_space_between_cols"] = (int)$this->options["space_cols_grid"];
        $gallery_options["grid_space_between_rows"] = (int)$this->options["space_rows_grid"];
        $gallery_options["gallery_width"] = $this->options["gallery_width_grid"] . "%";
        if ($this->options["gallery_bg_grid"] == 1) {
            $gallery_options["gallery_background_color"] = "#" . $this->options["gallery_bg_color_grid"];
        }
        $gallery_options["theme_navigation_type"] = $this->options["nav_type_grid"];
        $gallery_options["theme_bullets_margin_top"] = (int)$this->options["bullets_margin_grid"];
        $gallery_options["theme_bullets_color"] = $this->options["bullets_color_grid"];
        $gallery_options["bullets_space_between"] = (int)$this->options["bullets_space_between_grid"];
        $gallery_options["theme_arrows_margin_top"] = (int)$this->options["arrows_margin_grid"];
        $gallery_options["theme_space_between_arrows"] = (int)$this->options["arrows_space_between_grid"];
        $gallery_options["theme_navigation_align"] = $this->options["nav_position_grid"];
        $gallery_options["theme_navigation_offset_hor"] = (int)$this->options["nav_offset_grid"];
        $gallery_options["grid_num_rows"] = (int)$this->options["num_rows_grid"];

        return $gallery_options;
    }

    public function getOptionsByView($view)
    {
        $unique = array();
        switch ($view) {
            case "justified":
                $unique = $this->getOptionsJustified();
                break;
            case "tiles":
                $unique = $this->getOptionsTiles();
                break;
            case "carousel":
                $unique = $this->getOptionsCarousel();
                break;
            case "grid":
                $unique = $this->getOptionsGrid();
                break;
        }

        $match = $this->getMatchedOptions($view);
        $lightbox = $this->getLightboxOptions($this->options["lightbox_type_" . $view]);

        $result = $unique + $match + $lightbox;

        return $result;
    }

}
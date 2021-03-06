<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 7/3/2017
 * Time: 4:09 PM
 */

namespace GDGallery\Database\Migrations;

use GDGallery\Models\Gallery as Gallery;
use GDGallery\Models\Settings as Settings;

class CreateDefaultGallery
{

    private static $defGallerySettings = array();

    public static function run()
    {
        global $wpdb;

        $galleries = $wpdb->get_var("SELECT COUNT(*) FROM " . Gallery::getTableName());
        if ($galleries == 0) {
            $new_gallery = $wpdb->insert(Gallery::getTableName(), array("name" => "My First Gallery"));
            for ($i = 1; $i < 12; $i++) {
                $wpdb->insert(Gallery::getItemsTableName(), array(
                        "id_gallery" => $new_gallery,
                        "name" => "title " . $i,
                        "ordering" => $i,
                        "url" => GDGALLERY_IMAGES_URL . "project/" . $i . ".jpg")
                );
            }
            GDGallery()->setIndividualGallerySettings($new_gallery);
        } else {
            $gallery_arr = $wpdb->get_results("SELECT `id_gallery` FROM " . Gallery::getTableName());
            foreach ($gallery_arr as $key => $val) {
                GDGallery()->setIndividualGallerySettings($val->id_gallery);
            }
        }
    }
}
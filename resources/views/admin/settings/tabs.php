<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 7/13/2017
 * Time: 2:13 PM
 */
?>

<div class="settings-wrap">
    <div class="settings-sections-wrap">
        <form id="settings_form" action="admin.php?page=gdgallery_styles&action=save_settings" method="post">
            <?php if (!empty($title)): ?>
                <div class="settings-head">
                    <h1><?php echo $title; ?></h1>
                    <div class="settings-save-head">
                        <input type="submit" class="settings-save" value="<?php _e('Save Settings', 'gdgallery'); ?>"/>
                        <span class="spinner"></span>
                        <p class="pro_save_message"><?php echo _e('This action is available in PRO version', 'gdgallery'); ?></p>
                    </div>
                </div>


            <?php endif; ?>
            <input type="hidden" name="action" value="save_gd_lightbox_settings"/>
            <?php wp_nonce_field('gdgallery_settings'); ?>
            <div id="settings_tab">
                <ul>
                    <?php foreach ($tabs as $key => $tab): ?>
                        <li><a href="#<?= $key ?>"><?= $tab["title"] ?></a></li>
                    <?php endforeach; ?>
                </ul>
                <div class="pro_message"><?php _e('These options are available in PRO version. Go PRO to unlock them.', 'gdgallery'); ?>
                    <a href="//grandwp.com/wordpress-photo-gallery"
                       target="_blank"><?php _e('Upgrade', 'gdgallery'); ?></a>
                </div>
                <?php foreach ($tabs as $id => $tab): ?>
                    <?php \GDGallery\Helpers\View::render('admin/settings/styles.php', compact('sections', 'id', 'fields')); ?>
                <?php endforeach; ?>
            </div>
            <div class="settings-save-wrap">
                <input type="submit" class="settings-save" value="<?php _e('Save Settings', 'gdgallery'); ?>"/>
                <span class="spinner"></span>
                <p class="pro_save_message"><?php echo _e('This action is available in PRO version', 'gdgallery'); ?></p>
            </div>
        </form>

        <div class="gdgallery_scrollup"><i class="fa fa-arrow-up" aria-hidden="true"></i></div>
    </div>
</div>


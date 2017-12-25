<div id="gdgallery-editimages-modal" class="-gdgallery-modal">
    <div class="-gdgallery-modal-content">
        <form action="admin.php?page=gdgallery&id=<?php echo $id_gallery; ?>&save_data_nonce=<?php echo $save_data_nonce; ?>"
              method="post" id="gdgallery_edited_images_form" name="gdgallery_edited_images_form">
            <div class="-gdgallery-modal-content-header">
                <div class="-gdgallery-modal-header-icon">

                </div>
                <div class="-gdgallery-modal-header-info">
                    <h3> <?= _e('Quick Edit - Images', 'gdgallery'); ?></h3>
                </div>
                <span class="spinner"></span>
                <input type="submit" value="<?= _e('Save', 'gdgallery'); ?>"
                       id="gdgallery-save-buttom"
                       class="gdgallery-save-buttom images-save">
                <div class="-gdgallery-modal-close">
                    <i class="fa fa-close"></i>
                </div>
            </div>
            <div class="-gdgallery-modal-content-body">


                <input type="hidden" name="gdgallery_images_id_gallery" value="<?= $id_gallery ?>">
                <table class="quick_edit_table grid" id="gdgallery_sort">
                    <tbody>
                    <?php
                    if (!empty($items)) {
                        foreach ($items as $key => $item): ?>
                            <tr>
                                <td class="index"><input type="hidden"
                                                         name="gdgallery_images_ordering[<?= $item->id_image ?>]"
                                                         value="<?= $item->ordering ?>"></td>
                                <td class="img_td">
                                    <img src="<?= $item->url ?>">
                                </td>
                                <td>

                                    <div class="group_material">
                                        <input type="text" name="gdgallery_images_name[<?= $item->id_image ?>]"
                                               id="gdgallery_images_name[<?= $item->id_image ?>]"
                                               value="<?= $item->name ?>">
                                        <span class="highlight_material"></span>
                                        <span class="bar_material"></span>
                                        <label><?= _e('Name', 'gdgallery'); ?></label>
                                    </div>


                                </td>
                                <td>

                                    <div class="group_material">
                                        <input type="text" name="gdgallery_images_description[<?= $item->id_image ?>]"
                                               id="gdgallery_images_description[<?= $item->id_image ?>]"
                                               value="<?= $item->description ?>">
                                        <span class="highlight_material"></span>
                                        <span class="bar_material"></span>
                                        <label><?= _e('Description', 'gdgallery'); ?></label>
                                    </div>

                                </td>
                                <td>

                                    <div class="group_material">
                                        <input type="text" name="gdgallery_images_link[<?= $item->id_image ?>]"
                                               id="gdgallery_images_link[<?= $item->id_image ?>]"
                                               value="<?= $item->link ?>">
                                        <span class="highlight_material"></span>
                                        <span class="bar_material"></span>
                                        <label><?= _e('Link', 'gdgallery'); ?></label>
                                    </div>
                                </td>
                               
                            </tr>
                        <?php endforeach;
                    } ?>
                    </tbody>
                </table>


            </div>
        </form>
    </div>
</div>

<div id="gdgallery-addvideo-modal" class="-gdgallery-modal">
    <div class="-gdgallery-modal-content">
        <div class="-gdgallery-modal-content-header">
            <div class="-gdgallery-modal-header-icon">

            </div>
            <div class="-gdgallery-modal-header-info">
                <h3><?= _e('Add Video URL From Youtube or Vimeo', 'gdgallery'); ?></h3>
            </div>
            <div class="-gdgallery-modal-close">
                <i class="fa fa-close"></i>
            </div>
        </div>
        <div class="-gdgallery-modal-content-body">
            <form action="admin.php?page=gdgallery&id=<?php echo $id_gallery; ?>&save_data_nonce=<?php echo $save_data_nonce; ?>"
                  method="post" id="gdgallery_add_video_form" name="gdgallery_add_video_form">

                <input type="hidden" name="gdgallery_id_gallery" value="<?= $id_gallery ?>">
                <ul class="video_fields">

                    <li>
                        <div class="group_material">
                            <input type="text" name="gdgallery_video_url" id="gdgallery_video_url" required
                                   value="">
                            <span class="highlight_material"></span>
                            <span class="bar_material"></span>
                            <label><?= _e('Video URL (Youtube or Vimeo)', 'gdgallery'); ?></label>
                        </div>
                    </li>

                    <li>

                        <div class="group_material">
                            <input type="text" name="gdgallery_video_name" id="gdgallery_video_name"
                                   value="">
                            <span class="highlight_material"></span>
                            <span class="bar_material"></span>
                            <label><?= _e('Title', 'gdgallery'); ?></label>
                        </div>
                    </li>
                    <li>

                        <div class="group_material">
                            <input type="text" name="gdgallery_video_description" id="gdgallery_video_description"
                                   value="">
                            <span class="highlight_material"></span>
                            <span class="bar_material"></span>
                            <label><?= _e('Description', 'gdgallery'); ?></label>
                        </div>

                    </li>
                    <li>
                        <div class="group_material">
                            <input type="text" name="gdgallery_video_link" id="gdgallery_video_link"
                                   value="">
                            <span class="highlight_material"></span>
                            <span class="bar_material"></span>
                            <label><?= _e('Link', 'gdgallery'); ?></label>
                        </div>
                    </li>
                </ul>

                <div class="video_save">
                    <input type="submit" value="<?= _e('Save', 'gdgallery'); ?>"
                           id="gdgallery-add-video-buttom"
                           class="gdgallery-save-buttom">
                    <span class="spinner"></span>
                </div>
            </form>


        </div>
    </div>
</div>
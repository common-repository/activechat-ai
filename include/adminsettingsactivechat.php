<?php
if (!defined('ABSPATH')) exit;
include 'saveId.php';

if (!empty($_POST) && wp_verify_nonce($_POST['accw_update_admin_settings_widget_name'], 'accw_update_admin_settings_widget') && current_user_can("manage_options")) {
    $full_mode = sanitize_text_field($_POST['acvv_full_mode']);

    $url_mode = esc_url($_POST['accw_full_screen_mode_url']);

    $bot_id = sanitize_key(get_option('acvv_save_bot_id'));


    acvv_save_active_widget_settings($full_mode, $url_mode);
} else {
    $full_mode = sanitize_text_field((get_option('acvv_save_full_mode')));

    $url_mode = esc_url((get_option('acvv_save_full_mode_url')));

    $bot_id = sanitize_key(get_option('acvv_save_bot_id'));

}




?>
<div class="AdminAcVV_Main">
    <nav class="AdminAcVV_tab-wrapper">
        <a href="<?php esc_attr_e(admin_url()); ?>admin.php?page=activechatwidget" class="AdminAcVV_nav-tab ">Connection</a>
        <a href="<?php esc_attr_e(admin_url()); ?>admin.php?page=facebookchatwidget_settings" class="AdminAcVV_nav-tab ">Facebook widget settings</a>
        <a href="<?php esc_attr_e(admin_url()); ?>admin.php?page=activechatwidget_settings" class="AdminAcVV_nav-tab AdminAcVV_nav-tab-active">Activechat widget settings</a>

    </nav>
    <?php if (empty($bot_id)) { ?>
        <div class="AdminAcVV_messege">
            <p>Connect the bot first!</p>
        </div>
    <?php
} ?>
    <div class="AdminAcVV_messege">
        <p>Customize the Activechat chat widget</p>
    </div>
    <div class="AdminAcVV_messege">
        <form method='post'>
            <div class="AdminAcVV_customize_tr AdminAcVV_customize_tr_full_screen">
                <div class="accw_full_screen_tr"  >
                    <span style="width: 250px">Full Screen mode</span>
                    <label class="switch">
                        <input onclick="changeFullscreen(this);" type="checkbox" id='AdminAcVV_form_activechat_checkbox' name="acvv_full_mode" value="true" <?php if ($full_mode == 'true') {
                                                                                                                                                                esc_attr_e('checked');
                                                                                                                                                            } ?>>
                        <span class="slider round" style='width: auto'></span>
                    </label>
                </div>
                <?php if ($full_mode == 'true') {
                    ?>
                    <div class="accw_full_screen_tr" style="width: 100%" >
                        <span class="accw_full_scrren_text_turn" style="width: 254px;" >Turn on full screen mode on following page:</span>
                        <input placeholder="http://example.com or https://example.com" class="accw_full_scrren_url_input" value="<?php _e(esc_url($url_mode)) ?>" style='width: 40%' required type='text' name="accw_full_screen_mode_url">
                    </div>

                <?php
            } else {
                ?>

                    <div class="accw_full_screen_tr"  style="width: 100%"  >

                        <span class="accw_full_scrren_text_turn" style="display: none; width: 254px;">Turn on full screen mode on following page:</span>
                        <input class="accw_full_scrren_url_input" style='width: 40%'  type='text' name="accw_full_screen_mode_url" hidden>

                    </div>

                <?php
            } ?>
            </div>

            <input name="accw_update_admin_settings_widget_name" type="hidden" value="<?php esc_attr_e(wp_create_nonce('accw_update_admin_settings_widget')); ?>" />

            <div class="AdminAcVV_customize_tr"> <input type="submit" class="AdminAcVV_submit_settings" value="Save" /> </div>
    </div>
    <script>
        function changeFullscreen(obg) {
            console.log(obg.checked);
            if(obg.checked === true){
                document.querySelector('.accw_full_scrren_url_input').removeAttribute('hidden');
                document.querySelector('.accw_full_scrren_text_turn').style.display = 'inline';
                document.querySelector('.accw_full_scrren_url_input').setAttribute('required', 'required');


            }else{
                document.querySelector('.accw_full_scrren_url_input').value = '';
                document.querySelector('.accw_full_scrren_url_input').setAttribute('hidden', 'hidden');
                document.querySelector('.accw_full_scrren_url_input').removeAttribute('required');

                document.querySelector('.accw_full_scrren_text_turn').style.display = 'none';


            }
        }
    </script>
    </form>
</div>
</div>
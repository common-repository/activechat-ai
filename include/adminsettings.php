<?php
if (!defined('ABSPATH')) exit;
include 'saveId.php';

if (!empty($_POST) && wp_verify_nonce($_POST['accw_update_admin_settings_name'], 'accw_update_admin_settings') && current_user_can("manage_options")) {
    $ref = sanitize_text_field($_POST['acvv_ref']);
    $color = sanitize_hex_color($_POST['acvv_color']);
    $logger_user = sanitize_text_field($_POST['acvv_logger_user']);
    $no_logger_user = sanitize_text_field($_POST['acvv_no_logger_user']);
    $dialog_display = sanitize_key($_POST['acvv_dialog_display']);
    $user_delay = sanitize_key($_POST['acvv_user_delay']);
    $bot_id = sanitize_key(get_option('acvv_save_bot_id'));

    acvv_save_settings($ref, $color, $logger_user, $no_logger_user, $dialog_display, $user_delay);
}

$ref = sanitize_text_field((get_option('acvv_save_ref') ? get_option('acvv_save_ref') : ""));
$color = sanitize_hex_color((get_option('acvv_color') ? get_option('acvv_color') : "#0084FF"));
$logger_user = sanitize_text_field((get_option('acvv_save_logger_user') ? get_option('acvv_save_logger_user') : "")) ;
$no_logger_user = sanitize_text_field((get_option('acvv_save_no_logger_user') ? get_option('acvv_save_no_logger_user') : ""));
$dialog_display = sanitize_key((get_option('acvv_save_dialog_display') ? get_option('acvv_save_dialog_display') : "show"));
$user_delay = sanitize_key((get_option('acvv_save_user_delay') ? get_option('acvv_save_user_delay') : ""));
$bot_id = sanitize_key(get_option('acvv_save_bot_id'));

?>
<div class="AdminAcVV_Main">
    <nav class="AdminAcVV_tab-wrapper">
        <a href="<?php esc_attr_e(admin_url()); ?>admin.php?page=activechatwidget" class="AdminAcVV_nav-tab ">Connection</a>
        <a href="<?php esc_attr_e(admin_url()); ?>admin.php?page=facebookchatwidget_settings" class="AdminAcVV_nav-tab AdminAcVV_nav-tab-active">Facebook widget settings</a>
        <a href="<?php esc_attr_e(admin_url()); ?>admin.php?page=activechatwidget_settings" class="AdminAcVV_nav-tab ">Activechat widget settings</a>
		
    </nav>
    <?php if (empty($bot_id)) { ?>
        <div class="AdminAcVV_messege">
            <p>Connect the bot first!</p>
        </div>
        <?php
   } ?>
   <div class="AdminAcVV_messege">
       <p>Customize the plugin</p>
   </div>
    <div class="AdminAcVV_messege">
        <form method='post' >
            <div class="AdminAcVV_customize_tr"><span>"ref" parameter to start bot skill</span><input name="acvv_ref" value="<?php esc_attr_e($ref) ?>" maxlength="1000" /></div>
            <div class="AdminAcVV_customize_tr"><span>Plugin color</span><input type="color" id="acvv_color" name="acvv_color" value="<?php esc_attr_e($color) ?>" /> <div class="AdminAcVV_defoult_color" onclick="setDefoultcolor()" >Set defoult</div> </div>
            <script>
            function setDefoultcolor(){
                document.querySelector('#acvv_color').value = '#0084FF'
            } 
            </script>
            <div class="AdminAcVV_customize_tr"><span>Greeting text for logged in users</span><input value="<?php esc_attr_e($logger_user) ?>" maxlength="300" name="acvv_logger_user" /></div>
            <div class="AdminAcVV_customize_tr"><span>Greeting text (users not logged in)</span><input value="<?php esc_attr_e($no_logger_user) ?>" maxlength="300" name="acvv_no_logger_user" /></div>
            <div class="AdminAcVV_customize_tr"><span>How the greeting dialog will be displayed</span>
                    <select name="acvv_dialog_display" value="<?php esc_attr_e($dialog_display) ?>">
                        <option value="show">show</option>
                        <option value="hide">hide</option>
                        <option value="fade">fade</option>
                    </select>
            </div>
            <div class="AdminAcVV_customize_tr"><span>Delay in seconds</span><input type="number" min="0" max="10" value="<?php esc_attr_e($user_delay) ?>" name="acvv_user_delay" />
							<input name="accw_update_admin_settings_name" type="hidden" value="<?php esc_attr_e(wp_create_nonce('accw_update_admin_settings')); ?>" />
			</div>
            <div class="AdminAcVV_customize_tr"> <input type="submit" class="AdminAcVV_submit_settings" value="Save" /> </div>
        </form>
    </div>
</div> 
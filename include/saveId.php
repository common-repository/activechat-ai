<?php
if (!defined('ABSPATH')) exit;


function acvv_save_bot_ids($id, $page_id, $app_id, $display_ac_widget, $acvv_agent_name)
{
    update_option("acvv_save_bot_id", $id);
    update_option("acvv_save_page_id", $page_id);
    update_option("acvv_save_app_id", $app_id);
    update_option("acvv_save_display_ac_widget", $display_ac_widget);
    update_option("acvv_agent_name", $acvv_agent_name);
}

function acvv_save_settings($ref, $color, $logger_user, $no_logger_user, $dialog_display, $user_delay)
{
    update_option("acvv_save_ref", $ref);
    update_option("acvv_color", $color);
    update_option("acvv_save_logger_user", $logger_user);
    update_option("acvv_save_no_logger_user", $no_logger_user);
    update_option("acvv_save_dialog_display", $dialog_display);
    update_option("acvv_save_user_delay", $user_delay);
}

function acvv_save_active_widget_settings($full_mode, $url_mode)
{
    update_option("acvv_save_full_mode", $full_mode);
    update_option("acvv_save_full_mode_url", $url_mode);
    
}


?>

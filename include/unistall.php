<?php
if (!defined('ABSPATH')) exit;
function accw_unistall()
{
    delete_option("acvv_save_bot_id");

    delete_option("acvv_save_page_id");
    delete_option("acvv_save_app_id");

    delete_option("acvv_save_ref");
    delete_option("acvv_color");
    delete_option("acvv_save_logger_user");
    delete_option("acvv_save_no_logger_user");
    delete_option("acvv_save_dialog_display");
    delete_option("acvv_save_user_delay");
    delete_option("acvv_save_display_ac_widget");

    delete_option("acvv_agent_name");
    delete_option("acvv_save_full_mode");
}

function accw_istall()
{
    $value = 'activechat';
    update_option("acvv_save_display_ac_widget", $value);
    if (!empty(sanitize_text_field(get_option('woocommerce_cart_redirect_after_add')))) {
        update_option("woocommerce_cart_redirect_after_add", 'no');
    }
    if (!empty(sanitize_text_field(get_option('woocommerce_enable_ajax_add_to_cart')))) {
        update_option("woocommerce_enable_ajax_add_to_cart", 'yes');
    }
}

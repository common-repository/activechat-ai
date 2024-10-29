<?php
/*
  Plugin Name: Activechat.ai chatbots and live chat
  Plugin URI:  https://activechat.ai/manuals/e-commerce-chatbots/wordpress-plugin/
  Description: Activechat.ai - smart multichannel chatbots and live chat - is a free plugin for WordPress which allows users to easily integrate their Activechat bots to any WordPress website with zero bot training or code knowledge required. Pure plug’n’play experience.
  Version:     1.0.10
  Author:      ActiveChat
  Author URI:  https://activechat.ai/
  License:     GPL2
 
  Activechat.ai - smart multichannel chatbots and live chat is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 2 of the License, or
  any later version.
 
  Activechat.ai - smart multichannel chatbots and live chat is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
  GNU General Public License for more details.
 
  You should have received a copy of the GNU General Public License
  along with Activechat.ai - smart multichannel chatbots and live chat. If not, see http://www.gnu.org/licenses/gpl-2.0.html.
*/
if (!defined('ABSPATH')) exit;
include_once("include/icon.php");
include_once("include/unistall.php");
include_once("include/track.php");
wp_register_style('namespace',  plugin_dir_url(__FILE__) . 'include/css/styleadmin.css', '', '1.1');
wp_enqueue_style('namespace');

add_action('admin_menu', 'accw_mt_add_pages');

function accw_mt_add_pages()
{
    add_menu_page('ActiveChat ChatWidget', 'ActiveChat.ai', 8, 'activechatwidget', 'accw_addadmin',  'none');
    add_submenu_page('activechatwidget', 'ActiveWidget', 'Connection', 8, 'activechatwidget');
}
function accw_addadmin()
{
    include_once("include/admin.php");
}

function accw_adminsettings()
{
    include_once("include/adminsettings.php");
}

function accw_adminsettings_active_chat()
{
    include_once("include/adminsettingsactivechat.php");
}

add_action('wp_footer', 'AdminAcVV_add_track');



function AdminAcVV_activation_plugin()
{
    add_option("acvv_save_display_ac_widget", 'facebook');
}

register_activation_hook(__FILE__, 'accw_istall');

register_uninstall_hook(__FILE__, 'accw_unistall');



add_action('admin_head', 'accw_custom_post_type_icon');

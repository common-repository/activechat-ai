<?php
if (!defined('ABSPATH')) exit;
include 'saveId.php';

if (!empty($_POST) && wp_verify_nonce($_POST['accw_update_admin_name'], 'accw_update_admin') && current_user_can("manage_options")) {
    $bot_id = sanitize_key($_POST['acvv_bot_id']) ? sanitize_key($_POST['acvv_bot_id']) : sanitize_key(get_option('acvv_save_bot_id'));
    $acvv_page_id = sanitize_key($_POST['acvv_page_id']);
    $acvv_app_id = sanitize_key($_POST['acvv_app_id']);
    $acvv_agent_name = sanitize_text_field($_POST['acvv_agent_name']);
    $display_ac_widget = empty($_POST['display_ac_widget']) ? sanitize_text_field($_POST['accw_service']) : sanitize_key($_POST['display_ac_widget']);


    acvv_save_bot_ids($bot_id, $acvv_page_id, $acvv_app_id, $display_ac_widget, $acvv_agent_name);
} else {
    $bot_id = sanitize_key(get_option('acvv_save_bot_id'));
    $display_ac_widget = sanitize_text_field(get_option('acvv_save_display_ac_widget'));
    $acvv_agent_name = sanitize_text_field(get_option('acvv_agent_name'));
}




?>

<div class="AdminAcVV_Main">
    <nav class="AdminAcVV_tab-wrapper">
        <a href="<?php esc_attr_e(admin_url()); ?>admin.php?page=activechatwidget" class="AdminAcVV_nav-tab AdminAcVV_nav-tab-active">Connection</a>
    </nav>

    <div class="AdminAcVV_messege">
        <p><?php if (empty($bot_id)) {
                esc_attr_e("Current connection: No bot connected");
            } else {
                esc_attr_e("Current connection: " . $bot_id . " ( " . $acvv_agent_name . " ) ");
            } ?> </p>
    </div>
    <!-- <div class="AdminAcVV_messege">
        <p>Don't forget to add your website domain to whitelist on Facebook. <a target="_blanck" href="*">Here's how</a> </p>
    </div> -->


    <form method='post' id="AdminAcVV_form" class="AdminAcVV_form">
        <div>
            <?php if (!empty($bot_id)) { ?>
                <div class="AdminAcVV_hr"></div>

                <div class="AdminAcVV_messege_he">
                    <div>
                        <span class="accw_text_activechat"> ActiveChat widget</span>
                        <label class="switch">
                            <input type="checkbox" id='AdminAcVV_form_activechat_checkbox' onclick='handleClickInput(this);' name="display_ac_widget" value="activechat">
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div>
                        <span class="accw_text_facebokchat">Facebook widget</span>
                        <label class="switch">
                            <input type="checkbox" id='AdminAcVV_form_facebook_checkbox' onclick='handleClickInput(this);' name="display_ac_widget" value="facebook">
                            <span class="slider round"></span>

                        </label>

                        <label style='display: none;' class="switch">
                            <input type="checkbox" id='AdminAcVV_form_none_checkbox' onclick='handleClickInput(this);' name="display_ac_widget" value="null" <?php if ($display_ac_widget == 'null') {
                                                                                                                                                                    esc_attr_e('checked');
                                                                                                                                                                } ?>>
                            <span class="slider round"></span>

                        </label>


                    </div>
                </div>
                <div class="AdminAcVV_messege_he">
                    <p>Connect another bot</p>
                </div>
            <?php
            } ?>
        </div>
        <script>
            function handleClickInput(cb) {
                if (document.querySelector('.AdminAcVV_submit').value !== "Update") {
                    document.querySelector('.AdminAcVV_submit').value = "Update";
                    document.querySelector('.AdminAcVV_submit').style.background = "#e0a800"
                }
                if (!document.querySelector('#AdminAcVV_form_facebook_checkbox').checked && !document.querySelector('#AdminAcVV_form_activechat_checkbox').checked) {
                    document.querySelector('#AdminAcVV_form_none_checkbox').checked = true;
                }

                if (cb.checked) {
                    if (document.querySelector('#AdminAcVV_form_activechat_checkbox') === cb) {

                        document.querySelector('#AdminAcVV_form_facebook_checkbox').checked = false;
                        document.querySelector('#AdminAcVV_form_activechat_checkbox').checked = true;
                        document.querySelector('#AdminAcVV_form_none_checkbox').checked = false;

                    }
                    // cb.checked.removeAttribute('checked');
                    if (document.querySelector('#AdminAcVV_form_facebook_checkbox') === cb) {

                        document.querySelector('#AdminAcVV_form_activechat_checkbox').checked = false;
                        document.querySelector('#AdminAcVV_form_facebook_checkbox').checked = true;
                        document.querySelector('#AdminAcVV_form_none_checkbox').checked = false;

                    }


                }
            }
        </script>
        <div style='display: flex; padding-left: 7px;'>
            <div class="AdminAcVV_34tr"><span>BOT ID:</span><input id="AdminAcVV_bot_id" value="" name="acvv_bot_id" />
                <input id="AdminAcVV_page_id" style="display: none;" value="valuepage" name="acvv_page_id" />
                <input id="AdminAcVV_app_id" style="display: none;" value="valueapp" name="acvv_app_id" />
                <input id="AdminAcVV_name" style="display: none;" value="valuename" name="acvv_agent_name" />
                <input name="accw_update_admin_name" type="hidden" value="<?php esc_attr_e(wp_create_nonce('accw_update_admin')); ?>" />
                <input id="AdminAcVV_service" name="accw_service" type="hidden" value="valueservice" />
            </div>
            <div class="AdminAcVV_34tr">
                <div class="accw_plugin_spinner accw_plugin_opacity">
                    <div class="accw_plugin_rect1"></div>
                    <div class="accw_plugin_rect2"></div>
                    <div class="accw_plugin_rect3"></div>
                    <div class="accw_plugin_rect4"></div>
                    <div class="accw_plugin_rect5"></div>
                </div>
                <?php if (!empty($bot_id)) { ?>
                    <input type="submit" class="AdminAcVV_submit" onclick="sendId(event)" value="Connect" />
                <?php  } else { ?>
                    <input type="submit" class="AdminAcVV_submit" onclick="sendIdNoAvtoriza(event)" value="Connect" />
                <?php } ?>
                <a target="_blank" href="https://www.youtube.com/watch?v=YX8qi7Vp6WI"> Where I can find bot id?</a>
            </div>
        </div>
    </form>

    <script>
        function sendIdNoAvtoriza(e) {
            e.preventDefault();


            document.querySelector('.AdminAcVV_submit').classList.toggle("accw_plugin_opacity");
            document.querySelector('.accw_plugin_spinner').classList.toggle("accw_plugin_opacity");



            let botId = document.querySelector('#AdminAcVV_bot_id').value;
            fetch(`https://app.activechat.ai/login/agentInfo?agentID=${botId}`, {

                cache: 'no-cache',
                headers: {
                    'Content-Type': 'application/json; charset=utf-8'
                },
                method: 'get',
            }).then(response => {
                return response.json();
            }).then(json => {
                if (json.error) {
                    alert(`error: ${json.error.message}`);
                    console.log(`error: ${json.error.message}`)

                    document.querySelector('.AdminAcVV_submit').classList.toggle("accw_plugin_opacity");
                    document.querySelector('.accw_plugin_spinner').classList.toggle("accw_plugin_opacity");

                } else {
                    console.log(json.agent)
                    document.querySelector('.AdminAcVV_submit').classList.toggle("accw_plugin_opacity");
                    document.querySelector('.accw_plugin_spinner').classList.toggle("accw_plugin_opacity");
                    document.querySelector('#AdminAcVV_name').value = json.agent.title;
                    document.querySelector('#AdminAcVV_form').submit();


                }

            }).catch(error => {
                document.querySelector('.AdminAcVV_submit').classList.toggle("accw_plugin_opacity");
                document.querySelector('.accw_plugin_spinner').classList.toggle("accw_plugin_opacity");
                console.log('error: ', error.message);
                alert(`error: ${error.message}`);
            });



        }


        function setembeddedCodeStatus(service) {
            let botIdBD = "<?php esc_attr_e(sanitize_key($bot_id)) ?>"
            console.log(service);
            document.querySelector('.AdminAcVV_submit').classList.toggle("accw_plugin_opacity");
            document.querySelector('.accw_plugin_spinner').classList.toggle("accw_plugin_opacity");

            let submitBotID = document.querySelector('#AdminAcVV_bot_id').value === "" ? botIdBD : document.querySelector('#AdminAcVV_bot_id').value;

            fetch(`https://app.activechat.ai/login/addDomain?agentID=${submitBotID}&domain=<?php esc_attr_e(get_site_url()); ?>${service === 'activechat' ? "&service=ActiveChat" : service === 'facebook' ? "&service=Facebook" : '' }`, {

                cache: 'no-cache',
                headers: {
                    'Content-Type': 'application/json; charset=utf-8'
                },
                method: 'get',
            }).then(response => {
                return response.json();
            }).then(json => {
                if (json.error) {
                    alert(`error: ${json.error.message}`);
                    console.log(`error: ${json.error.message}`)
                    document.querySelector('.AdminAcVV_submit').classList.toggle("accw_plugin_opacity");
                    document.querySelector('.accw_plugin_spinner').classList.toggle("accw_plugin_opacity");
                } else {


                    document.querySelector('.AdminAcVV_submit').classList.toggle("accw_plugin_opacity");
                    document.querySelector('.accw_plugin_spinner').classList.toggle("accw_plugin_opacity");


                    if (service === 'facebook') {
                        document.querySelector('#AdminAcVV_form_facebook_checkbox').checked = true;

                    } else if (service === 'activechat') {
                        document.querySelector('#AdminAcVV_form_activechat_checkbox').checked = true;

                    } else {

                        document.querySelector('#AdminAcVV_form_activechat_checkbox').checked = false;
                        document.querySelector('#AdminAcVV_form_facebook_checkbox').checked = false;
                    }


                }

            }).catch(error => {
                document.querySelector('.AdminAcVV_submit').classList.toggle("accw_plugin_opacity");
                document.querySelector('.accw_plugin_spinner').classList.toggle("accw_plugin_opacity");
                console.log('error: ', error.message);
                alert(`error: ${error.message}`);
            });
        }


        function sendId(e) {

            e.preventDefault();

            document.querySelector('.AdminAcVV_submit').classList.toggle("accw_plugin_opacity");
            document.querySelector('.accw_plugin_spinner').classList.toggle("accw_plugin_opacity");

            let botIdBD = "<?php esc_attr_e(sanitize_key($bot_id)) ?>"

            let submitBotID = document.querySelector('#AdminAcVV_bot_id').value === "" ? botIdBD : document.querySelector('#AdminAcVV_bot_id').value;

            let service = document.querySelector('[name=display_ac_widget]:checked') ? document.querySelector('[name=display_ac_widget]:checked').value : 'null'

            console.log(service)

            fetch(`https://app.activechat.ai/login/addDomain?agentID=${submitBotID}&domain=<?php esc_attr_e(get_site_url()); ?>${service === 'activechat' ? "&service=ActiveChat" : service === 'facebook' ? "&service=Facebook" : '' }`, {

                cache: 'no-cache',
                headers: {
                    'Content-Type': 'application/json; charset=utf-8'
                },
                method: 'get',
            }).then(response => {
                return response.json();
            }).then(json => {
                if (json.error) {
                    alert(`error: ${json.error.message}`);
                    console.log(`error: ${json.error.message}`)
                    document.querySelector('.AdminAcVV_submit').classList.toggle("accw_plugin_opacity");
                    document.querySelector('.accw_plugin_spinner').classList.toggle("accw_plugin_opacity");
                } else {

                    document.querySelector('#AdminAcVV_name').value = json.title;

                    document.querySelector('.AdminAcVV_submit').classList.toggle("accw_plugin_opacity");
                    document.querySelector('.accw_plugin_spinner').classList.toggle("accw_plugin_opacity");
                    document.querySelector('#AdminAcVV_form').submit();
                }

            }).catch(error => {
                document.querySelector('.AdminAcVV_submit').classList.toggle("accw_plugin_opacity");
                document.querySelector('.accw_plugin_spinner').classList.toggle("accw_plugin_opacity");
                console.log('error: ', error.message);
                alert(`error: ${error.message}`);
            });


        }

        function getBotSettings() {
            let botId = "<?php esc_attr_e(sanitize_key($bot_id)) ?>";
            fetch(`https://app.activechat.ai/login/agentInfo?agentID=${botId}`, {

                cache: 'no-cache',
                headers: {
                    'Content-Type': 'application/json; charset=utf-8'
                },
                method: 'get',
            }).then(response => {
                return response.json();
            }).then(json => {
                if (json.error) {
                    alert(`error: ${json.error.message}`);
                    console.log(`error: ${json.error.message}`)

                } else {
                    console.log(json.agent)
                    if (!json.agent.embedCodeStatus) {

                        console.log('no embedCodeStatus');
                        setembeddedCodeStatus('<?php if ($display_ac_widget == 'activechat') {
                                                    esc_attr_e('activechat');
                                                } else if ($display_ac_widget == 'facebook') {
                                                    esc_attr_e('facebook');
                                                } else if ($display_ac_widget == 'null') {
                                                    esc_attr_e('false');
                                                } ?>');

                    } else if (json.agent.embedCodeStatus.selectedWidget === 'Facebook') {
                        document.querySelector('#AdminAcVV_form_facebook_checkbox').checked = true;
                    } else if (json.agent.embedCodeStatus.selectedWidget === 'ActiveChat') {
                        document.querySelector('#AdminAcVV_form_activechat_checkbox').checked = true;
                    }
                }

            }).catch(error => {

                console.log('error: ', error.message);
                alert(`error: ${error.message}`);
            });

        }
        window.addEventListener("load", function() {
            if ('<?php if (!empty($bot_id)) {
                        esc_attr_e("true");
                    } ?>' == 'true') {
                getBotSettings();
            }
        }, false);
    </script>
    <?php if (!empty($bot_id)) { ?>
        <div class="AdminAcVV_messege">
            <p style="white-space: pre-wrap">You can track user activity by following variables:

                <mark class="accw_mark_bold">event add_to_cart:</mark>

                • cart_item_key : <mark class="accw_mark_italic">$_woo_cart_cart_item_key</mark>,
                • cart_product_id: <mark class="accw_mark_italic">$_woo_cart_product_id</mark>,
                • quantity: <mark class="accw_mark_italic">$_woo_cart_quantity</mark>,
                • cart_variation_id: <mark class="accw_mark_italic">$_woo_cart_variation_id</mark>,
                • cart_variation: <mark class="accw_mark_italic">$_woo_cart_variation</mark>,
                • cart_cart_item_data: <mark class="accw_mark_italic">$_woo_cart_cart_item_data</mark>

                <mark class="accw_mark_bold">event order_create:</mark>

                • order number: <mark class="accw_mark_italic">$_woo_order_id</mark>

                When user is adding something to his/her shopping cart, your bot will react to this and chat with user based on specific skill that you design (example e-commerce skills included in our 'WooCommerce bot template'.</p>
        </div>
    <?php
    } ?>
</div>



<?php

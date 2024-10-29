<?php
if (!defined('ABSPATH')) exit;

function AdminAcVV_add_track()
{
    $bot_id = sanitize_key(get_option('acvv_save_bot_id'));

    ?>
    <script>
        (function() {
            var script = document.createElement('script');
            script.src = 'https://app.activechat.ai/script/<?php esc_attr_e($bot_id); ?>';
            script.id = 'ACCW_EMBED';
            script.onload = () => {
                try {
                    loadedACCWScript();
                } catch {}
            }
            document.getElementsByTagName('head')[0].appendChild(script);
        })();
    </script>
    <?php

    }

    function AdminAcVV_add_action_woocommerce_add_to_cart($cart_item_key, $product_id, $quantity, $variation_id, $variation, $cart_item_data)
    {
        if (!empty($_POST)  && sanitize_text_field(get_option('woocommerce_cart_redirect_after_add')) == 'no') {
            ?>
        <script>
            function loadedACCWScript() {
                document.querySelector('#AC_TRACK').addEventListener('load', function() {
                    activechat.track('add_to_cart', {
                        _woo_cart_cart_item_key: '<?php esc_attr_e($cart_item_key); ?>',
                        _woo_cart_product_id: '<?php esc_attr_e($product_id); ?>',
                        _woo_cart_quantity: '<?php esc_attr_e($quantity); ?>',
                        _woo_cart_variation_id: '<?php esc_attr_e($variation_id); ?>',
                        _woo_cart_variation: '<?php esc_attr_e($variation); ?>',
                        _woo_cart_cart_item_data: '<?php esc_attr_e($cart_item_data); ?>',
                    });
                });
            }
        </script>
        <?php
            }
        }
        add_action('woocommerce_add_to_cart', 'AdminAcVV_add_action_woocommerce_add_to_cart', 10, 6);


        function accw_add_action_woocommerce_new_order()
        {
            if (class_exists('WooCommerce')) {
                if (is_order_received_page() == 1) {
                    global $wp;
                    $order_id = $wp->query_vars['order-received'];
                    $customer_id = get_post_meta($order_id, '_customer_user', true);
                    $agent_id = sanitize_key(get_option('acvv_save_bot_id'));
                    $user_id = '12'
                    ?>
            <script>
                function loadedACCWScript() {
                    document.querySelector('#AC_TRACK').addEventListener('load', function() {
                        activechat.track('order_create', {
                            _woo_order_id: '<?php esc_attr_e($order_id); ?>'
                        });
                    });



                    const setBind = (agentID, userID, orderID, customerID) => {
                        return new Promise((resolve, reject) => {
                            const BINDS_SERVER_URL = 'https://components-ecommerce.herokuapp.com'

                            let url = new URL(`${BINDS_SERVER_URL}/webhook/bind`)

                            fetch(url, {
                                    mode: 'cors',
                                    method: 'post',
                                    headers: {
                                        'Content-Type': 'application/json'
                                    },
                                    body: JSON.stringify({
                                        agentID,
                                        userID,
                                        orderID,
                                        customerID
                                    }),
                                })
                                .then((response) => {
                                    return response.json()
                                }).then(data => {
                                    if (!data.ok) throw new Error(data.result)
                                    resolve(data.result)
                                }).catch((e) => {
                                    reject({
                                        message: e.message
                                    })
                                });
                        })
                    }

                    const getUserByAnonymousID = (agentID, anonymousID) => {
                        return new Promise((resolve, reject) => {
                            const ARCHITECTOR_SERVER_URL = 'https://architector-dot-activechat-200215.appspot.com'

                            let url = new URL(`${ARCHITECTOR_SERVER_URL}/anonymous/user`)

                            fetch(url, {
                                    mode: 'cors',
                                    method: 'post',
                                    headers: {
                                        'Content-Type': 'application/json'
                                    },
                                    body: JSON.stringify({
                                        agentID,
                                        anonymousID
                                    }),
                                })
                                .then((response) => {
                                    return response.json()
                                }).then(data => {
                                    if (!data.ok) throw new Error(data.result)
                                    resolve(data.result)
                                }).catch((e) => {
                                    reject({
                                        message: e.message
                                    })
                                });
                        })
                    }


                    getUserByAnonymousID('<?php esc_attr_e($agent_id); ?>', activechat.anonymousID)
                        .then((user) => {

                            return setBind('<?php esc_attr_e($agent_id); ?>', `${user.user.id}`, '<?php esc_attr_e($order_id); ?>', '<?php esc_attr_e($customer_id); ?>');

                        })
                        .then(() => {

                        })
                        .catch(error => {
                            console.error('[ERROR]:', error.message)
                        })







                };
            </script>
    <?php
            }
        }
    };


    add_action('wp_footer', 'accw_add_action_woocommerce_new_order');


    function accw_add_action_woocommerce_add_to_cart_ajax()
    {
        ?>
    <script>
        window.addEventListener('load', function() {

            let ajaxButton = document.querySelectorAll('.ajax_add_to_cart');
            for (var i = 0; i < ajaxButton.length; i++) {
                ajaxButton[i].addEventListener('click', function(event) {
                    activechat.track('add_to_cart', {
                        _woo_cart_cart_item_key: 'null',
                        _woo_cart_product_id: event.target.getAttribute('data-product_id'),
                        _woo_cart_quantity: event.target.getAttribute('data-quantity'),
                        _woo_cart_variation_id: 'null',
                        _woo_cart_variation: 'nuu',
                        _woo_cart_cart_item_data: 'null'

                    })
                })
            }
        });
    </script>
<?php
};

add_action('wp_footer', 'accw_add_action_woocommerce_add_to_cart_ajax');

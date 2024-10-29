=== Activechat.ai chatbots and live chat ===
Contributors: activechat
Tags: chatbot, activechat, messenger, live chat
Requires at least: 2.3
Tested up to: 5.1.1
Stable tag: 1.0.9
Version: 1.0.9 
Requires PHP: 5.2.4 

Smart AI conversations for customer support, e-commerce and marketing. Build a chatbot with zero coding knowledge required.


== Description ==

Looking for new ways to increase your sales, customer support quality and retention? Smart AI chatbots are here to help, and will understand all your users queries - even with typos, and in various languages.

Activechat.ai is a smart conversation design and chatbot platform, allowing you to design your own customer support or marketing bot with zero technical background.

This plugin connects your Activechat bot to your Wordpress website and Woocomerce store. Just fill in your Activechat bot ID and your chatbot widget will appear in the right bottom corner of your website. You can choose native Activechat widget (no auth required) or Facebook widget (Facebook auth required from your users).

Integrated with your Woocomerce store your bot can display any product or category of products which is currently listed in your store, and send cart abandonment reminders.



Currently supported features:

*Google Sheets and Google Calendar integration
*E-mail autoresponder
*Twillio integration for SMS
*DialogFlow integration
 
Chatbots are great to create more engagement and drive more sales:

*Connect your chatbot to answer customers questions
*Send order confirmations and tracking info
*Show related products and upsells
*Send promotional coupons and discounts
*Send cart reminders


Direct Messenger communication gets 5-10x more open rate and 10x-20x more click rate than traditional email - start utilizing this today with our simple integration system.

Plugin is sending distinct ref= parameters so that your chatbot can tell if the user is adding something to cart or doing checkout.

[youtube https://www.youtube.com/watch?v=YX8qi7Vp6WI]

== Installation ==

1. Copy the plugin folder to <strong>/wp-content/plugins/</strong> or you can use the automatic installation. 
2. Automatic installation is the easiest way, because WordPress handles the file transfer for you, and you do not need to leave your web browser. To install plugin automatically log in to your WordPress administrator, go to the Plug-ins menu, and click Add New. In the search box, type "Activechat" and click "Search for plug-ins". Once you find the plugin, you can install it by simply clicking "Install Now".
3. Activate the plugin through the <strong>Plugins</strong> menu (click Activate).
4. Go to "connection" tab in Activechat.ai plugin and enter your bot id. It's done. You're all setup. 
6.Enjoy.

What's "tracking"? 
You can track user activity by following variables:

event add_to_cart:

cart_item_key : $_woo_cart_cart_item_key ,
cart_product_id: $_woo_cart_product_id,
quantity: $_woo_cart_quantity,
cart_variation_id: $_woo_cart_variation_id,
cart_variation: $_woo_cart_variation,
cart_cart_item_data: $_woo_cart_cart_item_data

event order_create:
 
order number: $_woo_order_id

When user is adding something to his/her shopping cart, your bot will react to this and chat with user based on specific skill that you design (example e-commerce skills included in our 'WooCommerce bot template'.

How to connect tracking to your bot?

Simple way: create new Activechat.ai bot from "WooCommerce bot template" and use that bot ID in the plugin.

Advanced way (for those who want to customize conversations):

1. Go to your app.activechat.ai and choose the bot which is connected to your Wordpress website.  
2. Create two skills inside your bot - "add_to_cart" and "order_create"
3. Use "add_to_cart" skill to perform actions when user is adding something to the shopping cart (check "WooCommerce bot template" for the example of cart abandonment feature)
4. Use "order_create" skill to perform actions when user is completing his/her order

== Frequently Asked Questions ==

= Where do I get the chatbot? =
You can create a simple chatbot for free in a couple of minutes with Activechat.ai platform. It will handle basic communication with your customers. Message ask@activechat.ai if you need more info or any help in setting this up.

= I cannot get the plugin to work! =
(1) Check correct Bot ID


== Screenshots ==

1. Step 1 : Place bot id here  ( You can find bot id in your Bot settings -> general  in app.activechat.ai )
2. Step 2 : After connection, you can choose between Activechat plugin or Facebook chat widget.
3. Additional : If you choose Facebook chat widget you can customize chat widget color, choose "ref" parameter to start bot skill, place a greeting messege to  logged users, choose How the greeting dialog will be displayed , place a delay when chat widget will be displayed.

== Changelog ==
= 1.0 =
Add plugin in the folder.
= 1.0.1 =
Minor bugs were fixed
Track F.A.Q. was added to settings page
= 1.0.2 =
Added Activechat widget settings tab
= 1.0.3 =
Minor bugs were fixed
= 1.0.4 =
Tracking code were updated
= 1.0.5 =
Problem with "is_order_received_page" function was fixed
= 1.0.6 =
Minor CSS bugs were fixed
= 1.0.7 =
The version of CSS file was updated
= 1.0.8 =
-Minor bugs fixed
-Colour settings and FB widget settings were removed from the plugin. 
-Now you can customize chat widgets settings from General page in app.activechat.ai
 = 1.0.9 =
Fixed bug with "add_to_cart" event
 = 1.0.10 =
Delay before loading scripts was deleted

== Upgrade Notice ==
= 1.0.10 =
Delay before loading scripts was deleted






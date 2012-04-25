<?php
/*
  $Id: checkout_success.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE_1', 'Checkout');
define('NAVBAR_TITLE_2', 'Success');

define('HEADING_TITLE', '<b>Your order has been successfully processed!</b><br><br> We will review it and a sale\'s manager will contact you to confirm your order.<br><br> If all looks good, your products will arrive at their destination within  7 - 12 business days.');

define('TEXT_SUCCESS', '');

define('TEXT_ORDER_NUMBER', ' ');
define('TEXT_TITRE',' ');

define('TEXT_SUCCESS_HIGH', '<b>Your order was successful sent !<b> We will review it and send you an email to confirm the order. If all looks good, we will then contact you within 24
 hours by phone to confirm your shipment.<br>Your goods will be dispached as soon as possible. ');

define('TEXT_SUCCESS_LESS', 'Thank you, your order was successful and payment has been made! Your goods will be dispached as soon as possible. Please visit again soon.');

define('TEXT_NOTIFY_PRODUCTS', 'Please notify me of updates to the products I have selected below:');
define('TEXT_SEE_ORDERS', 'You can view your order history by going to the <a href="' . tep_href_link(FILENAME_ACCOUNT, '', 'SSL') . '">\'My Account\'</a> page and by clicking on <a href="' . tep_href_link(FILENAME_ACCOUNT_HISTORY, '', 'SSL') . '">\'History\'</a>.');
define('TEXT_CONTACT_STORE_OWNER', 'Please direct any questions you have to the <a href="' . tep_href_link(FILENAME_CONTACT_US) . '">store owner</a>.');
define('TEXT_THANKS_FOR_SHOPPING', 'Thanks for shopping with us online!<br>');

define('TABLE_HEADING_COMMENTS', 'Enter a comment for the order processed');

define('TABLE_HEADING_DOWNLOAD_DATE', 'Expiry date: ');
define('TABLE_HEADING_DOWNLOAD_COUNT', ' downloads remaining');
define('HEADING_DOWNLOAD', 'Download your products here:');
define('FOOTER_DOWNLOAD', 'You can also download your products at a later time at \'%s\'');
?>
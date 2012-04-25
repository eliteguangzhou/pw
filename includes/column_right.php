<?php
/*
  $Id: column_right.php,v 1.17 2003/06/09 22:06:41 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
?>
<table border="0"cellspacing="0" cellpadding="0" class="box_width_right">
	<tr><td><?php echo tep_draw_separator('spacer.gif', '9', '1'); ?></td>
		<td width="100%">
			<table border="0" cellspacing="0" cellpadding="0">
<?php
  //--------------Affichage des categories
  
    if ((USE_CACHE == 'true') && empty($SID)) {
    echo tep_cache_categories_box();
  } else {
    include(DIR_WS_BOXES . 'categories.php');
  }
  
  
  
 //--------------Fin affichage des categories 

// -------------------------------------------------
  if ((USE_CACHE == 'true') && empty($SID)) {
    echo tep_cache_manufacturers_box();
  } else {
    include(DIR_WS_BOXES . 'manufacturers.php');
  }
// ----------Fin Affichage manufacturers

  //--------- Affichage BESTSELLING
      include(DIR_WS_BOXES . 'bestselling.php');
	  
// ----------Fin Affichage BESTSELLING
  if (isset($HTTP_GET_VARS['products_id'])) {
    if (tep_session_is_registered('customer_id')) {
      $check_query = tep_db_query("select count(*) as count from " . TABLE_CUSTOMERS_INFO . " where customers_info_id = '" . (int)$customer_id . "' and global_product_notifications = '1'");
      $check = tep_db_fetch_array($check_query);
      if ($check['count'] > 0) {
        include(DIR_WS_BOXES . 'best_sellers.php');
      } else {
     include(DIR_WS_BOXES . 'product_notifications.php');
      }
    } else {
      include(DIR_WS_BOXES . 'product_notifications.php');
    }
  } else {
    include(DIR_WS_BOXES . 'best_sellers.php');
  }  

// ------------------------------------------------- 
  if (isset($HTTP_GET_VARS['products_id'])) {
    if (basename($PHP_SELF) != FILENAME_TELL_A_FRIEND) include(DIR_WS_BOXES . 'tell_a_friend.php');
  } else {
    include(DIR_WS_BOXES . 'specials.php');
  }
?>
				<tr><td><?php echo tep_image(DIR_WS_IMAGES.'LONGBAN.gif')?></td></tr>
			</table>
		</td>
	</tr>
</table>


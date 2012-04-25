<?php
/*
  $Id: column_left.php,v 1.15 2003/07/01 14:34:54 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
?>
<table border="0"cellspacing="0" cellpadding="0" class="box_width_left">
	<tr><td width="100%">
		<table border="0" cellspacing="0" cellpadding="0">
<?php
/*
  if ((USE_CACHE == 'true') && empty($SID)) {
    echo tep_cache_categories_box();
  } else {
    include(DIR_WS_BOXES . 'categories.php');
  }*/
  echo '<tr><td>';
  require('principalgauche.php');
  if (isset($HTTP_GET_VARS['letter'])) {$lettre=$HTTP_GET_VARS['letter'];

}else{
$lettre="A";
}
  bestmarque($current_category_id,$lettre);
  statiquebestproducts($current_category_id);
    echo '</tr></td>';
// -------------------------------------------------  
  require(DIR_WS_BOXES . 'discount.php');    
  require(DIR_WS_BOXES . 'information.php');     
   
 /*<tr><td><a href="<?php echo tep_href_link('specials.php')?>"><?php echo tep_image(DIR_WS_IMAGES.'bann1.jpg')?></a></td></tr> */
?>

				
                <tr><td height="10"><?php echo tep_draw_separator('spacer.gif', '1', '1'); ?></td></tr>
<?php                
  
// -------------------------------------------------
//  require(DIR_WS_BOXES . 'whats_new.php');  
// -------------------------------------------------
//  if (tep_session_is_registered('customer_id')) include(DIR_WS_BOXES . 'order_history.php');
// -------------------------------------------------  
//  if (isset($HTTP_GET_VARS['products_id'])) include(DIR_WS_BOXES . 'manufacturer_info.php');  
// -------------------------------------------------  
//  require(DIR_WS_BOXES . 'search.php');
// -------------------------------------------------
//  require(DIR_WS_BOXES . 'reviews.php');  
// -------------------------------------------------
  if (substr(basename($PHP_SELF), 0, 8) != 'checkout') {
//    include(DIR_WS_BOXES . 'languages.php');
//    include(DIR_WS_BOXES . 'currencies.php');
  }
//  require(DIR_WS_BOXES . 'shopping_cart.php');  
 
?>
		</table>
	</td>
	<td><?php echo tep_draw_separator('spacer.gif', '9', '1'); ?></td></tr>
</table>

<?php
/*
  $Id: product_info.php,v 1.97 2003/07/01 14:34:54 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_PRODUCT_INFO);

  $product_check_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "'");
  $product_check = tep_db_fetch_array($product_check_query);
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>">
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<script language="javascript"><!--
function popupWindow(url) {
  window.open(url,'popupWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,copyhistory=no,width=100,height=100,screenX=150,screenY=150,top=150,left=150')
}
//--></script>
</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->

<!-- body //-->
<table border="0" width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td class="col_left">
<!-- left_navigation //-->
<?php require(DIR_WS_INCLUDES . 'column_left.php'); ?>
<!-- left_navigation_eof //-->
    </td>
<!-- body_text //-->
    <td width="100%" class="col_center"><?php echo tep_draw_form('cart_quantity', tep_href_link(FILENAME_PRODUCT_INFO, tep_get_all_get_params(array('action')) . 'action=add_product')); ?><table border="0" width="100%" cellspacing="0" cellpadding="0">
<?php
  if ($product_check['total'] < 1) {
?>
      <tr><td>
<? tep_draw_heading_top(901); ?>

		<?php echo tep_draw_title_top();?>

					<?php echo TEXT_PRODUCT_NOT_FOUND;?>
			
		<?php echo tep_draw_title_bottom();?>
	
<? tep_draw_heading_top_1(); ?>				  
		

		
		<!-- 
		<table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">
          <tr class="infoBoxContents">
		  	<td> 
			-->
				<br style="line-height:1px;"><br style="line-height:12px;">
			
				<table border="0" width="100%" cellspacing="0" cellpadding="2">
				  <tr>
					<td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
					<td align="right"><?php echo '<a href="' . tep_href_link(FILENAME_DEFAULT) . '">' . tep_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE) . '</a>'; ?></td>
					<td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
				  </tr>
				</table>
				
			<!-- 	
			</td>
          </tr>
        </table>
		 -->
	
	
<? tep_draw_heading_bottom_1(); ?>

<? tep_draw_heading_bottom(); ?>

<?php
  } else {
    $product_info_query = tep_db_query("select p.products_id, pd.products_name, pd.products_description, p.products_model, p.products_quantity, p.products_image, pd.Brand, pd.Gender, pd.Gamme, pd.Prix_achat, pd.Note, pd.Annee, pd.Item_size, pd.products_url, p.products_price, p.products_tax_class_id, p.products_date_added, p.products_date_available, p.manufacturers_id from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "'");
    $product_info = tep_db_fetch_array($product_info_query);

    tep_db_query("update " . TABLE_PRODUCTS_DESCRIPTION . " set products_viewed = products_viewed+1 where products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and language_id = '" . (int)$languages_id . "'");

    if ($new_price = tep_get_products_special_price($product_info['products_id'])) {
      $products_price = '<s>' . $currencies->display_price($product_info['products_price'], tep_get_tax_rate($product_info['products_tax_class_id'])) . '</s> <span class="productSpecialPrice">' . $currencies->display_price($new_price, tep_get_tax_rate($product_info['products_tax_class_id'])) . '</span>';
    } else {
      $products_price = $currencies->display_price($product_info['products_price'], tep_get_tax_rate($product_info['products_tax_class_id']));
    }

    $products_name = $product_info['products_name'];
?>
      <tr>
        <td>
		
<? tep_draw_heading_top(901); ?>

<?php echo tep_draw_title_top();?>

			<?php echo $breadcrumb->trail(' &raquo; ')?> 
			
<?php echo tep_draw_title_bottom();?>	
	
								
<? tep_draw_heading_top_1(); ?>	
<?  /*   tep_draw_heading_top_2();  */  ?>		
		

<?php
    if (tep_not_null($product_info['products_image'])) {
?>
												<table cellspacing="0" cellpadding="0" border="0" class="product">
													<tr><td>
															<table cellspacing="0" cellpadding="0" border="0">
																<tr><td height="100%">
		<table cellpadding="0" cellspacing="0" border="0" align="left" class="prod_info">
			<tr><td align="center">
			
<?php
echo tep_draw_prod_pic_top();
$prod_img = file_exists(DIR_WS_IMAGES . $product_info['products_image']) ? DIR_WS_IMAGES . $product_info['products_image'] : DIR_WS_IMAGES . '/no_img.gif';
?>

<script language="javascript"><!--
document.write('<?php echo '<a href="javascript:popupWindow(\\\'' . tep_href_link(FILENAME_POPUP_IMAGE, 'pID=' . $product_info['products_id']) . '\\\')">' . tep_image($prod_img, addslashes($product_info['products_name']), SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, ' style="margin:0px 0px 0px 0px;"') . ''; ?>');
//--></script>
<noscript>
<?php
echo '<a href="' . tep_href_link(DIR_WS_IMAGES . $product_info['products_image']) . '" target="_blank">' . tep_image($prod_img, $product_info['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, ' style="margin:0px 0px 0px 0px;"') . ''; ?>
</noscript>

<?php echo tep_draw_prod_pic_bottom();?>

			</td></tr>
			<tr><td align="center">
<script language="javascript"><!--
document.write('<?php echo '<div><a href="javascript:popupWindow(\\\'' . tep_href_link(FILENAME_POPUP_IMAGE, 'pID=' . $product_info['products_id']) . '\\\')">' . TEXT_CLICK_TO_ENLARGE . '</a></div>'; ?>');
//--></script>
<noscript>
<?php echo '<div><a href="' . tep_href_link(DIR_WS_IMAGES . $product_info['products_image']) . '" target="_blank"><br style="line-height:7px">' . TEXT_CLICK_TO_ENLARGE . '</a></div>'; ?>
</noscript>
			</td></tr>
		</table>
		<table cellpadding="0" cellspacing="0" border="0" class="title_info">
			<tr><td><em><?php echo $products_name; ?></em></td></tr>
		</table>

<div class="padd3"><?php echo display_product_name('', $product_info, true); ?>
<br><br style="line-height:11px"><span class="productSpecialPrice"><?=$products_price?></span></div>																	
																
																   </td></tr>
					 							  
															</table>
														</td>
													</tr>
												</table>
<?php
    }
?>
<?  /*   tep_draw_heading_bottom_2();  */  ?>
				  <table cellspacing="0" cellpadding="0" border="0" align="center" style="margin:15px 0px 15px 0px; height:1px;">
				   	<tr><td  class="bg_line_x"><?php echo tep_draw_separator('spacer.gif', '1', '1');?></td></tr>
				  </table>		
<? tep_draw_heading_top_2();?>

<?php
    $products_attributes_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_ATTRIBUTES . " patrib where patrib.products_id='" . (int)$HTTP_GET_VARS['products_id'] . "' and patrib.options_id = popt.products_options_id and popt.language_id = '" . (int)$languages_id . "'");
    $products_attributes = tep_db_fetch_array($products_attributes_query);
    if ($products_attributes['total'] > 0) {
?>
									<table cellpadding="0" cellspacing="0" class="box_width_cont product">
												<tr><td height="25" colspan="2"><strong><?php echo TEXT_PRODUCT_OPTIONS; ?></strong></td></tr>		 
<?php
      $products_options_name_query = tep_db_query("select distinct popt.products_options_id, popt.products_options_name from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_ATTRIBUTES . " patrib where patrib.products_id='" . (int)$HTTP_GET_VARS['products_id'] . "' and patrib.options_id = popt.products_options_id and popt.language_id = '" . (int)$languages_id . "' order by popt.products_options_name");
      while ($products_options_name = tep_db_fetch_array($products_options_name_query)) {
        $products_options_array = array();
        $products_options_query = tep_db_query("select pov.products_options_values_id, pov.products_options_values_name, pa.options_values_price, pa.price_prefix from " . TABLE_PRODUCTS_ATTRIBUTES . " pa, " . TABLE_PRODUCTS_OPTIONS_VALUES . " pov where pa.products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and pa.options_id = '" . (int)$products_options_name['products_options_id'] . "' and pa.options_values_id = pov.products_options_values_id and pov.language_id = '" . (int)$languages_id . "'");
        while ($products_options = tep_db_fetch_array($products_options_query)) {
          $products_options_array[] = array('id' => $products_options['products_options_values_id'], 'text' => $products_options['products_options_values_name']);
          if ($products_options['options_values_price'] != '0') {
            $products_options_array[sizeof($products_options_array)-1]['text'] .= ' (' . $products_options['price_prefix'] . $currencies->display_price($products_options['options_values_price'], tep_get_tax_rate($product_info['products_tax_class_id'])) .') ';
          }
        }

        if (isset($cart->contents[$HTTP_GET_VARS['products_id']]['attributes'][$products_options_name['products_options_id']])) {
          $selected_attribute = $cart->contents[$HTTP_GET_VARS['products_id']]['attributes'][$products_options_name['products_options_id']];
        } else {
          $selected_attribute = false;
        }
?>
            <tr>
              <td class="main"><?php echo $products_options_name['products_options_name'] . ':'; ?></td>
              <td class="main"><?php echo tep_draw_pull_down_menu('id[' . $products_options_name['products_options_id'] . ']', $products_options_array, $selected_attribute); ?></td>
            </tr>
			<tr><td height="10" colspan="2"></td></tr>
<?php
      }
?>
          </table>
<?php
    }
?>

<?php
    $reviews_query = tep_db_query("select count(*) as count from " . TABLE_REVIEWS . " where products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "'");
    $reviews = tep_db_fetch_array($reviews_query);
    if ($reviews['count'] > 0) {
?>
						<table cellpadding="0" cellspacing="0" class="product box_width_cont">
							<tr><td class="line_h"><?php echo TEXT_CURRENT_REVIEWS . ' ' . $reviews['count']; ?></td></tr>
							<tr><td height="17"></td></tr>
						</table>
<?php
    }

    if (tep_not_null($product_info['products_url'])) {
?>
						<table cellpadding="0" cellspacing="0" class="product box_width_cont">
							<tr><td class="line_h"><?php echo sprintf(TEXT_MORE_INFORMATION, tep_href_link(FILENAME_REDIRECT, 'action=url&goto=' . urlencode($product_info['products_url']), 'NONSSL', true, false)); ?></td></tr>
							<tr><td height="17"></td></tr>
						</table>
<?php
    }

    if ($product_info['products_date_available'] > date('Y-m-d H:i:s')) {
?>
						<table cellpadding="0" cellspacing="0" class="product box_width_cont">
							<tr><td class="line_h"><?php echo sprintf(TEXT_DATE_AVAILABLE, tep_date_long($product_info['products_date_available'])); ?></td></tr>
							<tr><td height="17"></td></tr>
						</table>
<?php
    } else {
?>
						<table cellpadding="0" cellspacing="0" class="product box_width_cont">
							<tr><td class="line_h">
							<?php 
						//	echo sprintf(TEXT_DATE_ADDED, tep_date_long($product_info['products_date_added']));
							?>
							</td></tr>
							<tr><td height="17"></td></tr>
						</table>
<?php
    }
?>
		<!-- 
		<table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">
          <tr class="infoBoxContents"><td>
			 -->
			<table border="0" width="100%" cellspacing="0" cellpadding="0" class="product box_width_cont">
              <tr>
                <td class="main bg_input">
				
				<?php 
				//echo '<a href="' . tep_href_link(FILENAME_PRODUCT_REVIEWS, tep_get_all_get_params()) . '">' . tep_image_button('button_reviews.gif', IMAGE_BUTTON_REVIEWS) . '</a>'; 
				?>
				
				
				<?php echo tep_draw_separator('spacer.gif', '15', '1'); ?><?php echo tep_draw_hidden_field('products_id', $product_info['products_id']) . tep_image_submit('button_add_to_cart1.gif', IMAGE_BUTTON_IN_CART); ?></td>
              </tr>
            </table><br style="line-height:1px;"><br style="line-height:10px;">
			<!-- 
			</td></tr>
        </table>
			 -->
<? tep_draw_heading_bottom_2();?>

<? tep_draw_heading_bottom_1(); ?>

<?php tep_draw_heading_bottom();?>	

<?php
    if ((USE_CACHE == 'true') && empty($SID)) {
      echo tep_cache_also_purchased(3600);
    } else {
      include(DIR_WS_MODULES . FILENAME_ALSO_PURCHASED_PRODUCTS);
    }
  }
?>
        </td>
      </tr>
    </table></form></td>
<!-- body_text_eof //-->
    <td class="col_right">
<!-- right_navigation //-->
<?php require(DIR_WS_INCLUDES . 'column_right.php'); ?>
<!-- right_navigation_eof //-->
    </td>
  </tr>
</table>
<!-- body_eof //-->

<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //--></body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>

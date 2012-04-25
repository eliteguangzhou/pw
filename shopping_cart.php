<?php
/*
  $Id: shopping_cart.php,v 1.73 2003/06/09 23:03:56 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  require("includes/application_top.php");

  if (!tep_session_is_registered('customer_id')) {
    $navigation->set_snapshot();
    tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
  }
  
  if (!$card_member->is_member()) {
    $navigation->set_snapshot();
    tep_redirect(tep_href_link(FILENAME_CARDS, '', 'SSL'));
  }

  if ($cart->count_contents() > 0) {
    include(DIR_WS_CLASSES . 'payment.php');
    $payment_modules = new payment;
  }

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_SHOPPING_CART);

  $subtotal_cart = $cart->show_total();
  $discounts = $easy_discount->get_all();
  $discount_cart = $easy_discount->total();
  $total_cart = $subtotal_cart - $discount_cart;
  
  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_SHOPPING_CART));
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>">
<link rel="stylesheet" type="text/css" href="stylesheet.css"><script language="javascript">
function session_win2() {
  window.open("<?php echo tep_href_link(FILENAME_INFO_COUPON); ?>","info_coupon"," height=360,width=700,toolbar=no,statusbar=no,scrollbars=yes").focus();
}
function autotab(original,destination){if (original.getAttribute&&original.value.length==original.getAttribute("maxlength"))destination.focus()}
</script>
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
    <td width="100%" class="col_center">
		
<?php tep_draw_heading_top(901);?>

<? new contentBoxHeading_ProdNew($info_box_contents);?>

<?php tep_draw_heading_top_1();?><?php echo tep_draw_form('cart_quantity', tep_href_link(FILENAME_SHOPPING_CART, 'action=update_product')); ?><table border="0"cellspacing="0" cellpadding="0">
      <tr>
        <td>

<?php
  if ($cart->count_contents() > 0) {
?>

<?php
  if ($messageStack->size('cart') > 0) {
?>
    <table cellpadding="0" cellspacing="0">
      <tr>
        <td><?php echo $messageStack->output('cart'); ?></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
      </table>
<?php
  }
?>

<?php
    $info_box_contents = array();
    $info_box_contents[0][] = array('align' => 'center',
                                    'params' => ' class="shop_cart remove"',
                                    'text' => ''.TABLE_HEADING_REMOVE.'');

    $info_box_contents[0][] = array('align' => 'center',
									'params' => ' class="shop_cart products"',
                                    'text' => ''.TABLE_HEADING_PRODUCTS.'');

    $info_box_contents[0][] = array('align' => 'center',
                                    'params' => ' class="shop_cart quantity"',
                                    'text' => ''.TABLE_HEADING_QUANTITY.'');

    $info_box_contents[0][] = array('align' => 'center',
                                    'params' => ' class="shop_cart total"',
                                    'text' => ''.TABLE_HEADING_TOTAL.'');

    $any_out_of_stock = 0;
    $products = $cart->get_products();
    for ($i=0, $n=sizeof($products); $i<$n; $i++) {
// Push all attributes information in an array
      if (isset($products[$i]['attributes']) && is_array($products[$i]['attributes'])) {
        while (list($option, $value) = each($products[$i]['attributes'])) {
          echo tep_draw_hidden_field('id[' . $products[$i]['id'] . '][' . $option . ']', $value);
          $attributes = tep_db_query("select popt.products_options_name, poval.products_options_values_name, pa.options_values_price, pa.price_prefix
                                      from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_OPTIONS_VALUES . " poval, " . TABLE_PRODUCTS_ATTRIBUTES . " pa
                                      where pa.products_id = '" . (int)$products[$i]['id'] . "'
                                       and pa.options_id = '" . (int)$option . "'
                                       and pa.options_id = popt.products_options_id
                                       and pa.options_values_id = '" . (int)$value . "'
                                       and pa.options_values_id = poval.products_options_values_id
                                       and popt.language_id = '" . (int)$languages_id . "'
                                       and poval.language_id = '" . (int)$languages_id . "'");
          $attributes_values = tep_db_fetch_array($attributes);

          $products[$i][$option]['products_options_name'] = $attributes_values['products_options_name'];
          $products[$i][$option]['options_values_id'] = $value;
          $products[$i][$option]['products_options_values_name'] = $attributes_values['products_options_values_name'];
          $products[$i][$option]['options_values_price'] = $attributes_values['options_values_price'];
          $products[$i][$option]['price_prefix'] = $attributes_values['price_prefix'];
        }
      }
    }

    for ($i=0, $n=sizeof($products); $i<$n; $i++) {
      if (($i/2) == floor($i/2)) {
        $info_box_contents[] = array('params' => 'class=""'); //  background place  
      } else {
        $info_box_contents[] = array('params' => 'class=""'); //  background place 
      }
		
      $cur_row = sizeof($info_box_contents) - 1;

      $info_box_contents[$cur_row][] = array('align' => 'center',
                                             'params' => ' class="remove"',
                                             'text' => '<br style="line-height:10px">'.tep_draw_checkbox_field('cart_delete[]', $products[$i]['id']));

      $products_name = '
	  
					<table cellpadding="0" cellspacing="10" border="0">
						<tr>

							 <td align="center" class="vam"><table cellpadding="0" cellspacing="0" border="0" style="width:124px"><tr><td align="center">
								'.tep_draw_prod_pic_top().'<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $products[$i]['id']) . '">' . tep_image(DIR_WS_IMAGES . $products[$i]['image'], $products[$i]['name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a>'.tep_draw_prod_pic_bottom().'</td></tr></table>
							'.tep_draw_separator('spacer.gif', '1', '10').'<br>
								<em>' . $products[$i]['name'] . '</em>';
					 

							  
      if (STOCK_CHECK == 'true') {
        $stock_check = tep_check_stock($products[$i]['id'], $products[$i]['quantity']);
        if (tep_not_null($stock_check)) {
          $any_out_of_stock = 1;

          $products_name .= $stock_check;
        }
      }

      if (isset($products[$i]['attributes']) && is_array($products[$i]['attributes'])) {
        reset($products[$i]['attributes']);
        while (list($option, $value) = each($products[$i]['attributes'])) {
          $products_name .= '<br style="line-height:1px;"><br style="line-height:5px;"><small><i> - ' . $products[$i][$option]['products_options_name'] . ' ' . $products[$i][$option]['products_options_values_name'] . '</i></small>';
        }
      }	
		$products_name .= '												
							</td>						

						</tr>
					</table>';
					
					
      $info_box_contents[$cur_row][] = array('params' => ' class="products"',
                                             'text' => $products_name);

      $info_box_contents[$cur_row][] = array('align' => 'center',
                                             'params' => ' class="quantity"',
                                             'text' => '<br style="line-height:10px">'.tep_draw_input_field('cart_quantity[]', $products[$i]['quantity'], 'size="4" id="input1"') . tep_draw_hidden_field('products_id[]', $products[$i]['id']));

      $info_box_contents[$cur_row][] = array('align' => 'center',
                                             'params' => ' class="total"',
                                             'text' => '<br style="line-height:10px"><span class="productSpecialPrice">' . $currencies->display_price($products[$i]['final_price'], tep_get_tax_rate($products[$i]['tax_class_id']), $products[$i]['quantity']) . '</span>');
    }

   new productListingBox($info_box_contents);
?>

<?php
    if ($any_out_of_stock == 1) {
      if (STOCK_ALLOW_CHECKOUT == 'true') {
?>
      <table cellpadding="0" cellspacing="0" border="0">
	  		<tr><td class="stockWarning" align="center"><br><?php echo OUT_OF_STOCK_CAN_CHECKOUT; ?></td></tr>
	  </table>
<?php
      } else {
?>
      <table cellpadding="0" cellspacing="0" border="0">
	  		<tr><td class="stockWarning" align="center"><br><?php echo OUT_OF_STOCK_CANT_CHECKOUT; ?></td></tr>
	  </table>
<?php
      }
    }
?>

	<table cellpadding="0" cellspacing="0" border="0"><tr><td class="cart_line_x"><?php echo tep_draw_separator('spacer.gif', '1', '1'); ?></td></tr></table>

				<table cellspacing="0" cellpadding="0" border="0" class="product">
				<tr>
                    <td style="vertical-align:middle">
                    <?php if (ACTIVATE_DISCOUNT) include (DIR_WS_MODULES.'easy_coupons_box.php'); ?>
                    </td>
                    <td>
                        <table cellspacing="0" cellpadding="0" border="0">
    					<tr>
    						<td width="80%" align="right" class="cart_total_left">
                            <strong><?php echo SUB_TITLE_SUB_TOTAL; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    						<td width="20%" align="center" class="cart_total_right">
    							<span class="productSpecialPrice"><?php echo $currencies->format($cart->show_total()); ?></span>
    						</td>
    					</tr>
                        <?php if ($subtotal_cart != $total_cart) {
                        if ($discount_cart > 0) {
                            if (sizeof($discounts) > 0) { ?>
    					<tr>
    						<td width="80%" align="right" class="cart_total_left">
                            <strong><?php echo $discounts[0]['description']; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    						<td width="20%" align="center" class="cart_total_right">
    							<span class="productSpecialPrice">-<?php echo $currencies->format($discount_cart); ?></span>
    						</td>
    					</tr>
                        <?php }
                            } ?>
    					<tr>
    						<td width="80%" align="right" class="cart_total_left">
                            <strong><?php echo SUB_TITLE_TOTAL; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    						<td width="20%" align="center" class="cart_total_right">
    							<span class="productSpecialPrice"><?php echo $currencies->format($total_cart <= 0 ? 0 : $total_cart); ?></span>
    						</td>
    					</tr>
    					<?php } ?>
                    </table>
            </td>
        </tr>
	</table>

	<table cellpadding="0" cellspacing="0" border="0"><tr><td class="cart_line_x"><?php echo tep_draw_separator('spacer.gif', '1', '1'); ?></td></tr></table>		

				<table cellspacing="0" cellpadding="0" border="0" >
					<tr>
						<td style="padding:15px 20px 0px 0px;" class="padd33 bg_input">
						<?php
						$can_checkout = $cart->show_total()*$currencies->currencies[$currency]['value'] > 100;
				 if (!$can_checkout) {

				echo minimum_order.'<br><br>';
		}
				?>

						<?php echo tep_image_submit('button_update.gif', IMAGE_BUTTON_UPDATE_CART); ?>   <?php

					$back = sizeof($navigation->path)-2;
					if (isset($navigation->path[$back])) {

				echo '<a href="' . tep_href_link($navigation->path[$back]['page'], tep_array_to_string($navigation->path[$back]['get'], array('action')), $navigation->path[$back]['mode']) . '">' . tep_image_button('button_continue_shopping.gif', IMAGE_BUTTON_CONTINUE_SHOPPING) . '</a>';
				}
				?>



				<?php

				 if ($can_checkout) {

												echo '<a href="' . tep_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL') . '">' . tep_image_button('button_checkout.gif', IMAGE_BUTTON_CHECKOUT) . '</a>';
										}else{
											echo	tep_image_button('button_checkout8.gif', IMAGE_BUTTON_CHECKOUT);
											}
				?></td>
					</tr>
				</table>	
		
<?php
 //   $initialize_checkout_methods = $payment_modules->checkout_initialization_method();

    if (!empty($initialize_checkout_methods)) {
?>
      
      <table cellpadding="0" cellspacing="0" border="0">
      		<tr><td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td></tr>
            <tr><td align="right" class="main" style="padding-right:50px;"><?php echo TEXT_ALTERNATIVE_CHECKOUT_METHODS; ?></td></tr>

<?php
      reset($initialize_checkout_methods);
      while (list(, $value) = each($initialize_checkout_methods)) {
?>
     	 	<tr><td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td></tr>
      		<tr><td align="right" class="main"><?php echo $value; ?></td></tr>
      </table>            
<?php
      }
    }
  } else {
?>
<?php /*  tep_draw_heading_top_1();  */?>      
    <br style="line-height:1px;"><br style="line-height:5px;">

	
			<table border="0" cellspacing="0" cellpadding="2">
              <tr>
			  	<td></td>
				<td align="center" width="100%"><br><?php new infoBox_77(array(array('text' => TEXT_CART_EMPTY))); ?></td>
				<td></td>
			  </tr>
			  <tr>
                <td><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                <td align="right" class="main" width="100%"><?php echo '<a href="' . tep_href_link(FILENAME_DEFAULT) . '">' . tep_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE) . '</a>'; ?><br><br></td>
                <td><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
              </tr>
			  <tr><td colspan="3" height="5"></td></tr>
            </table>
<?php /*  tep_draw_heading_bottom_1();  */?>
<?php
  }
?>

    </table></form>
    
<?php tep_draw_heading_bottom_1();?>

<?php tep_draw_heading_bottom();?>

    </td>
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
<!-- footer_eof //-->
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>

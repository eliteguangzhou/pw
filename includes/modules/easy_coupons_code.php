<?php
include(DIR_WS_LANGUAGES . $language . '/' . FILENAME_EASY_COUPONS);
// easy discount installed

// configuration details extraction
$ec_config  = split('d',EASY_COUPONS); // split table from config
$ec_table   = $ec_config[1];
$ec_config  = split(';',$ec_config[0]); // split config values
$ec_active  = $ec_config[0]; // EC active
$ec_auto    = $ec_config[1]; // EC Automatic
$ec_email   = $ec_config[4]; // Print on email
$ec_expire  = $ec_config[5]; // Expires
$ec_days    = $ec_config[6]; // days to expiration
$ec_dtype   = $ec_config[7]; // discount table type (money/percent)
$ec_mf      = $ec_config[8]; // discount table value (max/fixed)
$ec_clth    = $ec_config[9]; // length of coupon codes in characters
$ec_reset   = $ec_config[10]; // show button reset
$messageStack->reset();

if (ACTIVATE_DISCOUNT) {
  // coupons enabled
  if ($ec_active) {
    // cart not empty
    if ($cart->count_contents() > 0) {
      // coupon reset code
      $discounts = $easy_discount->get_all();
      
        $inputcouponcode = false;
      if (isset($_GET['recalculate']) && isset($discounts[0])) {
        $inputcouponcode = $discounts[0]['code'];
        $nb_coupon = sizeof($couponcode);
        for ($i = 1; $i <= $nb_coupon; $i++)
          $easy_discount->clear('COUPON'.$i);
        $discounts = $easy_discount->get_all();
        tep_session_unregister('couponcode');
        $couponcode = array();
      }
      
      if (isset($_POST['coupon_code']) && $_POST['coupon_code'] != '')
        $inputcouponcode = strtoupper($_POST['coupon_code']);
        
      if ($inputcouponcode != false) {
        //var_rh($discounts);die;
        if (count($discounts) >= 1 && $inputcouponcode != 'RESET') {
            $messageStack->add_session('cart',EC_MAX1,'error');
            $messageStack->add('cart',EC_MAX1,'error');
        } else {
                $already_in_use = false;
                $min_cart_total = $cart_total;
                foreach ($discounts as $discount) {
                    if (strpos($discount['description'], $inputcouponcode) !== false) {
                        $already_in_use = true;
                    }
                    $min_cart_total -= $discount['amount'];
                }
                if ($already_in_use) {
                    $messageStack->add_session('cart',EC_IN_USE,'error');
                    $messageStack->add('cart',EC_IN_USE,'error');
                }
                elseif ($inputcouponcode != 'RESET') {
                  // fetch the coupon code from the database
                  $coupon_query = tep_db_query("select code, discount, type, enddate, email
                                                from coupons
                                                where code = '" . $inputcouponcode . "'
                                                  and (enddate > now() || enddate is null)
                                                  and used = 0 ");
                  $coupon = tep_db_fetch_array($coupon_query);
                  
                  if (!empty($coupon['email']) && $coupon['email'] != $customer_email_address){
                    // give message
                    $messageStack->add_session('cart',EC_BAD_EMAIL,'error');
                    $messageStack->add('cart',EC_BAD_EMAIL,'error');
                  }
                  // valid and available coupon code found
                  elseif ($coupon['code']) {
                    if (!tep_session_is_registered('couponcode')) $couponcode = array();
                    $couponcode[] = array('email' => $coupon['email'], 'code' => $coupon['code'], 'discount' => $coupon['discount'], 'type' => $coupon['type']);

                    if (!tep_session_is_registered('couponcode')) tep_session_register('couponcode');
                    // give message
                    $messageStack->add_session('cart',EC_PROCESSED,'success');
                    $messageStack->add('cart',EC_PROCESSED,'success');

                      // process coupon discount using easy discount
                      if (tep_session_is_registered('couponcode') && !$already_in_use) {
                        $c_coupon = $couponcode[sizeof($couponcode) - 1];
                        $n_coupon = sizeof($couponcode);
                        $coupon_desc = 'Discount ('.$c_coupon['code'].' - '.(int)$c_coupon['discount'].'%)';

                        if ($c_coupon['type'] == 'p') {
                          $easy_discount->set('COUPON'.$n_coupon,$coupon_desc, $cart_total*$c_coupon['discount']/100, $coupon['code']);
                        } elseif ($min_cart_total > $c_coupon['discount']) {
                          $easy_discount->set('COUPON'.$n_coupon,$coupon_desc, $c_coupon['discount'], $coupon['code']);
                        } else {
                          $easy_discount->set('COUPON'.$n_coupon,$coupon_desc, $min_cart_total, $coupon['code']);
                          $messageStack->add_session('cart',sprintf(EC_LIMITED,$currencies->format($c_coupon['discount']), $currencies->format($min_cart_total)),'error');
                          $messageStack->add('cart',sprintf(EC_LIMITED,$currencies->format($c_coupon['discount']), $currencies->format($min_cart_total)),'error');
                        }
                      }

                  } else {
                    // give message
                    $messageStack->add_session('cart',EC_UNKNOWN,'error');
                    $messageStack->add('cart',EC_UNKNOWN,'error');
                  }
                } elseif (tep_session_is_registered('couponcode')) {
                  $messageStack->add_session('cart',EC_RESET,'success');
                  $messageStack->add('cart',EC_RESET,'success');
                  tep_session_unregister('couponcode');
                  // clear discount if reset
                  $nb_coupon = sizeof($couponcode);
                  for ($i = 1; $i <= $nb_coupon; $i++)
                    $easy_discount->clear('COUPON'.$i);
                } elseif ($inputcouponcode != 'RESET') {
                  // give message
                  $messageStack->add_session('cart',EC_UNKNOWN.$inputcouponcode ,'error');
                  $messageStack->add('cart',EC_UNKNOWN.$inputcouponcode,'error');
                }
            }
          } elseif ((isset($_POST['coupon_code']))) {
            $messageStack->add_session('cart',EC_EMPTY,'error');
            $messageStack->add('cart',EC_EMPTY,'error');
          }
        } else {
          // clear discount if cart goes empty
          if (isset($couponcode)) {
              $nb_coupon = sizeof($couponcode);
              for ($i = 1; $i <= $nb_coupon; $i++)
                $easy_discount->clear('COUPON'.$i);
            }
        }
    // clear the input fields
    $coupon_code = '';
  }
}
?>
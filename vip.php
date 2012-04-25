<?php
  require('includes/application_top.php');

  if (empty($customer_first_name)) {
    header('Location: /login.php');
    die;
  }
  //http://www.parfumwholesale.com/vip.php?tx=2TT8857058019033K&st=Completed&amt=50.00&cc=EUR&cm=&item_number=

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_VIP);
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>">
<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->

<!-- body //-->
<table border="0" width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top" class="col_left">
<!-- left_navigation //-->
<?php require(DIR_WS_INCLUDES . 'column_left.php'); ?>
<!-- left_navigation_eof //-->
    </td>
<!-- body_text //-->

    <td width="100%" class="col_center">

<?php /* require(DIR_WS_BOXES . 'panel_top.php'); */ ?>


<? tep_draw_heading_top($cPath);?>

<?php require(DIR_WS_MODULES.'/vip.php'); ?>

<? tep_draw_heading_bottom_3();?>

<? tep_draw_heading_bottom();?>

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
<!-- footer_eof //--></body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>

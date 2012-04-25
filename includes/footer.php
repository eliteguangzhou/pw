<?php
/*
  $Id: footer.php,v 1.26 2003/02/10 22:30:54 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  require(DIR_WS_INCLUDES . 'counter.php');
?>
          </td>
	</tr>
	<tr>
		<td>
			<table cellpadding="0" cellspacing="0" border="0" style="height:121px" class="footer">
				<tr>
					<td style="width:100%">
                        <br style="line-height:35px"><span><a href="<?php echo tep_href_link('specials.php')?>"><?php echo BOX_HEADING_SPECIALS?></a></span>&nbsp; <span>|</span> &nbsp;<span><a href="<?php echo tep_href_link('advanced_search.php')?>"><?php echo BOX_SEARCH_ADVANCED_SEARCH?></a></span>&nbsp; <span>|</span> &nbsp;<span><? if (tep_session_is_registered('customer_id')) { 
?><a href="<?php echo tep_href_link('account.php')?>"><?php echo HEADER_TITLE_MY_ACCOUNT?></a><? } else 
{ ?><a href="<?php echo tep_href_link('create_account.php')?>"><?php echo HEADER_TITLE_CREATE_ACCOUNT?></a><? } 
?></span>&nbsp; <span>|</span> &nbsp;<span><? if (tep_session_is_registered('customer_id')) { 
?><a href="<?php echo tep_href_link('logoff.php')?>"><?php echo HEADER_TITLE_LOGOFF?></a><? } else 
{ ?><a href="<?php echo tep_href_link('login.php')?>"><?php echo HEADER_TITLE_LOGIN?></a><? } 
?></span><br>
                        <br style="line-height:3px">
                        <?php echo FOOTER_TEXT_BODY?>
                  	</td>	
                    <td><br style="line-height:37px"><?php echo tep_image(DIR_WS_IMAGES.'p1.gif')?></td>
                    <td><?php echo tep_draw_separator('spacer.gif', '17', '1'); ?></td>
				</tr>
			</table>
         </td>
	</tr>
</table>

<?php
  if ($banner = tep_banner_exists('dynamic', '468x50')) {
?>
<table border="0" width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><?php /*  echo tep_display_banner('static', $banner);  */ ?></td>
  </tr>
</table>
<?php
  }
?>

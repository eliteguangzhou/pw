<?php
/*
  $Id: index.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2007 osCommerce

  Released under the GNU General Public License
*/

define('TEXT_MAIN', 'This is a default setup of osCommerce Online Merchant. Products shown are for demonstrational purposes. <b>Any products purchased will not be delivered nor will the customer be billed</b>. Any information seen on these products is to be treated as fictional.<br><br><table border="0" width="100%" cellspacing="5" cellpadding="2"><tr><td class="main" valign="top">' . tep_image(DIR_WS_IMAGES . 'default/1.gif') . '</td><td class="main" valign="top"><b>Error Messages</b><br><br>If there are any error or warning messages shown above, please correct them first before proceeding.<br><br>Error messages are displayed at the very top of the page with a complete <span class="messageStackError">background</span> color.<br><br>Several checks are performed to ensure a healthy setup of your online store - these checks can be disabled by editing the appropriate parameters at the bottom of the includes/application_top.php file.</td></tr><td class="main" valign="top">' . tep_image(DIR_WS_IMAGES . 'default/2.gif') . '</td><td class="main" valign="top"><b>Editing Page Texts</b><br><br>The text shown here can be modified in the following file, on each language basis:<br><br><nobr class="messageStackSuccess">[path to catalog]/includes/languages/' . $language . '/' . FILENAME_DEFAULT . '</nobr><br><br>That file can be edited manually, or via the Administration Tool with the <nobr class="messageStackSuccess">Languages->' . ucfirst($language) . '->Define</nobr> or <nobr class="messageStackSuccess">Tools->File Manager</nobr> modules.<br><br>The text is set in the following manner:<br><br><nobr>define(\'TEXT_MAIN\', \'<span class="messageStackSuccess">This is a default setup of the osCommerce project...</span>\');</nobr><br><br>The text highlighted in green may be modified - it is important to keep the define() of the TEXT_MAIN keyword. To remove the text for TEXT_MAIN completely, the following example is used where only two single quote characters exist:<br><br><nobr>define(\'TEXT_MAIN\', \'\');</nobr><br><br>More information concerning the PHP define() function can be read <a href="http://www.php.net/define" target="_blank"><u>here</u></a>.</td></tr><tr><td class="main" valign="top">' . tep_image(DIR_WS_IMAGES . 'default/3.gif') . '</td><td class="main" valign="top"><b>Online Documentation</b><br><br>Online documentation can be read at the <a href="http://www.oscommerce.info" target="_blank"><u>osCommerce Knowledge Base</u></a> site.<br><br>Support is available at the <a href="http://www.oscommerce.com/support" target="_blank"><u>osCommerce Support Site</u></a>.</td></tr></table><br>If you wish to download the solution powering this shop, or if you wish to contribute to the osCommerce project, please visit the <a href="http://www.oscommerce.com" target="_blank"><u>support site of osCommerce</u></a>. This shop is running on <font color="#f0000"><b>' . PROJECT_VERSION . '</b></font>.');
define('TABLE_HEADING_NEW_PRODUCTS', 'New Products For %s');
define('TABLE_HEADING_UPCOMING_PRODUCTS', 'Upcoming Products');
define('TABLE_HEADING_DATE_EXPECTED', 'Date Expected');

if ( ($category_depth == 'products') || (isset($HTTP_GET_VARS['manufacturers_id'])) ) {
  define('HEADING_TITLE', 'Let\'s See What We Have Here');
  define('TABLE_HEADING_IMAGE', '');
  define('TABLE_HEADING_MODEL', 'Model');
  define('TABLE_HEADING_PRODUCTS', 'Product Name');
  define('TABLE_HEADING_MANUFACTURER', 'Manufacturer');
  define('TABLE_HEADING_QUANTITY', 'Quantity');
  define('TABLE_HEADING_PRICE', 'Price');
  define('TABLE_HEADING_WEIGHT', 'Weight');
  define('TABLE_HEADING_BUY_NOW', 'Buy Now');
  define('TEXT_NO_PRODUCTS', 'There are no products to list in this category.');
  define('TEXT_NO_PRODUCTS2', 'There is no product available from this manufacturer.');
  define('TEXT_NUMBER_OF_PRODUCTS', 'Number of Products: ');
  define('TEXT_SHOW', '<b>Show:</b>');
  define('TEXT_BUY', 'Buy 1 \'');
  define('TEXT_NOW', '\' now');
  define('TEXT_ALL_CATEGORIES', 'All Categories');
  define('TEXT_ALL_MANUFACTURERS', 'All Manufacturers');
} elseif ($category_depth == 'top') {
  define('HEADING_TITLE', 'What\'s New Here?');
} elseif ($category_depth == 'nested') {
  define('HEADING_TITLE', 'Categories');
}

define('TEXT_INFO', '
<h3 class="text_rose">Our Concept / Notre Concept :</h3>
<b>Parfumwholesale.com</b> est un club privé de vente de parfums <span class="text_rose">à prix coûtant (sans marge).</span>
C\'est grâce à vos remarques que nous avons créé ce Club. En effet, vous nous demandiez des prix toujours plus bas, un minimum de stock, un large choix de parfums, des grandes marques ... et beaucoup d\'autonomie....

A ce jour, le club compte 5000 membres actifs ce qui nous permet d\'avoir d\'importants volumes et donc de très bon prix.

Chaque membre du club est comme un acheteur/vendeur indépendant.

Avantages <span class="text_rose">Membre CLUB :</span>

Nous vous proposons <span class="text_rose">tous nos parfums à prix coûtant (sans marge) !</span>
20 000 parfums de marques <span class="text_rose">100% authentiques</span> et sous blister
Expédition dans 80 pays
Tous les produits en ligne sont en <span class="text_rose">stock</span>
Traitement <span class="text_rose">prioritaire</span> des commandes
<span class="text_rose">30 jours</span> satisfait ou remboursé
Livraison rapide sous <span class="text_rose">8 à 12 jours ouvrables</span>
De moins <span class="text_rose">70% à moins 80%</span> sur les tarifs boutiques.

<span class="text_rose">Nous pouvons expédier vos parfums</span> dans le monde entier. <span class="text_rose">Cela vous permet d\'avoir zéro stock !</span>

En moins d\'une minute <span class="text_rose">vous êtes à la tête d\'une parfumerie</span> virtuelle de 20 000 produits (<span class="text_rose">l\'équivalent de 6000m² de stock</span>)

Vous ne prenez <span class="text_rose">aucun risque</span> en ce qui concerne la mode, les invendus et vous restez très réactif vis à vis de vos clients.

Vous pouvez <span class="text_rose">appliquer les tarifs de vente que vous souhaitez</span>... ils sont entièrement libres et sans aucune taxe !

<b>Parfumwholesale.com</b> gagne de l’argent <span class="text_rose">uniquement</span> sur les abonnements de ses adhérents.

<a href="card_saphir.php"><img src="'.DIR_WS_IMAGES.'/carte_saphir_plus.jpg" /></a><br />
<a href="card_rubis.php"><img src="'.DIR_WS_IMAGES.'/carte_rubis_plus.jpg" /></a><br />
<a href="card_gold.php"><img src="'.DIR_WS_IMAGES.'/carte_or_plus.jpg" /></a><br />

<div class="center gras">
Vous avez besoin d’aide ?
Un commercial est là pour vous aider : <a href="mailto:'.STORE_OWNER_EMAIL_ADDRESS.'">'.STORE_OWNER_EMAIL_ADDRESS.'</a>
</div>');
?>

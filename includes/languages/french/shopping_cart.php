<?php
/*
  $Id: shopping_cart.php,v 1.13 2002/04/05 20:24:02 project3000 Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Contenu du panier');
define('HEADING_TITLE', 'Qu\'y a t\'il dans mon panier ?');
define('TABLE_HEADING_REMOVE', 'Supprimer');
define('TABLE_HEADING_QUANTITY', 'Qté.');
define('TABLE_HEADING_MODEL', 'Modèle');
define('TABLE_HEADING_PRODUCTS', 'Produit(s)');
define('TABLE_HEADING_TOTAL', 'Total');
define('TEXT_CART_EMPTY', 'Votre panier est vide ');
define('SUB_TITLE_SUB_TOTAL', 'Sous-Total :');
define('SUB_TITLE_TOTAL', 'Total :');

define('OUT_OF_STOCK_CANT_CHECKOUT', 'Les produits marqués ' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . ' ne sont pas en stock dans la quantité désirée.<br>Merci de corriger la quantité des articles marqués (' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . '), Merci');
define('OUT_OF_STOCK_CAN_CHECKOUT', 'Les produits marqués avec ' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . ' ne sont pas en stock dans la quantité désirée.<br>Vous pouvez néanmoins les acheter ils vous seront délivrés dès disponibilité.');
?>
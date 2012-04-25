<?php
/*
  $Id: checkout_success.php,v 1.12 2003/04/15 17:47:42 dgw_ Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE_1', 'Commande');
define('NAVBAR_TITLE_2', 'Succ�s');

define('HEADING_TITLE', '<b>Votre commande vient d\'�tre prise en compte !</b><br><br>
Nous allons l\'�tudier et un commercial prendra contact avec vous pour confirmer votre commande.<br><br>
Si tout se passe bien, vos produits arriveront � destination sous 8 � 12 jours ouvrables.');

define('TEXT_SUCCESS', '');

define('TEXT_ORDER_NUMBER', ' ');
define('TEXT_TITRE',' ');


define('TEXT_SUCCESS_HIGH', '<b>Votre commande a bien �t� pass�e !<b> Nous allons l\'�tudier et vous la confirmer par email prochainement. Si tout se passe bien, nous vous contacterons par t�l�phone sous 24h pour vous confirmer son exp�dition.<br>Vos produits seront exp�di�s aussi vite que possible. ');

define('TEXT_SUCCESS_LESS', 'Thank you, your order was successful and payment has been made! Your goods will be dispached as soon as possible. Please visit again soon.');

define('TEXT_NOTIFY_PRODUCTS', 'Veuillez m\'informer des mises � jour des produits que j\'ai choisis ci-dessous :');
define('TEXT_SEE_ORDERS', 'Vous pouvez voir l\'historique de votre commande en allant � la page <a href="' . tep_href_link(FILENAME_ACCOUNT, '', 'SSL') . '">\'Mon compte\'</a> et en cliquant sur <a href="' . tep_href_link(FILENAME_ACCOUNT_HISTORY, '', 'SSL') . '">\'Historique\'</a>.');
define('TEXT_CONTACT_STORE_OWNER', 'Veuillez poser toutes les questions directement au <a href="' . tep_href_link(FILENAME_CONTACT_US) . '">propri�taire du magasin</a>.');
define('TEXT_THANKS_FOR_SHOPPING', 'Merci d\'avoir fait vos achats en ligne avec nous !');

define('TABLE_HEADING_COMMENTS', 'Ecrivez un commentaire pour la commande pass�e;');

define('TABLE_HEADING_DOWNLOAD_DATE', 'date d\'expiration : ');
define('TABLE_HEADING_DOWNLOAD_COUNT', ' t�l�chargements restant');
define('HEADING_DOWNLOAD', 'T�l�chargez vos produits ici :');
define('FOOTER_DOWNLOAD', 'Vous pouvez aussi t�l�charger vos produits plus tard � \'%s\'');
?>
<?php
/*
  $Id: checkout_success.php,v 1.12 2003/04/15 17:47:42 dgw_ Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE_1', 'Commande');
define('NAVBAR_TITLE_2', 'Succès');

define('HEADING_TITLE', '<b>Votre commande vient d\'être prise en compte !</b><br><br>
Nous allons l\'étudier et un commercial prendra contact avec vous pour confirmer votre commande.<br><br>
Si tout se passe bien, vos produits arriveront à destination sous 8 à 12 jours ouvrables.');

define('TEXT_SUCCESS', '');

define('TEXT_ORDER_NUMBER', ' ');
define('TEXT_TITRE',' ');


define('TEXT_SUCCESS_HIGH', '<b>Votre commande a bien été passée !<b> Nous allons l\'étudier et vous la confirmer par email prochainement. Si tout se passe bien, nous vous contacterons par téléphone sous 24h pour vous confirmer son expédition.<br>Vos produits seront expédiés aussi vite que possible. ');

define('TEXT_SUCCESS_LESS', 'Thank you, your order was successful and payment has been made! Your goods will be dispached as soon as possible. Please visit again soon.');

define('TEXT_NOTIFY_PRODUCTS', 'Veuillez m\'informer des mises à jour des produits que j\'ai choisis ci-dessous :');
define('TEXT_SEE_ORDERS', 'Vous pouvez voir l\'historique de votre commande en allant à la page <a href="' . tep_href_link(FILENAME_ACCOUNT, '', 'SSL') . '">\'Mon compte\'</a> et en cliquant sur <a href="' . tep_href_link(FILENAME_ACCOUNT_HISTORY, '', 'SSL') . '">\'Historique\'</a>.');
define('TEXT_CONTACT_STORE_OWNER', 'Veuillez poser toutes les questions directement au <a href="' . tep_href_link(FILENAME_CONTACT_US) . '">propriétaire du magasin</a>.');
define('TEXT_THANKS_FOR_SHOPPING', 'Merci d\'avoir fait vos achats en ligne avec nous !');

define('TABLE_HEADING_COMMENTS', 'Ecrivez un commentaire pour la commande passée;');

define('TABLE_HEADING_DOWNLOAD_DATE', 'date d\'expiration : ');
define('TABLE_HEADING_DOWNLOAD_COUNT', ' téléchargements restant');
define('HEADING_DOWNLOAD', 'Téléchargez vos produits ici :');
define('FOOTER_DOWNLOAD', 'Vous pouvez aussi télécharger vos produits plus tard à \'%s\'');
?>
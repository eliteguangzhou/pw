<?php
/*
  $Id: checkout_process.php,v 1.26 2002/11/01 04:22:05 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('EMAIL_TEXT_SUBJECT', 'Traitement de la commande');
define('EMAIL_TEXT_ORDER_NUMBER', 'Numéro de commande :');
define('EMAIL_TEXT_INVOICE_URL', 'Facture détaillée :');
define('EMAIL_TEXT_DATE_ORDERED', 'Date de commande :');
define('EMAIL_TEXT_PRODUCTS', 'Produits');
define('EMAIL_TEXT_SUBTOTAL', 'Sous-Total :');
define('EMAIL_TEXT_TAX', 'TVA :        ');
define('EMAIL_TEXT_SHIPPING', 'Expédition : ');
define('EMAIL_TEXT_TOTAL', 'Total :    ');
define('EMAIL_TEXT_DELIVERY_ADDRESS', 'Adresse de livraison');
define('EMAIL_TEXT_BILLING_ADDRESS', 'Adresse de facturation');
define('EMAIL_TEXT_PAYMENT_METHOD', 'Méthode de paiement');

define('EMAIL_SEPARATOR', '------------------------------------------------------');
define('TEXT_EMAIL_VIA', 'par l\'intermédiaire de');

define('EMAIL_NOT_MEMBER','Vous devez être membre pour pouvoir acheter. Pour devenir membre, cliquez sur le lien suivant : http://www.'.strtolower(STORE_NAME));
define('EMAIL_MEMBER','Vous êtes membres %s. Votre adhésion expire le %s.');
?>
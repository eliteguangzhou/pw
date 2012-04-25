<?php
/*
  $Id: create_account.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Créer un compte');

define('HEADING_TITLE', 'Mes informations de compte');
define('EMAIL_GREET_MR', 'M. %s');
define('EMAIL_GREET_MS', 'Mme %s');
define('EMAIL_GREET_NONE', '%s');

define('TEXT_ORIGIN_LOGIN', '<font color="#FF0000"><small><b>NOTE:</b></font></small> If you already have an account with us, please login at the <a href="%s"><u>login page</u></a>.');

define('EMAIL_SUBJECT', 'Bienvenue chez  ' . STORE_NAME ); // . STORE_NAME);

define('EMAIL_WELCOME', 'Email : vlogin
Mot de passe : vpass

Bonjour vnom,

Parfumwholesale.com vous remercie d’avoir rejoint le seul club privé de vente de parfums  à prix coûtant en Europe.
Pour finaliser votre inscription et vous communiquer votre numéro d’adhérent, cliquez sur le lien suivant :

http://www.parfumwholesale.com/cards.php

Avec Parfumwholesale.com, bénéficiez des tarifs grossistes sans prendre de risque !
Vous avez besoin d’aide ?
Un commercial est là pour vous aider: contact@parfumwholesale.com

Bien sincèrement,

Sophie de SEGUR
Département Commercial
www.parfumwholesale.com '. "\n\n");
define('EMAIL_PRESENTATION', '');
//define('EMAIL_LOGIN', 'Username: %s <br>' . "\n\n");
//define('EMAIL_PWD', 'Password: %s <br>' . "\n\n");


define('EMAIL_CONTACT', 'If you need further assistance, please e-mail us using our contact form and describe your request in detail. We will respond to your e-mail within 24-48 hours, depends on our back-log.
<br><br>
You could also send us an email to : contact@parfumwholesale.com
<br><br>
We look forward to a mutual beneficial, long-term relationship with you!
<br><br>
Best Regards,
<br><br>
Mike Hilton<br>
Customer Service Dpt.
<br><br>
' . "\n\n");
//define('EMAIL_CONTACT', 'For help with any of our online services, please email the store-owner: ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n\n");
define('EMAIL_WARNING', '<b>Note:</b> This email address was given to us by one of our customers. If you did not signup to be a member, please send an email to ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n");
?>

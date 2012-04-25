<?php

define('HTML_EMAIL_SUBJECT', 'Bienvenue chez '.STORE_NAME);
define('HTML_EMAIL', 'Email : %s
Numéro d’adhérent : %s

Félicitation %s,

Vous êtes membre %s du Club '.STORE_NAME.' !
Voici votre numéro d’adhérent : %s
Votre carte est valide du : %s au %s
Vous pouvez maintenant commander vos parfums à prix coûtant !
Mode d’emploi :
- Mettez les produits que vous désirez dans votre panier.
- Rentrez votre numéro d’adhérent au CLUB
- Recevez par email la validation de votre commande
- Payez votre commande dans les 72h
- Recevez votre colis sous 8 à 12 jours ouvrables

Passer une commande : http://www.'.strtolower(STORE_NAME).'

Vous avez besoin d’aide ?
Un commercial est là pour vous aider: '.STORE_OWNER_EMAIL_ADDRESS.'

Bien sincèrement,

Sophie de SEGUR
Département Commercial
www.'.strtolower(STORE_NAME).'
');

define('HTML_EMAIL_SUBJECT_PWS', 'Nouveau membre '.STORE_NAME);
define('HTML_EMAIL_PWS', 'Nouveau membre : %s %s, %s
Duree : %s
Numero de transaction Paypal : %s
');

define('CARD_BOUGHT', '
<p style="font-family:Verdana; font-weight:bold;color:green;">Votre carte membre vient d\'être créée.</span><br />
Vous pouvez l\'utiliser dès à présent pour procéder à vos achats.<br />
Votre carte est valable %s mois. </p>
<p style="font-family:Verdana; font-weight:bold;color:green;">Cordialement,</span><br />
L\'équipe Parfumwholesale</p>
<p><a href="index.php">Retour</a></p>');

define('OPTION_SAPHIR', 'Carte SAPHIR Valable 1 mois 50 euros');
define('OPTION_RUBIS', 'Carte RUBIS Valable 4 mois 150 euros');
define('OPTION_GOLD', 'Carte GOLD Valable 6 mois 250 euros');

define('ALREADY_MEMBER', '<p style="font-family:Verdana; font-weight:bold;color:red;">Vous disposez déjà d\'une carte membre expirant le %s.</p><p><a href="index.php">Retour</a></p>')
?>
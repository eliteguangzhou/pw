<?php
/*
  $Id: english.php,v 1.114 2003/07/09 18:13:39 dgw_ Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

// look in your $PATH_LOCALE/locale directory for available locales
// or type locale -a on the server.
// Examples:
// on RedHat try 'en_US'
// on FreeBSD try 'en_US.ISO_8859-1'
// on Windows try 'en', or 'English'
@setlocale(LC_TIME, 'fr_FR.ISO_8859-1');
if (eregi('windows', $_SERVER['SystemRoot'])) @setlocale(LC_TIME, 'fr'); // Page de code pour serveur sous Windows (installation locale)

define('DATE_FORMAT_SHORT', '%d/%m/%Y');  // this is used for strftime()
define('DATE_FORMAT_LONG', '%A %d %B %Y'); // this is used for strftime()
define('DATE_FORMAT', 'd/m/Y'); // this is used for date()
define('DATE_TIME_FORMAT', DATE_FORMAT_SHORT . ' %H:%M:%S');

////
// Return date in raw format
// $date should be in format mm/dd/yyyy
// raw date is in format YYYYMMDD, or DDMMYYYY
function tep_date_raw($date, $reverse = false) {
  if ($reverse) {
    return substr($date, 0, 2) . substr($date, 3, 2) . substr($date, 6, 4);
  } else {
    return substr($date, 6, 4) . substr($date, 3, 2) . substr($date, 0, 2);
  }
}

// if USE_DEFAULT_LANGUAGE_CURRENCY is true, use the following currency, instead of the applications default currency (used when changing language)
define('LANGUAGE_CURRENCY', 'EUR');

// Global entries for the <html> tag
define('HTML_PARAMS','dir="LTR" lang="fr"');

// charset for web pages and emails
define('CHARSET', 'iso-8859-1');

// page title
define('TITLE', STORE_NAME);

// header text in includes/header.php
define('HEADER_TITLE_CREATE_ACCOUNT', 'Créer un compte');
define('HEADER_TITLE_MY_ACCOUNT', 'Mon compte');
define('HEADER_TITLE_CART_CONTENTS', 'Voir panier');
define('HEADER_TITLE_CHECKOUT', 'Commander');
define('HEADER_TITLE_TOP', 'Accueil');
define('HEADER_TITLE_CATALOG', 'Catalogue');
define('HEADER_TITLE_LOGOFF', 'Fermeture de session');
define('HEADER_TITLE_LOGIN', 'Ouverture de session');

// footer text in includes/footer.php
define('FOOTER_TEXT_REQUESTS_SINCE', 'requêtes depuis le');

// text for gender
define('MALE', 'Homme');
define('FEMALE', 'Femme');
define('MALE_ADDRESS', 'Mr.');
define('FEMALE_ADDRESS', 'Mme.');

// text for date of birth example
define('DOB_FORMAT_STRING', 'jj/mm/aaaa');

// categories box text in includes/boxes/categories.php
define('BOX_HEADING_CATEGORIES', 'Catégories');

// manufacturers box text in includes/boxes/manufacturers.php
define('BOX_HEADING_MANUFACTURERS', 'Fabricants');

// whats_new box text in includes/boxes/whats_new.php
define('BOX_HEADING_WHATS_NEW', 'Nouveautés ?');

// quick_find box text in includes/boxes/quick_find.php
define('BOX_HEADING_SEARCH', 'Recherche rapide');
define('BOX_SEARCH_TEXT', 'Utilisez des mots-clés pour trouver le produit que vous recherchez.');
define('BOX_SEARCH_ADVANCED_SEARCH', 'Recherche avancée');

// specials box text in includes/boxes/specials.php
define('BOX_HEADING_SPECIALS', 'Promotions');

// reviews box text in includes/boxes/reviews.php
define('BOX_HEADING_REVIEWS', 'Critiques');
define('BOX_REVIEWS_WRITE_REVIEW', 'Ecrire une critique pour ce produit !');
define('BOX_REVIEWS_NO_REVIEWS', 'Il n\'y a actuellement aucune critique pour ce produit');
define('BOX_REVIEWS_TEXT_OF_5_STARS', '%s sur 5 étoiles !');

// shopping_cart box text in includes/boxes/shopping_cart.php
define('BOX_HEADING_SHOPPING_CART', 'Panier');
define('BOX_SHOPPING_CART_EMPTY', 'produits');
define('BOX_SHOPPING_CART_MIN_ORDER', ' Minimum de commande : 100€');

// order_history box text in includes/boxes/order_history.php
define('BOX_HEADING_CUSTOMER_ORDERS', 'Historique commandes');

// best_sellers box text in includes/boxes/best_sellers.php
define('BOX_HEADING_BESTSELLERS', 'Meilleures ventes');
define('BOX_HEADING_BESTSELLERS_IN', 'Meilleures ventes dans<br>&nbsp;&nbsp;');

// notifications box text in includes/boxes/products_notifications.php
define('BOX_HEADING_NOTIFICATIONS', 'Notifications');
define('BOX_NOTIFICATIONS_NOTIFY', 'Me prévenir des mises à jour de <b>%s</b>');
define('BOX_NOTIFICATIONS_NOTIFY_REMOVE', 'Ne plus me prévenir des mises à jour de <b>%s</b>');

// manufacturer box text
define('BOX_HEADING_MANUFACTURER_INFO', 'Information fabricant');
define('BOX_MANUFACTURER_INFO_HOMEPAGE', 'Page d\'accueil de %s');
define('BOX_MANUFACTURER_INFO_OTHER_PRODUCTS', 'Autres articles');

// languages box text in includes/boxes/languages.php
define('BOX_HEADING_LANGUAGES', 'Langues');

// currencies box text in includes/boxes/currencies.php
define('BOX_HEADING_CURRENCIES', 'Devises');

define('BOX_HEADING_BESTSELLING', 'Meilleures ventes');
define('BOX_BESTSELLING_BRANDS', 'Marques');
define('BOX_BESTSELLING_PERFUNE_HER', 'Parfum pour elle');
define('BOX_BESTSELLING_PERFUME_HIM', 'Parfum pour lui');
define('BOX_BESTSELLING_GIFT', 'Coffrets');
define('BOX_BESTSELLING_HAIRCARE', 'Soin des cheveux');
define('BOX_BESTSELLING_SKIN', 'Soins pour la peau');
define('BOX_BESTSELLING_CANDLES', 'Bougies');

// information box text in includes/boxes/discount.php
define('BOX_HEADING_DISCOUNT', 'Discount');
define('BOX_DISCOUNT_WOMEN', 'Parfums femmes');
define('BOX_DISCOUNT_MEN', 'Parfums hommes');
define('BOX_DISCOUNT_HAIR', 'Cheveux et soin de peau');
define('BOX_DISCOUNT_GIFT', 'Coffrets');
define('BOX_DISCOUNT_CHEAP_PERFUME', 'Voir nos parfums bon marché');

// information box text in includes/boxes/information.php
define('BOX_HEADING_INFORMATION', 'Informations');
define('BOX_INFORMATION_PRIVACY', 'Remarque sur la confidentialité');
define('BOX_INFORMATION_CONDITIONS', 'Conditions d\'utilisation');
define('BOX_INFORMATION_SHIPPING', 'Expédition &amp; retours');
define('BOX_INFORMATION_CONTACT', 'Contactez-nous');
define('BOX_INFORMATION_SHIPPING_DETAILS', 'Information d\'expédition');
define('BOX_INFORMATION_ABOUT_US', 'A propos de nous');
define('BOX_INFORMATION_RETURNS', 'Retours');

define('BOX_INFORMATION_CANCEL', 'Annulations');
define('BOX_INFORMATION_TRACK', 'Suivi de commande');
define('BOX_INFORMATION_FAQ', 'FAQ');

// tell a friend box text in includes/boxes/tell_a_friend.php
define('BOX_HEADING_TELL_A_FRIEND', 'Faire connaître');
define('BOX_TELL_A_FRIEND_TEXT', 'Envoyer cet article à un ami(e).');

// checkout procedure text
define('CHECKOUT_BAR_DELIVERY', 'Information livraison');
define('CHECKOUT_BAR_PAYMENT', 'Information paiement');
define('CHECKOUT_BAR_CONFIRMATION', 'Confirmation');
define('CHECKOUT_BAR_FINISHED', 'Fini !');

// pull down default text
define('PULL_DOWN_DEFAULT', 'Choisissez');
define('TYPE_BELOW', 'Tapez ci-dessous');

// javascript messages
define('JS_ERROR', 'Des erreurs sont survenues durant le traitement de votre formulaire.\n\nVeuillez effectuer les corrections suivantes :\n\n');

define('JS_REVIEW_TEXT', '* Le \'commentaire\' que vous avez entré doit avoir au moins ' . REVIEW_TEXT_MIN_LENGTH . ' caractères.\n');
define('JS_REVIEW_RATING', '* Vous devez mettre une appréciation pour cet article.\n');

define('JS_ERROR_NO_PAYMENT_MODULE_SELECTED', '* Veuillez choisir une méthode de paiement pour votre commande.\n');

define('JS_ERROR_SUBMITTED', 'Ce formulaire a été déjà soumis. Veuillez appuyer sur Ok et attendez jusqu\'à ce que le traitement soit fini.');

define('ERROR_NO_PAYMENT_MODULE_SELECTED', 'Veuillez choisir une méthode de paiement pour votre commande.');

define('CATEGORY_COMPANY', 'Détails sociétés');
define('CATEGORY_PERSONAL', 'Vos détails personnels');
define('CATEGORY_ADDRESS', 'Votre adresse');
define('CATEGORY_CONTACT', 'Votre adresse');
define('CATEGORY_OPTIONS', 'Options');
define('CATEGORY_PASSWORD', 'Votre mot de passe');

define('ENTRY_COMPANY', 'Nom de la société :');
define('ENTRY_COMPANY_ERROR', '');
define('ENTRY_COMPANY_TEXT', '');
define('ENTRY_GENDER', 'Genre :');
define('ENTRY_GENDER_ERROR', 'Veuillez choisir votre genre.');
define('ENTRY_GENDER_TEXT', '*');
define('ENTRY_FIRST_NAME', 'Prénom :');
define('ENTRY_FIRST_NAME_ERROR', 'Votre prénom doit contenir un minimum de ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' caractères.');
define('ENTRY_FIRST_NAME_TEXT', '*');
define('ENTRY_LAST_NAME', 'Nom :');
define('ENTRY_LAST_NAME_ERROR', 'Votre nom doit contenir un minimum de ' . ENTRY_LAST_NAME_MIN_LENGTH . ' caractères.');
define('ENTRY_LAST_NAME_TEXT', '*');
define('ENTRY_DATE_OF_BIRTH', 'Date de naissance :');
define('ENTRY_DATE_OF_BIRTH_ERROR', 'Votre date de naissance doit avoir ce format : JJ/MM/AAAA (ex. 03/02/1961)');
define('ENTRY_DATE_OF_BIRTH_TEXT', '* (ex. 03/02/1961)');
define('ENTRY_EMAIL_ADDRESS', 'Adresse email:');
define('ENTRY_EMAIL_ADDRESS_ERROR', 'Votre adresse email doit contenir un minimum de ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' caractères.');
define('ENTRY_EMAIL_ADDRESS_CHECK_ERROR', 'Votre adresse email ne semble pas être valide - veuillez effectuer toutes les corrections nécessaires.');
define('ENTRY_EMAIL_ADDRESS_ERROR_EXISTS', 'Votre adresse email est déjà enregistrée sur notre site - Veuillez ouvrir une session avec cette adresse email ou créez un compte avec une adresse différente.');
define('ENTRY_EMAIL_ADDRESS_TEXT', '*');
define('ENTRY_STREET_ADDRESS', 'Adresse :');
define('ENTRY_STREET_ADDRESS_ERROR', 'Votre adresse doit contenir un minimum de ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' caractères.');
define('ENTRY_STREET_ADDRESS_TEXT', '*');
define('ENTRY_SUBURB', 'Complément d\'adresse :');
define('ENTRY_SUBURB_ERROR', '');
define('ENTRY_SUBURB_TEXT', '');
define('ENTRY_POST_CODE', 'Code postal :');
define('ENTRY_POST_CODE_ERROR', 'Votre code postal doit contenir un minimum de ' . ENTRY_POSTCODE_MIN_LENGTH . ' caractères.');
define('ENTRY_POST_CODE_TEXT', '*');
define('ENTRY_CITY', 'Ville: ');
define('ENTRY_CITY_ERROR', 'Votre ville doit contenir un minimum de ' . ENTRY_CITY_MIN_LENGTH . ' caractères.');
define('ENTRY_CITY_TEXT', '*');
define('ENTRY_STATE', 'Etat/Département :');
define('ENTRY_STATE_ERROR', 'Votre état doit contenir un minimum de ' . ENTRY_STATE_MIN_LENGTH . ' caractères.');
define('ENTRY_STATE_ERROR_SELECT', 'Veuillez choisir un état à partir de la liste déroulante.');
define('ENTRY_STATE_TEXT', '*');
define('ENTRY_COUNTRY', 'Pays :');
define('ENTRY_COUNTRY_ERROR', 'Veuillez choisir un pays à partir de la liste déroulante.');
define('ENTRY_COUNTRY_TEXT', '*');
define('ENTRY_TELEPHONE_NUMBER', 'Numéro de téléphone :');
define('ENTRY_TELEPHONE_NUMBER_ERROR', 'Votre numéro de téléphone doit contenir un minimum de ' . ENTRY_TELEPHONE_MIN_LENGTH . ' caractères.');
define('ENTRY_TELEPHONE_NUMBER_TEXT', '*');
define('ENTRY_FAX_NUMBER', 'Numéro de fax :');
define('ENTRY_FAX_NUMBER_ERROR', '');
define('ENTRY_FAX_NUMBER_TEXT', '');
define('ENTRY_NEWSLETTER', 'Bulletin d\'information :');
define('ENTRY_NEWSLETTER_TEXT', '');
define('ENTRY_NEWSLETTER_YES', 'S\'abonner');
define('ENTRY_NEWSLETTER_NO', 'Ne pas s\'abonner');
define('ENTRY_NEWSLETTER_ERROR', '');
define('ENTRY_PASSWORD', 'Mot de passe :');
define('ENTRY_PASSWORD_ERROR', 'Votre mot de passe doit contenir un minimum de ' . ENTRY_PASSWORD_MIN_LENGTH . ' caractères.');
define('ENTRY_PASSWORD_ERROR_NOT_MATCHING', 'Le mot de passe de confirmation doit être identique à votre mot de passe.');
define('ENTRY_PASSWORD_TEXT', '*');
define('ENTRY_PASSWORD_CONFIRMATION', 'Mot de passe de confirmation :');
define('ENTRY_PASSWORD_CONFIRMATION_TEXT', '*');
define('ENTRY_PASSWORD_CURRENT', 'Mot de passe actuel :');
define('ENTRY_PASSWORD_CURRENT_TEXT', '*');
define('ENTRY_PASSWORD_CURRENT_ERROR', 'Votre mot de passe doit contenir un minimum de ' . ENTRY_PASSWORD_MIN_LENGTH . ' caractères.');
define('ENTRY_PASSWORD_NEW', 'Nouveau mot de passe :');
define('ENTRY_PASSWORD_NEW_TEXT', '*');
define('ENTRY_PASSWORD_NEW_ERROR', 'Votre nouveau mot de passe doit contenir un minimum de ' . ENTRY_PASSWORD_MIN_LENGTH . ' caractères.');
define('ENTRY_PASSWORD_NEW_ERROR_NOT_MATCHING', 'Le mot de passe de confirmation doit être identique à votre nouveau mot de passe.');
define('PASSWORD_HIDDEN', '--CACHE--');

define('FORM_REQUIRED_INFORMATION', '* Information requise');

// constants for use in tep_prev_next_display function
define('TEXT_RESULT_PAGE', 'Pages de résultat :');
define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS', 'Afficher <b>%d</b> à <b>%d</b> (sur <b>%d</b> produits)');
define('TEXT_DISPLAY_NUMBER_OF_ORDERS', 'Afficher <b>%d</b> à <b>%d</b> (sur <b>%d</b> orders)');
define('TEXT_DISPLAY_NUMBER_OF_REVIEWS', 'Afficher <b>%d</b> à <b>%d</b> (sur <b>%d</b> critiques)');
define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS_NEW', 'Afficher <b>%d</b> à <b>%d</b> (sur <b>%d</b> nouveaux produits)');
define('TEXT_DISPLAY_NUMBER_OF_SPECIALS', 'Afficher <b>%d</b> à <b>%d</b> (sur <b>%d</b> promotions)');

define('PREVNEXT_TITLE_FIRST_PAGE', 'Première page');
define('PREVNEXT_TITLE_PREVIOUS_PAGE', 'Page précédente');
define('PREVNEXT_TITLE_NEXT_PAGE', 'Page suivante');
define('PREVNEXT_TITLE_LAST_PAGE', 'Dernière page');
define('PREVNEXT_TITLE_PAGE_NO', 'Page %d');
define('PREVNEXT_TITLE_PREV_SET_OF_NO_PAGE', 'Ensemble précédent de %d pages');
define('PREVNEXT_TITLE_NEXT_SET_OF_NO_PAGE', 'Ensemble suivant de %d pages');
define('PREVNEXT_BUTTON_FIRST', '&lt;&lt;PREMIER');
define('PREVNEXT_BUTTON_PREV', '[&lt;&lt;&nbsp;Préc]');
define('PREVNEXT_BUTTON_NEXT', '[Suiv&nbsp;&gt;&gt;]');
define('PREVNEXT_BUTTON_LAST', 'DERNIER&gt;&gt;');

define('IMAGE_BUTTON_ADD_ADDRESS', 'Ajouter adresse');
define('IMAGE_BUTTON_ADDRESS_BOOK', 'Carnet d\'adresses');
define('IMAGE_BUTTON_BACK', 'Retour');
define('IMAGE_BUTTON_BUY_NOW', 'Acheter maintenant');
define('IMAGE_BUTTON_CHANGE_ADDRESS', 'Changez l\'adresse');
define('IMAGE_BUTTON_CHECKOUT', 'Commander');
define('IMAGE_BUTTON_CONFIRM_ORDER', 'Confirmer la commande');
define('IMAGE_BUTTON_CONTINUE', 'Continuer');
define('IMAGE_BUTTON_CONTINUE_SHOPPING', 'Continuer vos achats');
define('IMAGE_BUTTON_DELETE', 'Supprimer');
define('IMAGE_BUTTON_EDIT_ACCOUNT', 'Editez le compte');
define('IMAGE_BUTTON_HISTORY', 'Historique des commandes');
define('IMAGE_BUTTON_LOGIN', 'Ouverture de session');
define('IMAGE_BUTTON_IN_CART', 'Ajouter au panier');
define('IMAGE_BUTTON_NOTIFICATIONS', 'Notifications');
define('IMAGE_BUTTON_QUICK_FIND', 'Recherche rapide');
define('IMAGE_BUTTON_REMOVE_NOTIFICATIONS', 'Supprimer les notifications');
define('IMAGE_BUTTON_REVIEWS', 'Critiques');
define('IMAGE_BUTTON_SEARCH', 'Rechercher');
define('IMAGE_BUTTON_SHIPPING_OPTIONS', 'Options d\'expédition');
define('IMAGE_BUTTON_TELL_A_FRIEND', 'Envoyer à un ami');
define('IMAGE_BUTTON_UPDATE', 'Mise à jour');
define('IMAGE_BUTTON_UPDATE_CART', 'Mise à jour panier');
define('IMAGE_BUTTON_WRITE_REVIEW', 'Ecrire une critique');

define('SMALL_IMAGE_BUTTON_DELETE', 'Supprimer');
define('SMALL_IMAGE_BUTTON_EDIT', 'Editer');
define('SMALL_IMAGE_BUTTON_VIEW', 'Afficher');

define('ICON_ARROW_RIGHT', 'plus');
define('ICON_CART', 'Dans le panier');
define('ICON_ERROR', 'Erreur');
define('ICON_SUCCESS', 'Réussi');
define('ICON_WARNING', 'Attention');

define('TEXT_GREETING_PERSONAL', 'Bienvenue <span class="greetUser">%s!</span> Voudriez vous voir quels <a href="%s"><u>nouveaux produits</u></a> sont disponibles à la vente ?');
define('TEXT_GREETING_PERSONAL_RELOGON', '<small>Si vous n\'êtes pas %s, merci de vous <a href="%s"><u>reconnecter in</u></a> avec votre compte.</small>');
define('TEXT_GREETING_GUEST', 'Bienvenue <span class="greetUser">visiteur!</span> Voulez vous <a href="%s"><u>ouvrir une session</u></a>? Ou préférez vous <a href="%s"><u>créer un compte</u></a> ?');

define('TEXT_SORT_PRODUCTS', 'Trier produits ');
define('TEXT_DESCENDINGLY', 'décroissant');
define('TEXT_ASCENDINGLY', 'croissant');
define('TEXT_BY', ' par ');

define('TEXT_REVIEW_BY', 'par %s');
define('TEXT_REVIEW_WORD_COUNT', '%s mots');
define('TEXT_REVIEW_RATING', 'Classement : %s [%s]');
define('TEXT_REVIEW_DATE_ADDED', 'Date d\'ajout : %s');
define('TEXT_NO_REVIEWS', 'Il n\'y a pour le moment aucune critique sur ce produit.');

define('TEXT_NO_NEW_PRODUCTS', 'Il n\'y a pour le moment aucun produits.');

define('TEXT_UNKNOWN_TAX_RATE', 'Taux de taxation inconnu');

define('TEXT_REQUIRED', '<span class="errorText">Requis</span>');

define('ERROR_TEP_MAIL', '<font face="Verdana, Arial" size="2" color="#ff0000"><b><small>TEP ERROR:</small> Impossible d\'envoyer l\'email par le serveur SMTP spécifié. Vérifiez le fichier PHP.INI et corrigez le nom du serveur SMTP si nécessaire.</b></font>');
define('WARNING_INSTALL_DIRECTORY_EXISTS', 'Attention : le répertoire d\'installation existe à : ' . dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/install. Veuillez supprimer ce répertoire pour des raisons de sécurité.');
define('WARNING_CONFIG_FILE_WRITEABLE', 'Attention : Il est possible d\'écrire sur le fichier de configuration : ' . dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/includes/configure.php. Ceci est un risque potentiel - Mettez les bonnes permissions sur ce fichier.');
define('WARNING_SESSION_DIRECTORY_NON_EXISTENT', 'Attention : Le répertoire de session n\'existe pas : ' . tep_session_save_path() . '. Les sessions ne fonctionneront pas tant que ce répertoire n\'aura pas été créé.');
define('WARNING_SESSION_DIRECTORY_NOT_WRITEABLE', 'Attention : Il est impossible d\'écrire dans le répertoire de sessions ' . tep_session_save_path() . '. Les sessions ne fonctionneront pas tant que les permissions n\'auront pas été corrigées.');
define('WARNING_SESSION_AUTO_START', 'Attention : session.auto_start is enabled - désactiver cette fonctionnalité dans php.ini et redémarrer le serveur http.');
define('WARNING_DOWNLOAD_DIRECTORY_NON_EXISTENT', 'Attention : Le répertoire de téléchargement n\'existe pas : ' . DIR_FS_DOWNLOAD . '. Le téléchargement de produits ne fonctionnera qu\'avec un répertoire valide.');

define('TEXT_CCVAL_ERROR_INVALID_DATE', 'La date d\'expiration entrée pour cette carte de crédit n\'est pas valide. Veuillez vérifier la date et réessayez.');
define('TEXT_CCVAL_ERROR_INVALID_NUMBER', 'Le numémero entrée pour cette carte de crédit n\'est pas valide. Veuillez vérifier le numéro et réessayez.');
define('TEXT_CCVAL_ERROR_UNKNOWN_CARD', 'Le code à 4 chiffres que vous avez entré est : %s. Si ce code est correct, nous n\'acceptons pas ce type de carte crédit. S\'il est erroné veuillez réessayer.');

/*
  The following copyright announcement can only be
  appropriately modified or removed if the layout of
  the site theme has been modified to distinguish
  itself from the default osCommerce-copyrighted
  theme.

  For more information please read the following
  Frequently Asked Questions entry on the osCommerce
  support site:

  http://www.oscommerce.com/community.php/faq,26/q,50

  Please leave this comment intact together with the
  following copyright announcement.
*/
define('FOOTER_TEXT_BODY', 'Copyright &copy; ' . date('Y') . ' <a href="' . tep_href_link(FILENAME_DEFAULT) . '">' . STORE_NAME . '</a>');

define('Our_Best_Candles', 'Nos meilleurs bougies');
define('Our_Best_P_Her', 'Meilleurs parfums femme');
define('Our_Best_P_Him', 'Meilleurs parfums homme');
define('Skin_Care', 'Meilleurs soin de peau');
define('Nos_meilleurs_coffrets_w', 'Meilleur coffrets femme');
define('Nos_meilleurs_coffrets_m', 'Meilleurs coffrets homme');
define('meilleurs_marques', 'Meilleures marques');
define('Nos_marques', 'Nos marques');
define('minimum_order',  '<div align="center"><img src="images/wholesaleonly.jpg"></div>');
// this is used for strftime()
// pave best off

define('MENU_HOME', 'Accueil');
define('MENU_FRAGRANCES_WOMEN', 'Parfums Femme');
define('MENU_FRAGRANCE_MEN', 'Parfums Homme');
define('MENU_ALL_BRANDS', 'Toutes nos marques');
define('MENU_ACCOUNT', 'Mon compte');
define('MENU_CONTACT', 'Contact');
?>

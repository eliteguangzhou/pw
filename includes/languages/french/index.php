<?php
/*
  $Id: index.php,v 1.1 2003/06/11 17:38:00 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('TEXT_MAIN', 'C\'est une installation par d�faut du projet osCommerce, les produits affich�s ont un but d�monstratif, <b>n\'importe quel produit achet� sera ni livr� ni factur� au client</b>. N\'importe quelle information vue sur ces produits doit �tre trait�e comme fictive.<br><br>
<table border="0" summary="" width="100%" cellspacing="5" cellpadding="2">
<tr>
<td class="main" valign="top">' . tep_image(DIR_WS_IMAGES . 'default/1.gif') . '</td>
<td class="main" valign="top"><b>Messages d\'erreur </b><br><br>S\'il y a une erreur ou des messages d\'avertissement affich�s ci-dessus, corrigez-les d\'abord avant de poursuivre. <br><br>Les messages d\'erreur sont affich�s en haut de la page avec un <span class="messageStackError">fond</span> de cette couleur.<br><br>Plusieurs contr&ocirc;les sont ex�cut�s pour assurer une installation saine de votre magasin en ligne - Ces contr&ocirc;les peuvent �tre mis hors-service en �ditant les param�tres appropri�s dans le fichier includes/application_top.php. </td>
</tr>
<tr>
<td class="main" valign="top">' . tep_image(DIR_WS_IMAGES . 'default/2.gif') . '</td>
<td class="main" valign="top"><b>R�daction du contenu de la page </b><br><br>Le texte affich� peut �tre modifi� dans le fichier suivant, sur chaque base de langue :<br><br><span class="messageStackSuccess">[chemin du r�pertoire catalog]/includes/languages/' . $language . '/' . FILENAME_DEFAULT . '</span><br><br>Ce fichier peut �tre �dit� manuellement, ou via l\'outil d\'administration avec les modules  <span class="messageStackSuccess">Languages-&gt;' . ucfirst($language) . '-&gt;Define</span> ou <span class="messageStackSuccess">Tools-&gt;File Manager.<br><br>Le texte est affich� de la fa�on suivante:</span><br><br>define(\'TEXT_MAIN\', \'<span class="messageStackSuccess">C\'est une installation par d�faut du projet osCommerce...</span>\');<br><br>Le texte mis en �vidence en vert peut �tre modifi�  - Il est important dans define() de d�finir le mot-cl� TEXT_MAIN . Pour supprimer compl�tement le texte de TEXT_MAIN, L\'exemple suivant a employ� seulement deux caract�res de citation simples (Quotes) existant :<br><br>define(\'TEXT_MAIN\', \'\');<br><br>Plus d\'information concernant la fonction  PHP define() peut �tre lue <a href="http://www.php.net/manual/fr/function.define.php" target="_blank"><u>ici</u></a>.</td>
</tr>
<tr>
<td class="main" valign="top">' . tep_image(DIR_WS_IMAGES . 'default/3.gif') . '</td>
<td class="main" valign="top"><b>S�curisation de l\'outil d\'administration</b><br><br>Il est important de s�curiser l\'outil d\'administration comme il n\'y a actuellement aucune protection s�rieuse mise en &oelig;uvre .</td></tr><tr><td class="main" valign="top">' . tep_image(DIR_WS_IMAGES . 'default/4.gif') . '</td>
<td class="main" valign="top"><b>Documentation en ligne</b><br><br>La documentation en ligne peut �tre lue sur le site <a href="http://wiki.oscommerce.com" target="_blank"><u>osCommerce Wiki Documentation Effort</u></a>.
<br><br>Le forum support de la communaut� internationale est disponible sur <a href="http://forums.oscommerce.com" target="_blank"><u>osCommerce Community Support Forums</u></a>.
<br><br>Le forum support de la communaut� francophone est disponible sur <a href="http://www.oscommerce-fr.info/forum/index.php?showtopic=36121" target="_blank"><u>Forum osCommerce-fr</u></a>.
<br>La Foire Aux Questions de la communaut� francophone est disponible sur <a href="http://www.oscommerce-fr.info/faq/" target="_blank"><u>FAQ osCommerce-fr</u></a>.
<br>Le guide d\'installation francophone est disponible sur <a href="http://www.oscommerce-fr.info/portail/index.php?option=com_content&amp;task=section&amp;id=3&amp;Itemid=157" target="_blank"><u>Guide d\'installation</u></a>.
</td>
</tr>
</table>
<br>Si vous voulez t�l�charger la solution qu\'utilise ce magasin, ou si vous voulez contribuer au projet osCommerce, visitez s\'il vous pla�t le site francophone <a href="http://www.oscommerce-fr.info" target="_blank"><u>osCommerce-fr</u></a> ou le site communautaire g�n�rique <a href="http://www.oscommerce.com" target="_blank"><u>osCommerce</u></a>. Ce magasin utilise osCommerce version <font color=red><b>' . PROJECT_VERSION . '</b></font>.');
define('TABLE_HEADING_NEW_PRODUCTS', 'Nouveaux produits pour %s');
define('TABLE_HEADING_UPCOMING_PRODUCTS', 'Prochains produits');
define('TABLE_HEADING_DATE_EXPECTED', 'Date pr�vu');

if ( ($category_depth == 'products') || (isset($HTTP_GET_VARS['manufacturers_id'])) ) {
  define('HEADING_TITLE', 'Voyons ce que nous avons ici');
  define('TABLE_HEADING_IMAGE', '');
  define('TABLE_HEADING_MODEL', 'Mod�le');
  define('TABLE_HEADING_PRODUCTS', 'Nom du produit ');
  define('TABLE_HEADING_MANUFACTURER', 'Fabricant');
  define('TABLE_HEADING_QUANTITY', 'Quantit�');
  define('TABLE_HEADING_PRICE', 'Prix');
  define('TABLE_HEADING_WEIGHT', 'Poids');
  define('TABLE_HEADING_BUY_NOW', 'Acheter maintenant');
  define('TEXT_NO_PRODUCTS', 'Il n\'y a aucun produit list� dans cette cat�gorie.');
  define('TEXT_NO_PRODUCTS2', 'Il n\'y a aucun produit disponible de ce fabricant.');
  define('TEXT_NUMBER_OF_PRODUCTS', 'Nombre de produits :');
  define('TEXT_SHOW', '<b>Afficher :</b>');
  define('TEXT_BUY', 'Acheter 1 \'');
  define('TEXT_NOW', '\' maintenant');
  define('TEXT_ALL_CATEGORIES', 'Toutes cat�gories');
  define('TEXT_ALL_MANUFACTURERS', 'Tous fabricants');
} elseif ($category_depth == 'top') {
  define('HEADING_TITLE', 'Nouveaut�s ?');
} elseif ($category_depth == 'nested') {
  define('HEADING_TITLE', 'Cat�gories');
}

define('TEXT_INFO', '
<h3 class="text_rose">Our Concept / Notre Concept :</h3>
<b>Parfumwholesale.com</b> est un club priv� de vente de parfums <span class="text_rose">� prix co�tant (sans marge).</span>
C\'est gr�ce � vos remarques que nous avons cr�� ce Club. En effet, vous nous demandiez des prix toujours plus bas, un minimum de stock, un large choix de parfums, des grandes marques ... et beaucoup d\'autonomie....

A ce jour, le club compte 5000 membres actifs ce qui nous permet d\'avoir d\'importants volumes et donc de tr�s bon prix.

Chaque membre du club est comme un acheteur/vendeur ind�pendant.

Avantages <span class="text_rose">Membre CLUB :</span>

Nous vous proposons <span class="text_rose">tous nos parfums � prix co�tant (sans marge) !</span>
20 000 parfums de marques <span class="text_rose">100% authentiques</span> et sous blister
Exp�dition dans 80 pays
Tous les produits en ligne sont en <span class="text_rose">stock</span>
Traitement <span class="text_rose">prioritaire</span> des commandes
<span class="text_rose">30 jours</span> satisfait ou rembours�
Livraison rapide sous <span class="text_rose">8 � 12 jours ouvrables</span>
De moins <span class="text_rose">70% � moins 80%</span> sur les tarifs boutiques.

<span class="text_rose">Nous pouvons exp�dier vos parfums</span> dans le monde entier. <span class="text_rose">Cela vous permet d\'avoir z�ro stock !</span>

En moins d\'une minute <span class="text_rose">vous �tes � la t�te d\'une parfumerie</span> virtuelle de 20 000 produits (<span class="text_rose">l\'�quivalent de 6000m� de stock</span>)

Vous ne prenez <span class="text_rose">aucun risque</span> en ce qui concerne la mode, les invendus et vous restez tr�s r�actif vis � vis de vos clients.

Vous pouvez <span class="text_rose">appliquer les tarifs de vente que vous souhaitez</span>... ils sont enti�rement libres et sans aucune taxe !

<b>Parfumwholesale.com</b> gagne de l�argent <span class="text_rose">uniquement</span> sur les abonnements de ses adh�rents.

<a href="card_saphir.php"><img src="'.DIR_WS_IMAGES.'/carte_saphir_plus.jpg" /></a><br />
<a href="card_rubis.php"><img src="'.DIR_WS_IMAGES.'/carte_rubis_plus.jpg" /></a><br />
<a href="card_gold.php"><img src="'.DIR_WS_IMAGES.'/carte_or_plus.jpg" /></a><br />

<div class="center gras">
Vous avez besoin d�aide ?
Un commercial est l� pour vous aider : <a href="mailto:'.STORE_OWNER_EMAIL_ADDRESS.'">'.STORE_OWNER_EMAIL_ADDRESS.'</a>
</div>');
?>

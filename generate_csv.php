<?php
$models = array(
    146980,
    158460,
    146980,
    158460,
    160216,
    180706,
    161399,
    146791,
    152224,
    128243,
    168203,
    157464,
    142098,
    126632,
    119380,
    125201,
    117117,
    122232,
    153500,
    128123,
    150408,
    160216,
    128128,
    160444,
    165338,
    134885,
    150885,
    136002,
    125022,
    121658,
    140082,
    150755,
    158460,
    124753,
    128102,
    126008,
    116153,
    146980,
    163720,
    175675,
    125568,
    159360,
    126504,
    155159,
    122403,
    117101,
    150885,
    122179,
    125007,
    160757,
    148463,
    126607,
    123739
);

$fields = array(
    'CODEARTICLE' => 'products_model',
    'EAN' => 'products_model',
    'DATE_DEBUT_PUBLICATION_WEB' => false,
    'DATE_FIN_PUBLICATION_WEB' => false,
    'DESCRIPTION_WEB' => 'products_description',
    'INTITULE_WEB' => 'products_name',
    'MARQUE' => 'Brand',
    'SEXE' => 'Gender',
    'URL_FICHE_PRODUIT' => 'products_id',
    'KEYWORDS' => 'categories_name',
    'URL_PHOTO1' => 'products_image',
    'URL_PHOTO2' => false,
    'URL_PHOTO3' => false,
    'QUANTITE_DISPO' => 'products_quantity',
    'INFO_DISPO' => false,
    'CODE_TVA' => 1,
    'PV_TTC' => 'products_price',
    'PV_HT' => 'products_price',
    'MONTANT_TVA' => 1,
    'DATE_DEBUT_PV' => false,
    'PVR_TTC' => false,
    'PVR_HT' => false,
    'MONTANT_TVA_REMISE' => false,
    'DATE_DEBUT_PVR' => false,
    'DATE_FIN_PVR' => false,
    'INFO_LIVRAISON' => 'Colissimo/UPS, Livraison sous 7 à 12 jours ouvrés',
    'MONTANT_FRAIS_PORT' => 8,
    'DELAI_LIVRAISON' => 12,
    'CODEPRODUIT' => false,
    'ATTRIBUT_DISCRIMINANT' => false,
    'VALEUR_ATTRIBUT_DISCRIMINANT' => false
);

$gender = array('Hommes' => 'H', 'Femmes' => 'F', 'Unisex' => 'M');

    require('includes/application_top.php');
    
    $query = tep_db_query("
        SELECT
            p.products_model,
            pd.products_description,
            pd.products_name,
            p.products_id,
            p.products_image,
            p.products_quantity,
            FORMAT(pd.Prix_achat * 0.75 * 1.2 + 15, 2) as products_price,
            pd.Brand,
            pd.Gender,
            cd.categories_name
        FROM products p, products_description pd, products_to_categories p2c, categories_description cd
        WHERE p.products_model IN (".join(",", $models).")
        AND p.products_id = pd.products_id
        AND pd.language_id = 5
        AND pd.language_id = cd.language_id
        AND p2c.products_id = p.products_id
        AND p2c.categories_id = cd.categories_id"
    );
        
        
    $str        = '';
    $search     = 'download/youkado/CATALOGUE.40.<num>.CSV';
    $base       = 'download/youkado/cat.csv';
    $found      = false;
    $fichier    = 'CATALOGUE.40.1.CSV';
    
    for ($i=1; $i<=9999; $i++){
        if (file_exists(str_replace('<num>', $i, $search))){
            $found = true;
            $fichier = 'CATALOGUE.40.'.($i + 1).'.CSV';
        }
        elseif ($found)
            break;
    }
    $chemin = 'download/youkado/'.$fichier;
    $file = fopen($chemin, 'w, ccs=UTF-8');

    $i = 0;
    if ($file) {
        while ($info = tep_db_fetch_array($query)) {
            $line = array();
            if ($i > 0)
                $str .= "\n";

            foreach ($fields as $field => $value)
                if (!empty($value))
                    if (in_array($value, array_keys($info)))
                        if ($field == 'URL_PHOTO1')
                            $line[] = 'http://www.parfumwholesale.com/images/'.$info[$value];
                        elseif ($field == 'URL_FICHE_PRODUIT')
                            $line[] = 'http://www.parfumwholesale.com/product_info.php?products_id='.$info[$value];
                        elseif ($field == 'SEXE')
                            $line[] = $gender[$info[$value]];
                        elseif ($field == 'PV_TTC')
                            $line[] = number_format($info[$value] + round($info[$value] * 19.6)/100, 2);
                        else
                            $line[] = utf8_encode($info[$value]);
                    elseif ($field == 'MONTANT_TVA')
                        $line[] = round($info['products_price'] * 19.6)/100;
                    else
                        $line[] = $value;

                else $line[] = '';

                $str .= join (chr(9), $line);
                $i++;
        }

        iconv("UTF-8","UTF-8",$str);
        if (!fwrite($file, $i . "\n". $str) !== false)
            die('Erreur lors de l\'ecriture');

        fclose($file);

        header('Content-disposition: attachment; filename="' . $fichier . '"');
        header('Content-Type: application/force-download');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: '. filesize($chemin));
        header('Pragma: no-cache');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');
        readfile($chemin);
    }
    else
        die('le fichier "' . $fichier . '" n\'existe pas. Veuillez-nous excusez pour le desagrement.');
?>

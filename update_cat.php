<?php

//if (!empty($_POST) && $_POST['log23'] = 'admin' && $_POST['pass97'] == 'CurL2010') {
  error_reporting(E_ALL | E_STRICT);
    require('includes/application_top.php');
/*
    $query = tep_db_query("update products p, products_description pd SET p.products_price = pd.Prix_achat *1.1 where p.products_id = pd.products_id and pd.language_id = 1 ");
    echo "Prix mis a jour (marge 10% a la place de 20%) !<br />";

    $query = tep_db_query("select products_id, products_description, Item_size FROM products_description where language_id = 5 AND LOCATE('Eau de', products_description) > 0");
    while ($list = tep_db_fetch_array($query)) {
        $cmp1 = (float) str_replace(' OZ', '', $list['Item_size']);
        $str = array();
        ereg('([.0-9]{2,4} [OZoz]{2})',$list['products_description'], $str);

        if (!empty($str)) {
            $cmp2 = (float) str_replace(' OZ', '', $str[1]);
            if ($cmp1 !== $cmp2){
                tep_db_query("UPDATE products_description SET Item_size = '".$cmp2." OZ' WHERE products_id = ".$list['products_id']);
            }
        }

    }
    echo "Contenances des parfums inferieures a 1 OZ corrigees !<br />";

    $rupture_stock = array(
        'calvin klein',
        'chloe',
        'davidoff',
        'gwen stefani',
        'jennifer lopez',
        'jil sander',
        'joop!',
        'karl lagerfeld',
        'lancaster',
        'marc jacobs',
        'nino cerruti',
        'sarah jessica parker',
        'vera wang',
        'jette joop'
    );

    $str = '';
    foreach ($rupture_stock as $r)
        $str .= " manufacturers_name LIKE '%".$r."%' OR";

    $str = substr($str,0 , -3);

    //Suppression des produits prevus en rupture de stock
    $query = tep_db_query("select DISTINCT(products_id) as id FROM products p, manufacturers m where m.manufacturers_id = p.manufacturers_id and (".$str.")");
    delete_ids($query, $j);
    $query = tep_db_query("DELETE FROM manufacturers where ".$str);
    echo "Produits prevus en rupture de stock supprimes !<br />";
*/
    $query = "select DISTINCT products_image FROM products";
    $result = tep_db_query($query);

    while ($datas = tep_db_fetch_array($result)) 
      if (!file_exists('images/'.$datas['products_image'])) {
        if (($test = file_get_contents('http://www.fragrancenet.com/images/'.str_replace('photos/', 'photos/250x250/', $datas['products_image']))) !== false) {
          if (file_put_contents('images/'.$datas['products_image'], $test) === false)
            echo 'img non copiee : '.$datas['products_image'];
        }
        else
          echo 'img non inexistante : '.$datas['products_image'];
      }

    echo "<br />Mise a jour terminee !";
//}


function delete_ids($query, $j) {
    $i = 0;
    $delete_list = array();
    while ($list = tep_db_fetch_array($query))
    {
        $delete_list[] = $list['id'];

        if ($i++ == 100){
            delete($delete_list);
            echo "Centaine " . $j++ . "<br />";
            $i = 0;
            $delete_list = array();
        }

    }

    if ($i != 0 && !empty($delete_list))
        delete($delete_list);
}

function delete($ids){

    $tables = array(
        'products',
        'products_to_categories',
        'products_attributes',
        'products_description',
        'products_notifications'
    );

    foreach ($tables as $table)
        $query = tep_db_query("DELETE FROM " . $table . " where products_id IN  (" . join(',', $ids) . ")");
}
?>
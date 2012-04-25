<?php
if (empty($current_category_id)){}else{
pavemarque($current_category_id);
}

function pavemarque($current_category_id) {
$nbcol=3;
$i = 0;
$mamarqueold="sdfgsd";
$first="vrai";

$sql='SELECT DISTINCT
            manufacturers.manufacturers_name,
            categories.parent_id,
            manufacturers.manufacturers_id
        FROM manufacturers, products, products_to_categories, categories
        WHERE products.manufacturers_id = manufacturers.manufacturers_id
        AND products_to_categories.categories_id ='. $current_category_id .'
        AND products.products_id = products_to_categories.products_id
        AND categories.categories_id = products_to_categories.categories_id
        GROUP BY products.manufacturers_id
        HAVING SUM(products.products_quantity) > 2
        ORDER BY manufacturers_name';


$products_query = tep_db_query($sql);
												



echo '<table width="100%" border="2">';	
										
while($products = tep_db_fetch_array($products_query)) 
   					 {

$mamarque=$products['manufacturers_name'];


$speud=substr($speud,0,1);

if (substr($mamarque,0,1)<>substr($mamarqueold,0,1)) { //si changement de lettre ou nouvelle lettre
													//complete la ligne
														if ($i < $nbcol)
																		{
																		if ($i==1){  echo '<td width="33%"></td><td width="33%"></td>';}																	
																		if ($i==2) { echo '<td width="33%"></td>';}
																		echo '</tr>';
																		}
													//fin de completage de ligne


												//affichage de la lettre
													if ($first=="vrai"){  
																	echo '<table><tr><td width="59"><img src="images/alpha/'. substr($mamarque,0,1) .'.gif" /></td><td><table>';
																	$first="false";
																	}else{
																			echo '</td></tr></table></td></tr><tr><td colspan="59"><img src="images/bare.gif"></td></tr><tr><td width="39"><img src="images/alpha/'. substr($mamarque,0,1).'.gif" /></td><td><table>';
													
																			$i=0;
																		}
															}//fin de changement de lettre
									
//comptage des lignes
if ($i<$nbcol){
			$i++; 
			}else{
			$i=1;
			
			}
									
//fin comptage des lignes


		if ($i == 1) { 
					echo '<tr>'; 
					}

							echo '<td width="200"><a class="letter_center_roll" href="index.php?filter_id='.$products['manufacturers_id'].'&cPath='.$current_category_id.'">'.$products['manufacturers_name'].'</a></td>';


   if ($i==$nbcol) {  echo '</tr>'; }
    
//si c est une nouvelle lettre

$mamarqueold=$mamarque;

}



echo '</td></tr></table></table>';
}
?>
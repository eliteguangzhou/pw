<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans nom</title>
<style type="text/css">
<!--
.Style1 {color: #CCCCCC}
.Style2 {color: #FFFF66}
-->
</style>
</head>

<body>
<?
$db=MYSQL_CONNECT("localhost","siteweb","My18sw.s");
mysql_select_db("parfum",$db);
  
  $query="select products_model, products_price, products_name from products inner join products_description on products.products_id=products_description.products_id order by products_name";
$req=mysql_query($query);
$color=0;				
				echo '<table>';
				 
				     while($data = mysql_fetch_array($req)) 
   					 {  
if ($color==0){echo '<tr bgcolor="#FFFFFF"><span class="Style2">';
				$color=1;}else{$color=0;
				echo '<tr bgcolor="#CCCCCC"><span class="Style1">';
				}

							$rowCount = mysql_num_fields($req);
   
								for ($idx = 0; $idx < $rowCount; $idx++)
								{ 
								if ($idx==0){echo '<td width="200">';}
								if ($idx==1){echo '<td width="300">';}
								if ($idx==2){echo '<td width="500">';}
								echo $data[$idx];
								//echo ' '.$data[3];
								
								echo '</td>';
								}
								
echo '</span></tr>';								
						}
?>
</body>
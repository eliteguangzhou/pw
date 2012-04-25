<?php
$fichier = 'CATALOGUE.40.1.CSV';
$chemin = '/' . $fichier;
if (file_exists($chemin))
{
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
    echo 'le fichier "' . $fichier . '" n\'existe pas. Veuillez-nous excusez pour le désagrément.';
?>
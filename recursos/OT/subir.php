
<?php

$dir_subida = '../../images/files/';
$fichero_subido = $dir_subida . basename($_FILES['file']['name']);
//echo $fichero_subido;

//echo '<pre>';
if (move_uploaded_file($_FILES['file']['tmp_name'], $fichero_subido)) {
    $datos['Mensaje'] = "Archivo Subido!";
    //echo "El fichero es válido y se subió con éxito.\n";
} else {
    echo "¡Posible ataque de subida de ficheros!\n";
}

//$datos = json_encode($_FILES);

//echo $datos;

//echo 'Más información de depuración:';
//print_r($_FILES);

//print "</pre>";
?>

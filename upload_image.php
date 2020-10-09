
<?php
$target_dir = "assets/images/";

$fileName = $_FILES['fileToUpload']['name'];

$OT=$_POST['OT'];
//echo $OT;
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));
$newFileName = md5(time() . $fileName) . '.' . $fileExtension;

$target_file = $target_dir . basename($newFileName);

//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//$OT_id=$_FILES["fileToUpload"]["OT"];

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "El Archivo no es una imágen.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Disculpa, el nombre de fichero ya existe.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Disculpa, el archivo es demasiado grande.";
    $uploadOk = 0;
}
// Allow certain file formats
if (
    $imageFileType != "JPEG" && $imageFileType != "PNG" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"
) {
    echo "Disculpa, sólo JPG, JPEG, PNG & GIF están permitidos.";
    //echo $target_file;
    $uploadOk = 0;
}
if ($uploadOk) {
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
        $_SESSION['user']='root';
        $_SESSION['password']='';
        $pdo = new PDO('mysql:host=localhost;dbname=newelecad', $_SESSION['user'], $_SESSION['password']);
        //include_once("recursos/stringconexion.inc");
        $sql = "UPDATE ots SET OT_file='" . $newFileName . "' WHERE id=$OT";
        //echo $sql;
        $resultado = $GLOBALS['pdo']->prepare($sql);
        $resultado->execute();
        //echo "El fichero es válido y se subió con éxito.\n";
        //header("location:javascript://history.go(-1)");

    } else {
        echo "¡Posible ataque de subida de ficheros!\n";
    }
}
?>

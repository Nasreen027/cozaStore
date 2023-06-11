<?php
include('connection.php');
include_once("./includes/functions.php");

if (isset($_POST['addCtgBtn'])) {
    $ctgName = $_POST['ctgName'];
    $ctgImage = $_FILES['ctgImage']['name'];
    $ctgImageSize = $_FILES['ctgImage']['size'];
    $ctgImageTmpName = $_FILES['ctgImage']['tmp_name'];
    $ctgImageExt = pathinfo($ctgImage, PATHINFO_EXTENSION);

    $randomImageName = generateRandomString(10).".".$ctgImageExt;
    $destination = __DIR__."/img/" . $randomImageName;

    echo "came here";

    if ($ctgImageSize <= 4800000) {
        if($ctgImageExt == 'jpeg' || $ctgImageExt == 'jpg' || $ctgImageExt == 'png' || $ctgImageExt == 'svg' || $ctgImageExt == 'webp'){
            echo $ctgImageTmpName."-----TEMP NAME----".$destination."----DEST----".$ctgImage."---CTG IMAGE";
            // exit();
            if(move_uploaded_file($ctgImageTmpName,$destination)){
                $query = $pdo->prepare('insert into category(ctgName,ctgImage) values(:ctgName,:ctgImage)');
                $query->bindParam('ctgName',$ctgName);
                $query->bindParam('ctgImage',$randomImageName);
                $query->execute();
                echo "<script>alert('Product added successfully')</script>";
            }
            else{
                echo "<script>alert('Product not added')</script>";
            }

        }
        else{
            echo "<script>alert('Invalid extension')</script>";
        }
    }
    else{
        echo "<script>alert('file is too heavy')</script>";
    };

}

?>
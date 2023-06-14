<?php
include('connection.php');
include_once("./includes/functions.php");
 
//add category
if (isset($_POST['addCtgBtn'])) {
    $ctgName = $_POST['ctgName'];
    $ctgImage = $_FILES['ctgImage']['name'];
    $ctgImageSize = $_FILES['ctgImage']['size'];
    $ctgImageTmpName = $_FILES['ctgImage']['tmp_name'];
    $ctgImageExt = pathinfo($ctgImage, PATHINFO_EXTENSION);

    $randomImageName = generateRandomString(10).".".$ctgImageExt;
    $destination = __DIR__."/img/" . $randomImageName;

    // echo "came here";

    if ($ctgImageSize <= 4800000) {
        if($ctgImageExt == 'jpeg' || $ctgImageExt == 'jpg' || $ctgImageExt == 'png' || $ctgImageExt == 'svg' || $ctgImageExt == 'webp'){
            // echo $ctgImageTmpName."-----TEMP NAME----".$destination."----DEST----".$ctgImage."---CTG IMAGE";
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

//add product
if (isset($_POST['addProdBtn'])) {
    $prName = $_POST['prName'];
    $prPrice = $_POST['prPrice'];
    $prQty = $_POST['prQty'];
    $selectCtg = $_POST['selectCtg'];
    $prImage = $_FILES['prImage']['name'];
    $prImageSize = $_FILES['prImage']['size'];
    $prImageTmpName = $_FILES['prImage']['tmp_name'];
    $prImageExt = pathinfo($prImage, PATHINFO_EXTENSION);

    $randomImageNameProd = generateRandomString(10).".".$prImageExt;
    $destinationProd = __DIR__."/img/" . $randomImageNameProd;

    // echo "came here";

    if ($prImageSize <= 4800000) {
        if($prImageExt == 'jpeg' || $prImageExt == 'jpg' || $prImageExt == 'png' || $prImageExt == 'svg' || $prImageExt == 'webp'){
            // echo $prImageTmpName."-----TEMP NAME----".$destinationProd."----DEST----".$prImage."---CTG IMAGE";
            // exit();
            if(move_uploaded_file($prImageTmpName,$destinationProd)){
                $query = $pdo->prepare('insert into products(name,price,qty,proImage,category) values(:name,:price,:qty,:proImage,:category)');
                $query->bindParam('name',$prName);
                $query->bindParam('price',$prPrice);
                $query->bindParam('qty',$prQty);
                $query->bindParam('proImage',$randomImageNameProd);
                $query->bindParam('category',$selectCtg);
                $query->execute();
                echo "after executing";
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
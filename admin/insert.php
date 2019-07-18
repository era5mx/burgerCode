<?php
/*
 * ------------------------------------------------------------------------
 * Burger v.1.0
 * ------------------------------------------------------------------------
 * Author: David Rengifo
 * Author page: http://david.rengifo.mx/
 */

require_once('../includes/config.php');
require 'database.php';
include(!file_exists('../lang/lang_' . APP_LANG . '.php') ? '../lang/lang_en.php' : '../lang/lang_' . APP_LANG . '.php' );

$nameError = $descriptionError = $priceError = $categoryError = $imageError = $name = $description = $price = $category = $image = "";

if (!empty($_POST)) {
    $name = checkInput($_POST['name']);
    $description = checkInput($_POST['description']);
    $price = checkInput($_POST['price']);
    $category = checkInput($_POST['category']);
    $image = checkInput($_FILES["image"]["name"]);
    $imagePath = '../images/' . basename($image);
    $imageExtension = pathinfo($imagePath, PATHINFO_EXTENSION);
    $isSuccess = true;
    $isUploadSuccess = false;

    if (empty($name)) {
        $nameError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }
    if (empty($description)) {
        $descriptionError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }
    if (empty($price)) {
        $priceError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }
    if (empty($category)) {
        $categoryError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }
    if (empty($image)) {
        $imageError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    } else {
        $isUploadSuccess = true;
        if ($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif") {
            $imageError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
            $isUploadSuccess = false;
        }
        if (file_exists($imagePath)) {
            $imageError = "Le fichier existe deja";
            $isUploadSuccess = false;
        }
        if ($_FILES["image"]["size"] > 500000) {
            $imageError = "Le fichier ne doit pas depasser les 500KB";
            $isUploadSuccess = false;
        }
        if ($isUploadSuccess) {
            if (!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) {
                $imageError = "Il y a eu une erreur lors de l'upload";
                $isUploadSuccess = false;
            }
        }
    }

    if ($isSuccess && $isUploadSuccess) {
        $db = Database::connect();
        $statement = $db->prepare("INSERT INTO items (name,description,price,category,image) values(?, ?, ?, ?, ?)");
        $statement->execute(array($name, $description, $price, $category, $image));
        Database::disconnect();
        header("Location: index.php");
    }
}

function checkInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<?php include_once('layouts/header.php'); ?>

<div class="container admin">
    <div class="row">
        <h1><strong><? echo ADD_PRODUCT; ?></strong></h1>
        <br>
        <form class="form" action="insert.php" role="form" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name"><? echo NAME; ?>:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?php echo $name; ?>">
                <span class="help-inline"><?php echo $nameError; ?></span>
            </div>
            <div class="form-group">
                <label for="description"><? echo DESCRIPTION; ?>:</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php echo $description; ?>">
                <span class="help-inline"><?php echo $descriptionError; ?></span>
            </div>
            <div class="form-group">
                <label for="price"><? echo PRECIO; ?>: (en €)</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Prix" value="<?php echo $price; ?>">
                <span class="help-inline"><?php echo $priceError; ?></span>
            </div>
            <div class="form-group">
                <label for="category"><? echo CATEGORIE; ?>:</label>
                <select class="form-control" id="category" name="category">
                    <?php
                    $db = Database::connect();
                    foreach ($db->query('SELECT * FROM categories') as $row) {
                        echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        ;
                    }
                    Database::disconnect();
                    ?>
                </select>
                <span class="help-inline"><?php echo $categoryError; ?></span>
            </div>
            <div class="form-group">
                <label for="image"><? echo SELECTION_IMAGE; ?>:</label>
                <input type="file" id="image" name="image"> 
                <span class="help-inline"><?php echo $imageError; ?></span>
            </div>
            <br>
            <div class="form-actions">
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> <? echo ADD_PRODUCT; ?></button>
                <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> <? echo BACK; ?></a>
            </div>
        </form>
    </div>
</div>   

<?php include_once('layouts/footer.php'); ?>

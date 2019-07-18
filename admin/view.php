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

if (!empty($_GET['id'])) {
    $id = checkInput($_GET['id']);
}

$db = Database::connect();
$statement = $db->prepare("SELECT items.id, items.name, items.description, items.price, items.image, categories.name AS category FROM items LEFT JOIN categories ON ( categories.lang = \'' . APP_LANG . '\' AND items.category = categories.id) WHERE items.id = ?");
$statement->execute(array($id));
$item = $statement->fetch();
Database::disconnect();

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
        <div class="col-sm-6">
            <h1><strong><? echo VIEW_PRODUCT; ?></strong></h1>
            <br>
            <form>
                <div class="form-group">
                    <label><? echo NAME; ?>:</label><?php echo '  ' . $item['name']; ?>
                </div>
                <div class="form-group">
                    <label><? echo DESCRIPTION; ?>:</label><?php echo '  ' . $item['description']; ?>
                </div>
                <div class="form-group">
                    <label><? echo PRECIO; ?>:</label><?php echo '  ' . number_format((float) $item['price'], 2, '.', '') . APP_CURRENCY; ?>
                </div>
                <div class="form-group">
                    <label><? echo CATEGORIE; ?>:</label><?php echo '  ' . $item['category']; ?>
                </div>
                <div class="form-group">
                    <label><? echo IMAGE; ?>:</label><?php echo '  ' . $item['image']; ?>
                </div>
            </form>
            <br>
            <div class="form-actions">
                <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> <? echo BACK; ?></a>
            </div>
        </div> 
        <div class="col-sm-6 site">
            <div class="thumbnail">
                <img src="<?php echo '../images/' . $item['image']; ?>" alt="...">
                <div class="price"><?php echo number_format((float) $item['price'], 2, '.', '') . APP_CURRENCY; ?></div>
                <div class="caption">
                    <h4><?php echo $item['name']; ?></h4>
                    <p><?php echo $item['description']; ?></p>
                    <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> <? echo ADD_CART; ?></a>
                </div>
            </div>
        </div>
    </div>
</div>  

<?php include_once('layouts/footer.php'); ?>



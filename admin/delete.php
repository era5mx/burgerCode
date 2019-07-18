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

if (!empty($_GET['id'])) {
    $id = checkInput($_GET['id']);
}

if (!empty($_POST)) {
    $id = checkInput($_POST['id']);
    $db = Database::connect();
    $statement = $db->prepare("DELETE FROM items WHERE id = ?");
    $statement->execute(array($id));
    Database::disconnect();
    header("Location: index.php");
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
        <h1><strong><? echo REMOVE_PRODUCT; ?></strong></h1>
        <br>
        <form class="form" action="delete.php" role="form" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
            <p class="alert alert-warning"><? echo CONFIRM_REMOVE_PRODUCT; ?></p>
            <div class="form-actions">
                <button type="submit" class="btn btn-warning"><? echo YES; ?></button>
                <a class="btn btn-default" href="index.php"><? echo NO; ?></a>
            </div>
        </form>
    </div>
</div>   

<?php include_once('layouts/footer.php'); ?>


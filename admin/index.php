<?php
/*
 * ------------------------------------------------------------------------
 * Burger v.1.0
 * ------------------------------------------------------------------------
 * Author: David Rengifo
 * Author page: http://david.rengifo.mx/
 */
require_once('../includes/config.php');
include(!file_exists('../lang/lang_' . APP_LANG . '.php') ? '../lang/lang_en.php' : '../lang/lang_' . APP_LANG . '.php' );
?>
<?php include_once('layouts/header.php'); ?>

<div class="container admin">
    <div class="row">
        <h1><strong><? echo PRODUCT_LIST; ?> </strong> <div class="text-right"><a href="insert.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> <? echo ADD_PRODUCT; ?></a></div></h1>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th><? echo NAME; ?></th>
                    <th><? echo DESCRIPTION; ?></th>
                    <th><? echo PRECIO; ?></th>
                    <th><? echo CATEGORIE; ?></th>
                    <th><div class="text-center"><? echo ACTIONS; ?></div></th>
                </tr>
            </thead>
            <tbody>
                <?php
                require 'database.php';
                $db = Database::connect();
                $statement = $db->query('SELECT items.id, items.name, items.description, items.price, categories.name AS category FROM items INNER JOIN categories ON ( categories.lang = \'' . APP_LANG . '\' AND items.category = categories.id) ORDER BY items.id DESC');
                while ($item = $statement->fetch()) {
                    echo '<tr>';
                    echo '<td>' . $item['name'] . '</td>';
                    echo '<td>' . $item['description'] . '</td>';
                    echo '<td>' . number_format($item['price'], 2, '.', '') . '</td>';
                    echo '<td>' . $item['category'] . '</td>';
                    echo '<td width=300>';
                    echo '<a class="btn btn-default" href="view.php?id=' . $item['id'] . '"><span class="glyphicon glyphicon-eye-open"></span>' . VIEW . '</a>';
                    echo ' ';
                    echo '<a class="btn btn-primary" href="update.php?id=' . $item['id'] . '"><span class="glyphicon glyphicon-pencil"></span>' . MODIFY . '</a>';
                    echo ' ';
                    echo '<a class="btn btn-danger" href="delete.php?id=' . $item['id'] . '"><span class="glyphicon glyphicon-remove"></span>' . REMOVE . '</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                Database::disconnect();
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once('layouts/footer.php'); ?>

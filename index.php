<?php
/*
 * ------------------------------------------------------------------------
 * Burger v.1.0
 * ------------------------------------------------------------------------
 * Author: David Rengifo
 * Author page: http://david.rengifo.mx/
 */
require_once('includes/config.php');
include(!file_exists('lang/lang_' . APP_LANG . '.php') ? 'lang/lang_en.php' : 'lang/lang_' . APP_LANG . '.php' );
?>

<!DOCTYPE html>
<html lang="<? echo APP_LANG; ?>">
    <head>
        <title><? echo APP_TITLE; ?></title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>

        <link type="text/css" rel="stylesheet" href="libs/css/styles.css"/>
        <link type="text/css" rel="stylesheet" href="libs/css/bootstrap.min.css"/>
        <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Holtwood+One+SC"/>

    </head>

    <body>
        <div class="container site">
            <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> <? echo APP_TITLE; ?> <span class="glyphicon glyphicon-cutlery"></span></h1>
                <?php
                require 'admin/database.php';

                echo '<nav>
                        <ul class="nav nav-pills">';

                $db = Database::connect();
                $statement = $db->query('SELECT id, name FROM categories where lang=\'' . APP_LANG . '\'');
                $categories = $statement->fetchAll();
                foreach ($categories as $category) {
                    if ($category['id'] == '1' || $category['id'] == '7')
                        echo '<li role="presentation" class="active"><a href="#' . $category['id'] . '" data-toggle="tab">' . $category['name'] . '</a></li>';
                    else
                        echo '<li role="presentation"><a href="#' . $category['id'] . '" data-toggle="tab">' . $category['name'] . '</a></li>';
                }

                echo '</ul>
                      </nav>';

                echo '<div class="tab-content">';

                foreach ($categories as $category) {
                    if ($category['id'] == '1' || $category['id'] == '7')
                        echo '<div class="tab-pane active" id="' . $category['id'] . '">';
                    else
                        echo '<div class="tab-pane" id="' . $category['id'] . '">';

                    echo '<div class="row">';

                    $statement = $db->prepare('SELECT * FROM items WHERE items.category = ?');
                    $statement->execute(array($category['id']));
                    while ($item = $statement->fetch()) {
                        echo '<div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="images/' . $item['image'] . '" alt="...">
                                    <div class="price">' . number_format($item['price'], 2, '.', '') . APP_CURRENCY . '</div>
                                    <div class="caption">
                                        <h4>' . $item['name'] . '</h4>
                                        <p>' . $item['description'] . '</p>
                                        <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> ' . ADD_CART . '</a>
                                    </div>
                                </div>
                            </div>';
                    }

                    echo '</div>
                        </div>';
                }
                Database::disconnect();
                echo '</div>';
                ?>
        </div>

        <!-- JQuery 3.3.1 -->
        <script type="text/javascript" src="libs/js/jquery.min.js"></script>
        <!-- Bootstrap 3.4.1 -->
        <script type="text/javascript" src="libs/js/bootstrap.min.js"></script>

    </body>
</html>


<?php include('../connection/connect.php'); ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<?php include('include/head.php') ?>
<?php include('include/script.php') ?>

<?php if (isset($_SESSION['user_login']) && !empty($_SESSION['user_login'])) : ?>

    <body class="app">
        <?php include 'include/header.php'; ?>
        <div class="app-wrapper">
            <div class="app-content pt-3 p-md-3 p-lg-4">
                <div class="container-xl">
                    <?php
                    if (!isset($_GET['page']) && empty($_GET['page'])) {
                        include('dashboard/index.php');
                    } elseif (isset($_GET['page']) && $_GET['page'] == 'about') {
                        include('about/about.php');
                    } elseif (isset($_GET['page']) && $_GET['page'] == 'product') {
                        include('products/product.php');
                    } elseif (isset($_GET['page']) && $_GET['page'] == 'category') {
                        include('category/category.php');
                    } elseif (isset($_GET['page']) && $_GET['page'] == 'admin') {
                        if (isset($_GET['function']) && $_GET['function'] == 'add') {
                            include('admin/insert.php');
                        } elseif (isset($_GET['function']) && $_GET['function'] == 'update') {
                            include('admin/edit.php');
                        } elseif (isset($_GET['function']) && $_GET['function'] == 'delete') {
                            include('admin/delete.php');
                        } else {
                            include('admin/index.php');
                        }
                    } elseif (isset($_GET['page']) && $_GET['page'] == 'profile') {
                        include('admin/profile.php');
                    } elseif (isset($_GET['page']) && $_GET['page'] == 'logout') {
                        include('login/logout.php');
                    }

                    ?>
                </div>

            </div>
            <?php include('include/footer.php') ?>
        </div>

    </body>
<?php else : ?>
    <?php include('login/login.php  ') ?>
<?php endif; ?>

</html>
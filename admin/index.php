<?php include('../connection/connect.php'); ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<?php include('include/head.php'); ?>
<?php include('include/script.php'); ?>
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
                        if (isset($_GET['function']) && $_GET['function'] == 'managebussinessunit') {
                            include('category/businessunit/magebusinessunit.php');
                        } elseif (isset($_GET['function']) && $_GET['function'] == 'delete') {
                            include('category/businessunit/delet.php');
                        } elseif (isset($_GET['function']) && $_GET['function'] == 'managel2group') {
                            include('category/l2group/categorygroup.php');
                        } elseif (isset($_GET['function']) && $_GET['function'] == 'addproduct') {
                            include('category/l2group/addProduct.php');
                        } elseif (isset($_GET['function']) && $_GET['function'] == 'deletel2group') {
                            include('category/l2group/delete.php');
                        } elseif (isset($_GET['function']) && $_GET['function'] == 'updateproductcategory') {
                            include('category/l2group/update.php');
                        } elseif (isset($_GET['function']) && $_GET['function'] == 'managel3group') {
                            include('category/l3group/cateunit.php');
                        } elseif (isset($_GET['function']) && $_GET['function'] == 'addproductUnit') {
                            include('category/l3group/addCateUnit.php');
                        } elseif (isset($_GET['function']) && $_GET['function'] == 'deletel3group') {
                            include('category/l3group/deleteUnit.php');
                        } elseif (isset($_GET['function']) && $_GET['function'] == 'updateproductcategoryUnit') {
                            include('category/l3group/updateUnit.php');
                        } else {
                            include('category/category.php');
                        }
                    } elseif (isset($_GET['page']) && $_GET['page'] == 'admin') {
                        if (isset($_GET['function']) && $_GET['function'] == 'add') {
                            include('admin/insert.php');
                        } elseif (isset($_GET['function']) && $_GET['function'] == 'update') {
                            include('admin/edit.php');
                        } elseif (isset($_GET['function']) && $_GET['function'] == 'resetpassword') {
                            include('admin/resetpassword.php');
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
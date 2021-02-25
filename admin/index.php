<?php include('../connection/connect.php') ?>

<!DOCTYPE html>
<html lang="en">
<?php include('include/head.php') ?>

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
                    } else {
                        include('admin/index.php');
                    }
                }

                ?>
            </div>

        </div>
        <?php include('include/footer.php') ?>
    </div>
    <?php include('include/script.php') ?>

</body>

</html>
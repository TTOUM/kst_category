<?php

$query_bu = mysqli_query($con, "SELECT*FROM businessunit");
$query_l2 = mysqli_query($con, "SELECT*FROM l2group");
$query_l3 = mysqli_query($con, "SELECT*FROM l3group");

?>
<script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<div class="row justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">Category</h1>
    </div>
</div>
<hr class="mb-4">
<div class="row gy-4">
    <!-- Business Unit -->
    <div class="col-12 col-lg-6">
        <form action="" method="post">
            <div class=" app-card app-card-account shadow-sm d-flex flex-column align-items-end">
                <div class="app-card-footer pt-4 pr-4 mt-auto">
                    <input type="hidden" name="profile">
                    <a href="?page=<?= $_GET['page'] ?>&function=managebussinessunit" class="btn btn-outline-primary bg-success text-white">Manage</a>
                </div>
                <div class="app-card-header p-3 ">
                    <div class="row align-items-center gx-3">
                        <div class="col-auto">
                        </div>
                        <div class="col-auto">
                            <h4 class="app-card-title  pb-2">Business Unit</h4>
                        </div>
                        <table class="table" id="business">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Business Unit</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($query_bu as $data) : ?>
                                    <tr>
                                        <td><?= $data['businessid'] ?></td>
                                        <td><?= $data['businessunit'] ?></td>

                                    </tr>

                                <?php endforeach; ?>
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>

        </form>
    </div>
    <!-- L2Category -->
    <div class="col-12 col-lg-6">
        <form action="" method="post">
            <div class=" app-card app-card-account shadow-sm d-flex flex-column align-items-end">
                <div class="app-card-footer pt-4 pr-4 mt-auto">
                    <input type="hidden" name="profile">
                    <a href="?page=<?= $_GET['page'] ?>&function=managel2group" class="btn btn-outline-primary bg-success text-white">Manage</a>
                </div>
                <div class="app-card-header p-3  ">
                    <div class="row align-items-center gx-3">
                        <div class="col-auto">
                        </div>
                        <div class="col-auto">
                            <h4 class="app-card-title  pb-2">Product Category</h4>
                        </div>
                        <table class="table" id="l2group">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Business Unit</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $index = 1;
                                foreach ($query_l2 as $data) : ?>
                                    <tr>
                                        <td><?= $index ?></td>
                                        <td><?= $data['l2groupname'] ?></td>

                                    </tr>

                                <?php $index++;
                                endforeach; ?>
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>

        </form>
    </div>
    <!-- L3Category -->
    <div class="col-12 col-lg-6">
        <form action="" method="post">
            <div class=" app-card app-card-account shadow-sm d-flex flex-column align-items-end">
                <div class="app-card-footer pt-4 pr-4 mt-auto">
                    <input type="hidden" name="profile">
                    <a href="?page=<?= $_GET['page'] ?>&function=managel3group" class="btn btn-outline-primary bg-success text-white">Manage</a>
                </div>
                <div class="app-card-header p-3  ">
                    <div class="row align-items-center gx-3">
                        <div class="col-auto">
                        </div>
                        <div class="col-auto">
                            <h4 class="app-card-title  pb-2">Product Category Unit</h4>
                        </div>
                        <table class="table" id="l3group">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Category Unit</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $index = 1;
                                foreach ($query_l3 as $data) : ?>
                                    <tr>
                                        <td><?= $index ?></td>
                                        <td><?= $data['l3groupname'] ?></td>

                                    </tr>
                                <?php $index++;
                                endforeach; ?>
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>

        </form>
    </div>

</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#l3group').DataTable({
            lengthMenu: [10, 20, 50, 100, 200, 500],

        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#l2group').DataTable({
            lengthMenu: [5, 10, 20, 50, 100, 200, 500],

        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#business').DataTable({
                lengthMenu: [5, 10, 20, 50, 100, 200, 500],


            }

        );
    });
</script>
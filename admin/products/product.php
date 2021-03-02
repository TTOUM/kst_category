<?php
$user_login = $_SESSION['user_login'];
$sql = "SELECT*FROM products";
$query = mysqli_query($con, $sql);

?>


<h1 class="app-page-title">Product</h1>
<hr class="mb-4" />
<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <a href="?page=<?= $_GET['page'] ?>&function=add" class="btn btn-outline-primary mb-2 float-right bg-success text-white">Add Product</a>
                <table class="table align-middle table-bordered border-primary" id="products">
                    <thead>
                        <tr>
                            <th scope=" col">ProductID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Example</th>
                            <th scope="col">Menu</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($query as $data) : ?>
                            <tr>
                                <td><?= $data['proid'] ?></td>
                                <td><?= $data['proname'] ?></td>
                                <td><?= $data['descriptions'] ?></td>
                                <td><?= $data['example'] ?></td>
                                <td>
                                    <a href="">Edit</a>
                                    <a href="" onclick="return confirm('Do you want to delete this user?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>
<script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#products').DataTable({
                lengthMenu: [10, 20, 50, 100, 200, 500],
            }

        );
    });
</script>


<?php mysqli_close($con) ?>
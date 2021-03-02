<?php
$sql = " SELECT*FROM l2group ";
$query = mysqli_query($con, $sql);
if (isset($_POST) && !empty($_POST)) {
    $buname = $_POST['buname'];
    $sql_insert = "INSERT INTO businessunit (businessid,businessunit) VALUES ('','$buname')";
    $query_insert = mysqli_query($con, $sql_insert);
    if ($query_insert > 0) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("Added Successfully!!");';
        $alert .= 'window.location.href="?page=category&function=managebussinessunit";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        // echo "Failed==" . $sql_insert . "<br>" . mysqli_error($con);
    }
}



?>
<h1 class="app-page-title">Product Category</h1>
<hr class="mb-4" />
<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">

                <a href="?page=<?= $_GET['page'] ?>&function=addproduct" class="btn btn-outline-primary mb-2 float-right bg-success text-white">Add
                </a>

                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th scope=" col">No</th>
                            <th scope="col">Nane</th>
                            <th scope="col">Menu</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $index = 1;

                        foreach ($query as $data) : ?>
                            <tr>
                                <td><?= $index ?></td>
                                <td><?= $data['l2groupname'] ?></td>

                                <td>
                                    <a href="?page=<?= $_GET['page'] ?>&function=updateproductcategory&id=<?= $data['l2id'] ?>&&name=<?= $data['l2groupname'] ?>&&bid=<?= $data['businessid'] ?>" class="btn text-warning">Update</a>
                                    <a href="?page=<?= $_GET['page'] ?>&function=deletel2group&id=<?= $data['l2id'] ?>" onclick="return confirm('Do you want to delete this item?')" class="btn text-danger">Delete</a>
                                </td>


                            </tr>


                        <?php $index++;
                        endforeach; ?>
                    </tbody>


                </table>


            </div>
        </div>
    </div>
</div>
<script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

<?php mysqli_close($con);
?>
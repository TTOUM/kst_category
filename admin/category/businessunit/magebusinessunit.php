<?php

$sql = " SELECT*FROM businessunit ";
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
        echo "Failed==" . $sql_insert . "<br>" . mysqli_error($con);
    }
}
// $id = '10';
// if (isset($_POST['business']) && !empty($_GET['id'])) {

//     echo $id;
//     // $sql = "SELECT*FROM businessunit WHERE businessid='$id'";
//     // $query = mysqli_query($con, $sql);
//     // $result = mysqli_fetch_assoc($query);
// }
// if (isset($_POST) && !empty($_POST)) {

//     $businessname = $_POST["businessname"];


//     $sql = "UPDATE businessunit SET businessunit='$businessname', WHERE businessid='$id'";
//     if (mysqli_query($con, $sql)) {
//         $alert = '<script type="text/javascript">';
//         $alert .= 'alert("Update Successfully!!");';
//         $alert .= 'window.location.href="?page=admin";';
//         $alert .= '</script>';
//         echo $alert;
//         exit();
//     } else {
//         echo "Failed==" . $sql . "<br>" . mysqli_error($con);
//     }

//     mysqli_close($con);
// }


?>
<h1 class="app-page-title">Business Unit</h1>
<hr class="mb-4" />
<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">

                <button type="button" class="btn btn-outline-primary mb-2 float-right bg-success text-white" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add </button>

                <!-- Pop up Dialog Input Insert -->
                <form method="post">
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">New Business Unit</h5>
                                </div>
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Name:</label>
                                        <input type="text" class="form-control" id="recipient-name" name="buname">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


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
                                <td><?= $data['businessunit'] ?></td>

                                <td>
                                    <!-- <a href="?page=<?= $_GET['page'] ?>&function=update&id=<?= $data['businessid'] ?>" class=" btn" data-toggle="modal" data-target="#updateModel" data-whatever="@mdo">Edit</a> -->
                                    <a href="?page=<?= $_GET['page'] ?>&function=delete&id=<?= $data['businessid'] ?>" onclick="return confirm('Do you want to delete this user?')" class="btn">Delete</a>
                                </td>


                            </tr>


                        <?php $index++;
                        endforeach; ?>
                    </tbody>


                </table>

                <!-- Update data Dialog -->
                <!-- <form method="post">
                    <div class="modal fade" id="updateModel" tabindex="-1" role="dialog" aria-labelledby="updateModelLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateModelLabel">Update</h5>
                                </div>
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Name:</label>
                                        <input type="text" class="form-control" id="recipient-name" name="businessname" value="<?= $id ?>">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form> -->

            </div>
        </div>
    </div>
</div>
<script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script><?php mysqli_close($con); ?>
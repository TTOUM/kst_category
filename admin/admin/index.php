<?php
$user_login = $_SESSION['user_login'];
$sql = "SELECT*FROM users";
$query = mysqli_query($con, $sql);

?>
<h1 class="app-page-title">User</h1>
<hr class="mb-4" />
<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <a href="?page=<?= $_GET['page'] ?>&function=add" class="btn btn-outline-primary mb-2 float-right bg-success text-white">Add
                    User</a>
                <table class="table" id="myTable" style="width:100%">
                    <thead>
                        <tr>
                            <th scope=" col">Username</th>
                            <th scope="col">Nane</th>
                            <th scope="col">Surname</th>
                            <th scope="col">Position</th>
                            <th scope="col">Crate Date</th>
                            <th scope="col">Last Login</th>
                            <th scope="col">Menu</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($query as $data) : ?>
                            <tr>
                                <td><?= $data['username'] ?></td>
                                <td><?= $data['firstname'] ?></td>
                                <td><?= $data['lastname'] ?></td>
                                <td><?= $data['position'] == 0 ? 'User' : 'Admin' ?></td>
                                <td><?= $data['create_date'] ?></td>
                                <td><?= $data['last_login'] ?></td>

                                <td>
                                    <a href="?page=<?= $_GET['page'] ?>&function=update&id=<?= $data['uid'] ?>" class="btn text-warning">Edit</a>
                                    <a href="?page=<?= $_GET['page'] ?>&function=resetpassword&id=<?= $data['uid'] ?>" class="btn text-success">Reset</a>
                                    <a href="?page=<?= $_GET['page'] ?>&function=delete&id=<?= $data['uid'] ?>" onclick="return confirm('Do you want to delete this user?')" class="btn btn-sm text-danger">Delete</a>
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
        $('#myTable').DataTable();
    });
</script>


<?php mysqli_close($con) ?>
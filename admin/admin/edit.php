<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT*FROM users WHERE uid='$id'";
    $query = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($query);
}
if (isset($_POST) && !empty($_POST)) {

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];

    $sql = "UPDATE users SET firstname='$firstname',lastname='$lastname' WHERE uid='$id'";
    if (mysqli_query($con, $sql)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("Update Successfully!!");';
        $alert .= 'window.location.href="?page=admin";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Failed==" . $sql . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}



?>
<h1 class="app-page-title">Edit User</h1>
<hr class="mb-4" />
<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <form action="" method="post">
                    <div class="mb-2 col-lg-6">
                        <label class="form-label">Username</label>
                        <input type="text" value="<?= $result['username'] ?>" class="form-control" name="username" required disabled />
                    </div>
                    <div class="mb-2 col-lg-6">
                        <label class="form-label">Firstname</label>
                        <input type="text" value="<?= $result['firstname'] ?>" class="form-control" name="firstname" required />
                    </div>
                    <div class="mb-2 col-lg-6">
                        <label class="form-label">Lastname</label>
                        <input type="text" value="<?= $result['lastname'] ?>" class="form-control" name="lastname" required />
                    </div>

                    <button type="submit" class="btn app-btn-primary bg-success text-white">
                        Save
                    </button>

                </form>
            </div>
            <!--//app-card-body-->
        </div>
        <!--//app-card-->
    </div>
</div>
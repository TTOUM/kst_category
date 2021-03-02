<?php

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT*FROM users WHERE uid='$id'";
    $query = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($query);
}

if (isset($_POST) && !empty($_POST)) {

    $newpassword = sha1(md5($_POST["newpassword"]));
    $confirmpassword = sha1(md5($_POST['confirmpassword']));
    if ($newpassword !== $confirmpassword) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("Confirm Password!!");';
        $alert .= 'window.location.href="?page=admin&function=resetpassword&id=' . $id . '";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        $sql = "UPDATE users SET pass='$confirmpassword' WHERE uid='$id'";
        if (mysqli_query($con, $sql)) {
            $alert = '<script type="text/javascript">';
            $alert .= 'alert("Reset Successfully!!");';
            $alert .= 'window.location.href="?page=admin";';
            $alert .= '</script>';
            echo $alert;
            exit();
        } else {
            echo "Failed==" . $sql . "<br>" . mysqli_error($con);
        }
    }

    mysqli_close($con);
}
?>
<h1 class="app-page-title">Reset Password</h1>
<hr class="mb-4" />
<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <form action="" method="post">
                    <div class="mb-2 col-lg-6">
                        <label class="form-label">New Password</label>
                        <input type="text" class="form-control" name="newpassword" required />
                    </div>
                    <div class="mb-2 col-lg-6">
                        <label class="form-label">Confirm Password</label>
                        <input type="text" class="form-control" name="confirmpassword" required />
                    </div>
                    <button type="submit" class="btn app-btn-primary bg-success text-white">
                        Reset
                    </button>
                </form>
            </div>
            <!--//app-card-body-->
        </div>
        <!--//app-card-->
    </div>
</div>
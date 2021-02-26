<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM users where uid='$id'";
    if (mysqli_query($con, $sql)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("Delete Successfully!!");';
        $alert .= 'window.location.href="?page=admin";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Failed==" . $sql . "<br>" . mysqli_error($con);
    }
}
mysqli_close($con);

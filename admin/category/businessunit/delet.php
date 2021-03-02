<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM businessunit where businessid='$id'";
    if (mysqli_query($con, $sql)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("Deleted Successfully!!");';
        $alert .= 'window.location.href="?page=category&function=managebussinessunit";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Failed==" . $sql . "<br>" . mysqli_error($con);
    }
}
